
<?php
class QuestionDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function addQuestion($data) {
        $db = $this->connectDB();
        $params = array($data['question_data'],
                        $data['answer'], date('Y-m-d H:i:s'));
        $sql = "INSERT INTO question (question_data, answer, created)
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

    public function getAllQuestions() {
      $db = $this->connectDB();
      $sql = "SELECT * FROM question WHERE status = 1 or status = 0";
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

    public function getQuestionByID($id) {
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
    public function editQuestion($data) {
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
    public function deleteQuestionByID($id) {
        $db = $this->connectDB();
        $sql = "UPDATE question set status = 2 WHERE question_id = '".$id."'";
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
        $sql = "UPDATE question set status = '".$data['stat']."' WHERE question_id = '".$data['question_id']."'";
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