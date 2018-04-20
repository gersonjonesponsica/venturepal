
<?php
class InterestDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addInterest($data) {
        $db = $this->connectDB();
        $params = array($data['v_id'], $data['interest'], date('Y-m-d H:i:s'));

        $sql = "INSERT INTO interest (v_id, sub_id, created_date) VALUES (?,?,?)";
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

    public function updateInterest($data) {
        $db = $this->connectDB();
        // $params = array();
        $sql = "UPDATE interest SET status = '".$data['stat']."'
        WHERE v_id = '".$data['v_id']."'  AND sub_id = '".$data['interest']."'";
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


    public function checkInterest($data) {
        $db = $this->connectDB();
        $sql = "SELECT * from interest WHERE v_id = '".$data['v_id']."' AND sub_id ='".$data['interest']."' ";
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
    public function getInvestorInterest($data) {
        $db = $this->connectDB();
        $sql = "SELECT i.status, i.v_id, s.sub_name, i.sub_id
        from interest i
        INNER JOIN subcategory s on i.sub_id = s.sub_id
        WHERE i.v_id = '".$data['v_id']."' AND i.status = '1' ";
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