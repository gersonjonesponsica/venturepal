
<?php
class TestimonialDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function getAllTestimonials($data) {
        $db = $this->connectDB();
        $sql = "SELECT m.msme_id, msme_name, m.msme_logo, t.message, CONCAT(e.e_lname,', ' , e.e_fname, ' ', e.e_mname) AS entrepname, e.e_photo
            FROM msme m, entreprenuer e, testimonials t
            WHERE (e.e_id = m.e_id AND t.msme_id = m.msme_id) AND t.status = 1
            ORDER BY RAND() ";
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
    public function getTwoRandomTestimonial($data) {
        $db = $this->connectDB();
        $sql = "SELECT m.msme_id, msme_name, m.msme_logo, t.message, CONCAT(e.e_lname,', ' , e.e_fname, ' ', e.e_mname) AS entrepname, e.e_photo
            FROM msme m, entreprenuer e, testimonials t
            WHERE (e.e_id = m.e_id AND t.msme_id = m.msme_id) AND t.status = 1
            ORDER BY RAND() LIMIT 2 ";
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
    public function addTestimonials($data) {
        $db = $this->connectDB();
        $params = array($data['message'],$data['msme_id'],date('Y-m-d H:i:s'));

        $sql = "INSERT INTO testimonials (message, msme_id , created_date) VALUES (?,?,?)";
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

    public function checkIfAbleTestimonial($data) {
        $db = $this->connectDB();
        $sql = "SELECT m.msme_id, msme_name, (m.neededCapital - SUM(IFNULL(mv.amount,0))) AS remaining_neededCap, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + 30 DAY)) as rem, m.msme_logo
            FROM msme m,entreprenuer e, msme_venturer mv
            WHERE ('".$data['entrep_id']."' = e.e_id AND e.e_id = m.e_id AND mv.msme_id = m.msme_id) AND m.msme_id NOT IN(SELECT t.msme_id FROM testimonials t WHERE t.msme_id = m.msme_id)
            GROUP BY m.msme_id
            HAVING remaining_neededCap = 0 OR rem = 0 
            ORDER BY m.approve_date DESC LIMIT 1";
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
}