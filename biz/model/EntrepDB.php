
<?php
class EntrepDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function getEntrepIdByEmail($email){
        $db = $this->connectDB();
        $sql = "SELECT e_id FROM entreprenuer WHERE e_email = '".$email."'";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return $result['e_id']; 
    }

    public function getEntrepById($id){
        $db = $this->connectDB();
        $sql = "SELECT * FROM entreprenuer WHERE e_id = '".$email."'";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return json_encode($result); 
    }
    public function checkSetupStatus($email){
        $db = $this->connectDB();
        $sql = "SELECT acc_setup FROM entreprenuer WHERE investor_email = '".$email."'";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return $result['acc_setup']; 
    }

    public function addEntrep($email, $date) {
        $db = $this->connectDB();
        $sql = "INSERT INTO entreprenuer(e_email, create_date)
                VALUES('$email', '$date')";
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