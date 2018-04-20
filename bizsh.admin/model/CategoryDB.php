
<?php
class CategoryDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addCategory($data) {
        $db = $this->connectDB();
        $params = array($data['cat_name'], date('Y-m-d H:i:s'));
        $sql = "INSERT INTO category (cat_name, date_created)
                VALUES(?,?)";
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

    public function getAllCategory() {
      $db = $this->connectDB();
      $sql = "SELECT * FROM category where status = 1 OR status = 0";
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

    public function getCategoryByID($id) {
        $db = $this->connectDB();
        $sql = "SELECT * FROM category WHERE cat_id = '".$id."' ";
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
    public function editCategory($data) {
        $db = $this->connectDB();
        $sql = "UPDATE category
                SET cat_name = '".$data['cat_name']."'
                WHERE cat_id = '".$data['cat_id']."'";
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
    public function deleteCategoryByID($id) {
        $db = $this->connectDB();
        $sql = "UPDATE category set status = '2' WHERE cat_id = '".$id."'";
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
        $sql = "UPDATE category set status = '".$data['stat']."' WHERE cat_id = '".$data['cat_id']."'";
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
}