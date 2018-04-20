
<?php
class DocumentDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addDocument($data) {
        $db = $this->connectDB();
        $params = array($data['newfilename'],
                        $data['file_path'],
                        $data['admin_id'], 
                        date('Y-m-d H:i:s'));
        $sql = "INSERT INTO document (doc_name, doc_location, admin_id, date_uploaded)
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

    public function getAllDocuments() {
      $db = $this->connectDB();
      $sql = "SELECT document.doc_id, admin.username ,document.doc_name, 
      document.status, document.admin_id 
      FROM document
      INNER JOIN admin on document.admin_id = admin.admin_id WHERE document.status = 1 OR document.status = 0";
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

    public function getDocumentByID($id) {
        $db = $this->connectDB();
        $sql = "SELECT * FROM question WHERE question_id = '".$id."'";
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
    public function editDocument($data) {
        $db = $this->connectDB();
        $sql = "UPDATE question
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
    public function deleteDocumentByID($id) {
        $db = $this->connectDB();
        $sql = "UPDATE document set  status = 2 WHERE doc_id = '".$id."'";
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
        $sql = "UPDATE document SET status = '".$data['stat']."' where doc_id = '".$data['doc_id']."'";
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