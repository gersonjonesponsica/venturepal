
<?php
class TermsDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addTerms($data) {
        $db = $this->connectDB();
        $params = array($data['terms'],date('Y-m-d H:i:s'),$data['type']);

        $sql = "INSERT INTO terms (terms, created_date, terms_type) VALUES (?,?,?)";
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

    public function updateTerms($data) {
        $db = $this->connectDB();
        $sql = "UPDATE terms SET terms = '".$data['terms']."' 
        WHERE terms_type = '".$data['type']."' ";
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


    public function checkTerms($data) {
        $db = $this->connectDB();
        $sql = "SELECT * from terms WHERE terms_type = '".$data['type']."'";
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