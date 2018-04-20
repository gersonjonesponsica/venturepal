
<?php
class BookmarkDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addVenturerBookmark($data) {
        $db = $this->connectDB();
        $params = array();
        $sql = "";
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

    public function deleteVenturerBookmark($id) {
        $db = $this->connectDB();
        $sql = "";
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
    public function addBookmark($data) {
        $db = $this->connectDB();
        $params = array($data['to_id'],$data['from_id'],date('Y-m-d H:i:s'), $data['type']);

        $sql = "INSERT INTO bookmark (to_id, from_id, created_date, bookmark_type) VALUES (?,?,?,?)";
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

    public function updateBookmark($data) {
        $db = $this->connectDB();
        // $params = array();
        $sql = "UPDATE bookmark SET status = '".$data['status']."' 
        WHERE to_id = '".$data['to_id']."' AND 
        from_id = '".$data['from_id']."' AND 
        bookmark_type = '".$data['type']."'";
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


    public function checkBookmark($data) {
        $db = $this->connectDB();
        $sql = "SELECT * from bookmark WHERE to_id = '".$data['to_id']."' AND from_id = '".$data['from_id']."' ";
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