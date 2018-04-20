
<?php
class LikeDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addLike($data) {
        $db = $this->connectDB();
        $params = array($data['to_id'],$data['from_id'],date('Y-m-d H:i:s'), $data['type']);

        $sql = "INSERT INTO likes (like_to, like_from, like_date, like_type) VALUES (?,?,?,?)";
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

    public function updateLike($data) {
        $db = $this->connectDB();
        // $params = array();
        $sql = "UPDATE likes SET si_status = '".$data['status']."' 
        WHERE  like_to = '".$data['to_id']."' AND 
        like_from = '".$data['from_id']."' AND 
        like_type = '".$data['type']."'";
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


    public function checkLike($data) {
        $db = $this->connectDB();
        $sql = "SELECT * from likes WHERE like_to = '".$data['to_id']."' AND like_from = '".$data['from_id']."' ";
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
    public function getLikeInvestor($data){
        $db = $this->connectDB();
        $sql = 'SELECT CONCAT(i.investor_lname,", " , i.investor_fname, " ", i.investor_mname) AS investor_name,  i.investor_photo, i.investor_id 
            from likes l 
            Inner join investor i on  i.investor_id = l.like_from
            WHERE like_to = "'.$data['msme_id'].'" AND like_type = 1 AND si_status = 1';
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