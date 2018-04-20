
<?php
class ExtensionDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addExtension($data) {
        $db = $this->connectDB();
        $params = array($data['item_name'],date('Y-m-d H:i:s'));

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
}