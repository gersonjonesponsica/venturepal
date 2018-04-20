
<?php
class EntrepDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    
    public function checkAdminUsername($username) {
        $db = $this->connectDB();
        $sql = "SELECT username FROM admin WHERE username = '".$username."'";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return $result;    
    }
    public function getEntrepByAccountID($id) {
        $db = $this->connectDB();
        $sql = "SELECT entreprenuer.e_id, entreprenuer.e_lname, entreprenuer.e_fname, entreprenuer.e_mname, entreprenuer.e_street, entreprenuer.e_brgy, entreprenuer.e_state, entreprenuer.e_city, entreprenuer.e_brgy, cities.city_name, 
        provinces.province_name, entreprenuer.e_photo, entreprenuer.e_email, entreprenuer.e_fb, entreprenuer.e_cpnum, entreprenuer.e_telnum, entreprenuer.e_desc, entreprenuer.e_notify_status, 
        entreprenuer.cp_notify_status, entreprenuer.create_date, entreprenuer.delete_date, entreprenuer.update_date, entreprenuer.status, accounts.acc_email
        FROM entreprenuer
        INNER JOIN accounts on accounts.investee_id = entreprenuer.e_id
        INNER JOIN cities ON entreprenuer.e_city = cities.city_id
        INNER JOIN provinces ON entreprenuer.e_state = provinces.province_id
        WHERE entreprenuer.e_id = '".$id."' ";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return json_encode($result);    
    }
    
    public function getAllEntrep() {
      $db = $this->connectDB();
      $sql = "SELECT * FROM entreprenuer where status = 1 OR status = 0";
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
    public function deleteEntrep($id) {
        $db = $this->connectDB();
        $sql = "DELETE FROM entreprenuer WHERE e_id = '".$id."'";
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
        $sql = "UPDATE entreprenuer SET status = '".$data['stat']."' where e_id = '".$data['e_id']."'";
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
    public function UploadEtrepDetails($data) {
        $db = $this->connectDB();
        $sql = "UPDATE entreprenuer SET e_fname = '".$data['fname']."',
                                        e_lname = '".$data['lname']."',
                                        e_mname = '".$data['mname']."',
                                        e_street = '".$data['street']."',
                                        e_brgy = '".$data['barangay']."',
                                        e_city = '".$data['city']."',
                                        e_state = '".$data['province']."',
                                        e_email = '".$data['email']."',
                                        e_fb = '".$data['fb']."',
                                        e_cpnum = '".$data['mobile']."',
                                        e_telnum = '".$data['telephone']."',
                                        e_desc = '".$data['desc']."',
                                        update_date = '".date('Y-m-d H:i:s')."'
                                         WHERE e_id = '".$data['entrep_id']."'";
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
}