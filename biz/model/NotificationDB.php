<?php
class NotificationDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    } 
    public function sendSms($data){
      $number = $data['number'];
      $code  = $data['phone_code'];
      $apicode = "TR-GERSO869393_TPEE6";
      $message = "Your Verification code is ". $code;
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
    public function notification($data) {
        $db = $this->connectDB();
        $params = array($data['to_id'],$data['from_id'],$data['type'],date('Y-m-d H:i:s'));

        $sql = "INSERT INTO notification (noti_to, noti_from, noti_type, noti_date) VALUES (?,?,?,?)";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute($params);
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMgetUserNotificationessage();
        }
        return $result;
    }
    public function checkUserNotification($data){
        $db = $this->connectDB();
        $sql = "SELECT * from notification 
        WHERE noti_type = '3' AND noti_to = '".$data['to_id']."'
        AND noti_from = '".$data['from_id']."' AND status = 1 LIMIT 1";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }
    // public function getUserNotification($data){
    //     $db = $this->connectDB();
    //     $sql = 'SELECT DISTINCT n.noti_from AS idofnotifier,         
    //     IF("'.$data['type'].'" = 1, m.msme_logo,i.investor_photo) AS photo,         
    //     IF("'.$data['type'].'" = 1, m.msme_name, CONCAT(i.investor_fname," ",i.investor_mname," ",i.investor_lname)) AS name,
    //     IF("'.$data['type'].'" = 1, m.msme_name, m.msme_name) AS msme_name, 
    //     IF("'.$data['type'].'" = 1, m.msme_id, m.msme_id) AS msme_id, 
    //     IF("'.$data['type'].'" = 1, m.msme_logo, m.msme_logo) AS msme_photo,
    //     if(n.noti_type = 2, (SELECT c.contract_file from contract c where c.v_id = i.investor_id and c.msme_id = m.msme_id), "") as contractfile,
    //     if(n.noti_type = 2, (SELECT c.proof_invesment from contract c where c.v_id = i.investor_id and c.msme_id = m.msme_id), "") as proof,
    //     n.status, n.noti_id,  noti_type, noti_date,        
    //     IF("'.$data['type'].'"= 1, CONCAT(e.e_fname," ",e.e_mname," ",e.e_lname), 
    //     CONCAT(i.investor_fname," ",i.investor_mname," ",i.investor_lname)) AS username,       
    //     IF("'.$data['type'].'" = 1, e.e_photo," " ) as e_photo,        
    //     IF("'.$data['type'].'" = 1, m.e_id, " ") as entrep_id      
    //     FROM notification n, msme m, investor i,entreprenuer e,contract c

    //     WHERE IF("'.$data['type'].'" = 1, n.noti_to = "'.$data['account_id'].'" and n.noti_type in(3,4) and n.noti_to = i.investor_id and n.noti_from = m.msme_id, m.e_id = "'.$data['account_id'].'" and n.noti_type in(1,2,5) and m.msme_id = n.noti_to AND i.investor_id = n.noti_from)
        
    //     GROUP BY noti_date 
    //     ORDER by n.status asc, noti_date desc';
    //     $result = false;
    //     try {
    //         $stmt = $db->prepare($sql);
    //         $stmt->execute();
    //         $result = $stmt->fetchAll();
    //         $db = null;
    //     } catch(PDOException $ex) {
    //         echo "DB Error:", $ex->getMessage();
    //     }
    //     return json_encode($result);
    // }
    public function getUserNotification($data){
        $db = $this->connectDB();
        $sql = 'SELECT DISTINCT n.noti_from AS idofnotifier,         
        IF("'.$data['type'].'" = 1, m.msme_logo,i.investor_photo) AS photo,         
        IF("'.$data['type'].'" = 1, m.msme_name, CONCAT(i.investor_fname," ",i.investor_mname," ",i.investor_lname)) AS name,
        IF("'.$data['type'].'" = 1, m.msme_name, m.msme_name) AS msme_name, 
        IF("'.$data['type'].'" = 1, m.msme_id, m.msme_id) AS msme_id, 
        IF("'.$data['type'].'" = 1, m.msme_logo, m.msme_logo) AS msme_photo,
    

        if(n.noti_type = 6, FORMAT((SELECT p.pay_amount*(mv.amount/cfi.amount)
        FROM msme_venturer mv,payout p,callforinvestment cfi 
        WHERE p.cfi_id = mv.cfi_id and mv.v_id = i.investor_id and cfi.call_id = p.cfi_id and mv.msme_id = cfi.msme_id
        ORDER BY p.pay_id LIMIT 1),2), 2) as paidAmount,
        if(n.noti_type IN(4,5,2), (SELECT c.contract_amount from contract c where c.v_id = i.investor_id and c.msme_id = m.msme_id), "") as amount, 
        if(n.noti_type = 2, (SELECT c.contract_file from contract c where c.v_id = i.investor_id and c.msme_id = m.msme_id), "") as contractfile,
        if(n.noti_type = 2, (SELECT c.proof_invesment from contract c where c.v_id = i.investor_id and c.msme_id = m.msme_id), "") as proof,
        n.status, n.noti_id,  noti_type, noti_date,        
        IF("'.$data['type'].'"= 1, CONCAT(e.e_fname," ",e.e_mname," ",e.e_lname), 
        CONCAT(i.investor_fname," ",i.investor_mname," ",i.investor_lname)) AS username,       
        IF("'.$data['type'].'" = 1, e.e_photo," " ) as e_photo,        
        IF("'.$data['type'].'" = 1, m.e_id, " ") as entrep_id      
         FROM notification n, msme m, investor i,entreprenuer e,contract c,payout p

       WHERE IF("'.$data['type'].'" = 1, n.noti_to = "'.$data['account_id'].'" and n.noti_type in(3,4,6,7,9) and n.noti_to = i.investor_id and n.noti_from = m.msme_id, m.e_id = "'.$data['account_id'].'" and n.noti_type in(1,2,5,8) and m.msme_id = n.noti_to AND i.investor_id = n.noti_from)


        GROUP BY noti_id 
        ORDER by n.status asc, noti_date desc';

        // echo $sql;
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
    public function getUserNotificationCountUnread($data){
        $db = $this->connectDB();
        $sql = 'SELECT DISTINCT n.noti_from AS idofnotifier,         
        IF("'.$data['type'].'" = 1, m.msme_logo,i.investor_photo) AS photo,         
        IF("'.$data['type'].'" = 1, m.msme_name, CONCAT(i.investor_fname," ",i.investor_mname," ",i.investor_lname)) AS name,
        IF("'.$data['type'].'" = 1, m.msme_name, m.msme_name) AS msme_name, 
        IF("'.$data['type'].'" = 1, m.msme_id, m.msme_id) AS msme_id, 
        IF("'.$data['type'].'" = 1, m.msme_logo, m.msme_logo) AS msme_photo,
        if(n.noti_type = 2, (SELECT c.contract_file from contract c where c.v_id = i.investor_id and c.msme_id = m.msme_id), "") as contractfile,
        if(n.noti_type = 2, (SELECT c.proof_invesment from contract c where c.v_id = i.investor_id and c.msme_id = m.msme_id), "") as proof,
        n.status, n.noti_id,  noti_type, noti_date,        
        IF("'.$data['type'].'"= 1, CONCAT(e.e_fname," ",e.e_mname," ",e.e_lname), 
        CONCAT(i.investor_fname," ",i.investor_mname," ",i.investor_lname)) AS username,       
        IF("'.$data['type'].'" = 1, e.e_photo," " ) as e_photo,        
        IF("'.$data['type'].'" = 1, m.e_id, " ") as entrep_id      
        FROM notification n, msme m, investor i,entreprenuer e,contract c

        WHERE IF("'.$data['type'].'" = 1, n.noti_to = "'.$data['account_id'].'" and n.noti_type in(3,4,6,7,9) and n.noti_to = i.investor_id and n.noti_from = m.msme_id, m.e_id = "'.$data['account_id'].'" and n.noti_type in(1,2,5,8) and m.msme_id = n.noti_to AND i.investor_id = n.noti_from)  and n.status = 1
        
        GROUP BY noti_date 
        ORDER by n.status asc, noti_date desc';
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
    public function getUserNotificationCountRead($data){
        $db = $this->connectDB();
        $sql = 'SELECT DISTINCT n.noti_from AS idofnotifier,         
        IF("'.$data['type'].'" = 1, m.msme_logo,i.investor_photo) AS photo,         
        IF("'.$data['type'].'" = 1, m.msme_name, CONCAT(i.investor_fname," ",i.investor_mname," ",i.investor_lname)) AS name,
        IF("'.$data['type'].'" = 1, m.msme_name, m.msme_name) AS msme_name, 
        IF("'.$data['type'].'" = 1, m.msme_id, m.msme_id) AS msme_id, 
        IF("'.$data['type'].'" = 1, m.msme_logo, m.msme_logo) AS msme_photo,
        if(n.noti_type = 2, (SELECT c.contract_file from contract c where c.v_id = i.investor_id and c.msme_id = m.msme_id), "") as contractfile,
        if(n.noti_type = 2, (SELECT c.proof_invesment from contract c where c.v_id = i.investor_id and c.msme_id = m.msme_id), "") as proof,
        n.status, n.noti_id,  noti_type, noti_date,        
        IF("'.$data['type'].'"= 1, CONCAT(e.e_fname," ",e.e_mname," ",e.e_lname), 
        CONCAT(i.investor_fname," ",i.investor_mname," ",i.investor_lname)) AS username,       
        IF("'.$data['type'].'" = 1, e.e_photo," " ) as e_photo,        
        IF("'.$data['type'].'" = 1, m.e_id, " ") as entrep_id      
        FROM notification n, msme m, investor i,entreprenuer e,contract c

        WHERE IF("'.$data['type'].'" = 1, n.noti_to = "'.$data['account_id'].'" and n.noti_type in(3,4,6,7,9) and n.noti_to = i.investor_id and n.noti_from = m.msme_id, m.e_id = "'.$data['account_id'].'" and n.noti_type in(1,2,5,8) and m.msme_id = n.noti_to AND i.investor_id = n.noti_from) 
        
        GROUP BY noti_date 
        ORDER by n.status asc, noti_date desc';
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
    public function updateNotification($data) {
        $db = $this->connectDB();
        // $params = array();
        $sql = "UPDATE notification SET status = '".$data['stat']."' WHERE noti_id = '".$data['noti_id']."'";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }    
        
}