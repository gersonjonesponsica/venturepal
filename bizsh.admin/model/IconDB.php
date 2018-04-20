
<?php
class IconDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addIcon($data) {
        $db = $this->connectDB();
        $params = array($data['newfilename'],
                        $data['file_path'], 
                        date('Y-m-d H:i:s'));
        $sql = "INSERT INTO icon (icon_name, icon_location, date_created)
                VALUES(?,?,?)";
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

    public function getAllIcons2() {
      $db = $this->connectDB();
      $sql = "SELECT * FROM icon where status = 1 or status = 0";
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

    public function getAllIcons() {
      $db = $this->connectDB();
      $sql = "SELECT * FROM icon where status = 1 or status = 0";
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
    public function checkIconByName($name) {
        $db = $this->connectDB();
        $sql = "SELECT * FROM icon WHERE icon_name = '".$name."'";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result['status'];
    }

    public function getIconByName($name) {
        $db = $this->connectDB();
        $sql = "SELECT * FROM icon WHERE icon_name = '".$name."'";
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

    public function getIconByNameByID($id) {
        $db = $this->connectDB();
        $sql = "SELECT icon_name FROM icon WHERE icon_id = '".$id."'";
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



    public function getIconByID($id) {
        $db = $this->connectDB();
        $sql = "SELECT * FROM icon WHERE icon_id = '".$id."'";
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
    public function editIcon($data) {
        $db = $this->connectDB();
        $sql = "UPDATE icon
                SET question_data = '".$data['question']."',
                    answer = '".$data['answer']."'
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
    public function deleteIconByID($id) {
        $db = $this->connectDB();
        $sql = "UPDATE icon set status = 2 WHERE icon_id = '".$id."'";
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

    public function changeStatus($data) {
        $db = $this->connectDB();
        $sql = "UPDATE icon set status = '".$data['stat']."' WHERE icon_id = '".$data['icon_id']."'";
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