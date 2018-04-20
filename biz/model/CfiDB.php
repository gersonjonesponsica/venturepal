
<?php
class CfiDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addCFI($data) {
        $db = $this->connectDB();
        $params = array( $data['msme_id'], $data['capneeded']);
        $sql = "INSERT INTO callforinvestment (msme_id , amount )  VALUES (?,?)";
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
    public function getCfiId($data) {
        $db = $this->connectDB();
        $sql = "SELECT call_id from callforinvestment WHERE msme_id = '".$data['msme_id']."' AND status = 1 ";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result['call_id'];
    }
    public function endInvestment($data) {
        $db = $this->connectDB();
        $sql = "UPDATE msme_venturer SET status = 1 WHERE msme_id = '".$data['msme_id']."' ";

        $sql2 = "UPDATE contract SET status = 4 WHERE msme_id = '".$data['msme_id']."' ";

        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();

            if ($result) {
                $result2 = false;
                $stmt2 = $db->prepare($sql2);
                $result2 = $stmt2->execute();
            }
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result2;
    }    
}