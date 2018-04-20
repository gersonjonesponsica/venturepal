
<?php
class AddressDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }

    public function getAllState() {
        $db = $this->connectDB();
        $sql = "SELECT * FROM provinces";
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

    public function getAllCities($prov_id) {
        $db = $this->connectDB();
        $sql = "SELECT * FROM cities where province_id = '".$prov_id."' ";
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
    public function getAddress($data) {
        $db = $this->connectDB();
          $sql = "SELECT provinces.province_name, cities.city_name
          from  provinces, cities
          WHERE provinces.province_id = '".$data['prob_id']."' 
          AND cities.city_id = '".$data['city_id']."' ";
        
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
}