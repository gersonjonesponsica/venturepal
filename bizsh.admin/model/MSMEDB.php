
<?php
class MSMEDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function updateLaunchMsme($data) {
        $db = $this->connectDB();
        $sql = "UPDATE callforinvestment SET launch_status = 1, 
        launch_date = '".date("Y-m-d H:i:s")."' 
        where msme_id = '".$data['msme_id']."'";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error: ", $ex->getMessage();
        }
        return $result;
    }
    public function getAllLaunchMsme() {
      $db = $this->connectDB();
      $sql = 'SELECT m.msme_id, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + 30 DAY)) as rem,
              m.neededCapital - (SELECT sum(mv.amount) from msme_venturer mv where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id) as raised

              from msme m, callforinvestment cfi
              where m.msme_id = cfi.msme_id and cfi.status = 1 and cfi.launch_status = 0
              having if(raised = 0, 1=1, rem <= 0) ';
      $result = false;
      try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $db = null;
      } catch(PDOException $ex) {
        echo "DB Error:", $ex->getMessage();
      }
      return $result;
    }
    public function getAllMSME() {
      $db = $this->connectDB();
      $sql = 'SELECT DISTINCT m.msme_id, s.sub_name, m.msme_logo, m.msme_minInvestment, m.status ,m.approve_date,m.msme_maxInvestment, e.e_photo, m.msme_name, e.e_email, m.msme_desc, m.approve_date,CONCAT(e.e_lname,", " , e.e_fname, " ", e.e_mname) AS entrepname, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + 30 DAY)) as rem, (m.msme_maxVent - COUNT(mv.msme_id)) AS remaining_venturer, (m.neededCapital - SUM(IFNULL(mv.amount,0))) AS remaining_neededCap, ROUND((SUM(IFNULL(mv.amount, 0)) / m.neededCapital * 100),0) as percent_raised, ROUND((SUM(IFNULL( mv.amount, 0))),0) AS raised, (SELECT COUNT(l.like_id) as totallikes FROM likes l WHERE l.like_to = m.msme_id) AS totallikes FROM msme m

          INNER JOIN entreprenuer e ON e.e_id = m.e_id 
          INNER JOIN subcategory s ON s.sub_id = m.sc_id 
          INNER JOIN cities c ON m.msme_city = c.city_id 
          INNER JOIN provinces p ON m.msme_state = p.province_id
          LEFT JOIN msme_venturer mv ON mv.msme_id = m.msme_id 
          GROUP BY m.msme_id ';
      $result = false;
      try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $db = null;
      } catch(PDOException $ex) {
        echo "DB Error:", $ex->getMessage();
      }
      return $result;
    }
    public function getMSMEbyId($data) {
      $db = $this->connectDB();
      $sql = 'SELECT DISTINCT m.msme_id, m.msme_name, m.msme_desc, m.msme_dateEstablish, e.e_photo,m.msme_street, m.msme_brgy, m.msme_city, m.msme_state, m.msme_networth, m.msme_grossincome, m.msme_netprofit, m.msme_size, m.status, m.msme_website, m.msme_logo, m.dti_status, m.msme_maxVent, m.msme_minVent, m.msme_maxInvestment, m.msme_minInvestment, m.msme_longitude, m.msme_latitude, m.biz_permit, m.msme_fb, m.approve_date,
        m.mayor_permit, m.dti_permit, CONCAT(e.e_lname,", " , e.e_fname, " ", e.e_mname) AS entrepname, e.e_email, e.e_fb, e.e_cpnum, e.e_telnum, m.dti_permit, m.bir_registration, m.locatormap, p.province_name, c.city_name, m.sec_registration, m.neededCapital, sc.sub_id ,sc.sub_name, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + 30 DAY)) as rem, ROUND((SUM(IFNULL(mv.amount, 0)) / m.neededCapital * 100),0) as percent_raised,(m.msme_maxVent - COUNT(mv.msme_id)) AS remaining_venturer, (m.neededCapital - SUM(IFNULL(mv.amount,0))) AS remaining_neededCap, (SELECT COUNT(like_id) FROM likes WHERE like_to = "'.$data['msme_id'].'" AND si_status = 1 AND like_type = 1 ) AS totalLikes, SUM(IFNULL(mv.amount, 0)) as total_raised, (m.neededCapital - SUM(IFNULL(mv.amount,0))) as total_remaining, (SELECT ROUND(IFNULL(AVG(rr.rr_rate),0)) FROM rateandreview rr WHERE rr.rr_to = "'.$data['msme_id'].'") AS rateAvarage

          FROM msme m 
            INNER JOIN msme_venturer mv ON m.msme_id = mv.msme_id 
            INNER JOIN entreprenuer e ON m.e_id = e.e_id 
            INNER JOIN subcategory sc ON m.sc_id = sc.sub_id 
             INNER JOIN cities c ON m.msme_city = c.city_id 
            INNER JOIN provinces p ON m.msme_state = p.province_id 
            where m.msme_id = "'.$data['msme_id'].'" ';      

      $result = false;
      try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        $db = null;
      } catch(PDOException $ex) {
        echo "DB Error:", $ex->getMessage();
      }
      return json_encode($result);
    }
    public function updateStatus($data) {
        $db = $this->connectDB();
        $sql = "UPDATE msme SET status = '".$data['stat']."', 
        approve_date = '".date("Y-m-d H:i:s")."' 
        where msme_id = '".$data['msme_id']."'";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error: ", $ex->getMessage();
        }
        return $result;
    }
    public function updateCfi($data) {
        $db = $this->connectDB();
        $sql = "UPDATE callforinvestment SET approve_date = '".date("Y-m-d H:i:s")."' 
        where msme_id = '".$data['msme_id']."' AND status = 1";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error: ", $ex->getMessage();
        }
        return $result;
    }    
    public function UploadEtrepImage($data) {
        $db = $this->connectDB();
        $sql = "UPDATE entreprenuer SET e_photo = '".$data['newfilename']."' where e_id = '".$data['entrep_id']."'";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error: ", $ex->getMessage();
        }
        return $result;
    }
    public function getMsmeInvestor($msme_id) {
        $db = $this->connectDB();
        $sql = "SELECT mv.amount, CONCAT(i.investor_lname,', ' , i.investor_fname, ' ', i.investor_mname) AS investorName, i.investor_photo, mv.v_id
        from msme_venturer mv
        INNER JOIN investor i on mv.v_id = i.investor_id
        WHERE mv.msme_id = '".$msme_id."' ";
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
    public function getMsmeGallery($data){
      $db = $this->connectDB();
      $sql = "SELECT * FROM document where doc_type = '2' 
      AND msme_id = '".$data['msme_id']."' AND status = '1'";
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
    public function getMsmeDocument($data){
      $db = $this->connectDB();
      $sql = "SELECT * FROM document where doc_type = '1' 
      AND msme_id = '".$data['msme_id']."' AND status = '1' ";
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
}