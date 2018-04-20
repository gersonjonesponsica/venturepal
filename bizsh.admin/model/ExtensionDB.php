
<?php
class ExtensionDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addExtension($data) {
        $db = $this->connectDB();
        $params = array($data['msme_id'],date('Y-m-d H:i:s'));

        $sql = "INSERT INTO extension (msme_id, extension_date) VALUES (?,?)";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute($params);
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }

    public function checkExtension($data) {
        $db = $this->connectDB();
        $sql = "SELECT msme_id from extension WHERE msme_id = '".$data['msme_id']."'";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result['msme_id'];
    }
    public function getAllExtension() {
        $db = $this->connectDB();
        $sql = "SELECT e.msme_id, e.extension_date, m.msme_name, m.msme_logo, e.status, e.extension_id
        FROM extension e, msme m 
        WHERE e.msme_id = m.msme_id 
        GROUP BY e.msme_id";
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
    public function updateMSMEApproveDate($data) {
        $db = $this->connectDB();
        $sql = "UPDATE msme set approve_date = '".$data['extension_date']."' WHERE msme_id = '".$data['msme_id']."'";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }    
    public function updateStatus($data) {
        $db = $this->connectDB();
        $sql = "UPDATE extension set status = '".$data['stat']."' WHERE msme_id = '".$data['msme_id']."'";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }
    public function getMsmeApproveDate($msme_id, $tot_days) {
      $db = $this->connectDB();
      $sql = 'SELECT DATE_ADD(approve_date, INTERVAL + '.$tot_days.' DAY) as extension_date FROM msme where msme_id = "'.$msme_id.'" ';      
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
    public function getExcessDays($msme_id) {
      $db = $this->connectDB();
      $sql = 'SELECT timestampdiff(DAY, now(), DATE_ADD(approve_date, INTERVAL + 30 DAY)) as days FROM msme where msme_id = "'.$msme_id.'" ';      

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
}