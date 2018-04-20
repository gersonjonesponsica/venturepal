
<?php
class SubcategoryDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addSubcategory($data) {
        $db = $this->connectDB();
        $params = array($data['sub_name'], 
                        $data['category'],
                        $data['icon_id'],
                        date('Y-m-d H:i:s'));
        $sql = "INSERT INTO subcategory (sub_name,cat_id,icon_id,date_created)
                VALUES(?,?,?,?)";
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

    public function getAllSubcategory() {
      $db = $this->connectDB();
      $sql = "SELECT subcategory.sub_id, subcategory.cat_id, subcategory.icon_id, subcategory.sub_name, category.cat_name,icon.icon_name, icon.icon_location, subcategory.status
      FROM subcategory
      INNER JOIN category ON subcategory.cat_id = category.cat_id
      INNER JOIN icon ON subcategory.icon_id = icon.icon_id 
      where subcategory.status = 1 or subcategory.status = 0";
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
    public function getAllSubcategory2() {
      $db = $this->connectDB();
      $sql = "SELECT subcategory.sub_id, subcategory.cat_id, subcategory.icon_id, subcategory.sub_name, category.cat_name,icon.icon_name, icon.icon_location, subcategory.status
      FROM subcategory
      LEFT JOIN category ON subcategory.cat_id = category.cat_id
      LEFT JOIN icon ON subcategory.icon_id = icon.icon_id 
      where subcategory.status = 1 or subcategory.status = 0";
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
    public function updateStatus($data) {
        $db = $this->connectDB();
        $sql = "UPDATE subcategory SET status = '".$data['stat']."' where sub_id = '".$data['sub_id']."'";
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
    public function getSubcategoryByID($id) {
        $db = $this->connectDB();
        $sql = "SELECT * FROM subcategory WHERE sub_id = '".$id."'";
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
    public function editSubcategory($data) {
        $db = $this->connectDB();
        $sql = "UPDATE category
                SET cat_name = '".$data['category_name']."'
                WHERE question_id = '".$data['question_id']."'";
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
    public function deleteSubCategoryByID($id) {
        $db = $this->connectDB();
        $sql = "UPDATE subcategory set status = '2' WHERE sub_id = '".$id."'";
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