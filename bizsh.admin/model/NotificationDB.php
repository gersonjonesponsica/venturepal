
<?php
class NotificationDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function getAllMatchInvestors($msme_id) {
      $db = $this->connectDB();
      $sql = "SELECT i.investor_id, i.investor_email, CONCAT(i.investor_fname, ' ' , i.investor_mname, ' ', i.investor_lname) as name, i.max_investment, i.min_investment, i.investor_cpNum, i.eNotify_status, i.cpNotify_status, m.msme_name, m.msme_logo FROM investor i, msme m, 
      accounts a WHERE i.investor_id IN (SELECT v_id FROM interest WHERE m.sc_id = sub_id) and m.msme_id = '".$msme_id."' and (i.eNotify_status = 1 or i.cpNotify_status = 1) and a.acc_email = i.investor_email and a.acc_status = 1 ";
      $result = false;
      try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $db = null;
      } catch(PDOException $ex) {
        echo "DB Error:", $ex->getMessage();
      }
      return json_encode($result);
    }
    public function getAllNotificationLogs() {
      $db = $this->connectDB();
      $sql = 'SELECT DISTINCT n.noti_from AS idofnotifier,         
        IF(n.noti_type IN(4,3,6,9,7), m.msme_logo,i.investor_photo) AS photo,         
        IF(n.noti_type IN(4,3,6,9,7), m.msme_name, CONCAT(i.investor_fname," ",i.investor_mname," ",i.investor_lname)) AS name,
        IF(n.noti_type IN(4,3,6,9,7), m.msme_name, m.msme_name) AS msme_name, 
        IF(n.noti_type IN(4,3,6,9,7), m.msme_id, m.msme_id) AS msme_id, 
        IF(n.noti_type IN(4,3,6,9,7), m.msme_logo, m.msme_logo) AS msme_photo,
        if(n.noti_type = 6, ROUND((SELECT p.pay_amount/(SELECT COUNT(mv.mv_id) FROM msme_venturer mv WHERE mv.msme_id = m.msme_id and mv.status = 1) from payout p,msme_venturer mv where p.msme_id = mv.msme_id and i.investor_id = mv.v_id),""),2) as paidAmount,
        if(n.noti_type IN(4,5,2), (SELECT c.contract_amount from contract c where c.v_id = i.investor_id and c.msme_id = m.msme_id), "") as amount, 
        if(n.noti_type = 2, (SELECT c.contract_file from contract c where c.v_id = i.investor_id and c.msme_id = m.msme_id), "") as contractfile,
        if(n.noti_type = 2, (SELECT c.proof_invesment from contract c where c.v_id = i.investor_id and c.msme_id = m.msme_id), "") as proof,
        n.status, n.noti_id,  noti_type, noti_date,        
        IF(n.noti_type IN(4,3,6,9,7), CONCAT(e.e_fname," ",e.e_mname," ",e.e_lname), 
        CONCAT(i.investor_fname," ",i.investor_mname," ",i.investor_lname)) AS username,       
        IF(n.noti_type IN(4,3,6,9,7), e.e_photo," " ) as e_photo,        
        IF(n.noti_type IN(4,3,6,9,7), m.e_id, " ") as entrep_id      
        FROM notification n, msme m, investor i,entreprenuer e
    WHERE 
        (n.noti_to = i.investor_id and n.noti_from = m.msme_id and n.noti_type IN(4,3,6,9,7)) or (m.e_id = e.e_id and n.noti_from = i.investor_id and n.noti_to = m.msme_id and n.noti_type IN(1,2,5,8))
        GROUP BY noti_id
        ORDER by noti_date desc';
      $result = false;
      try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $db = null;
      } catch(PDOException $ex) {
        echo "DB Error:", $ex->getMessage();
      }
      return json_encode($result);
    }
    public function sendSms($data){
      $number = $data['investor_number'];
      $name = $data['investor_name'];
      $msme_name  = $data['msme_name'];
      $apicode = "TR-GERSO869393_TPEE6";

      $message = "Hello ". $name.", " .$msme_name . " was looking for investors.";
      $url = 'https://www.itexmo.com/php_api/api.php';
      $itexmo = array('1' => $number, '2' => $message, '3' => $apicode);
      $param = array(
          'http' => array(
              'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
              'method'  => 'POST',
              'content' => http_build_query($itexmo),
          ),
      );
      $context  = stream_context_create($param);
      return file_get_contents($url, false, $context);
    }
}