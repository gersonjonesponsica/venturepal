
<?php
class CategoryDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function getAllCategory() {
      $db = $this->connectDB();
      $sql = "SELECT * FROM category where status = 1 ORDER BY (cat_name)";
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
    public function getAllCategory2() {
      $db = $this->connectDB();
      $sql = "SELECT * FROM category where status = 1 ORDER BY (cat_name)";
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
    public function getCategoryByID($id) {
        $db = $this->connectDB();
        $sql = "SELECT * FROM category WHERE cat_id = '".$id."'";
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

    public function getSubcategoryByCatID($id) {
        $db = $this->connectDB();
        $sql = "SELECT subcategory.sub_id, subcategory.sub_name, subcategory.cat_id, subcategory.icon_id, subcategory.status, icon.icon_name, icon.icon_location
        FROM subcategory
        INNER JOIN icon on subcategory.icon_id = icon.icon_id
        WHERE cat_id = '".$id."'";
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
      public function getFeature($id){
        $db = $this->connectDB();
          $sql = 'SELECT DISTINCT m.msme_id, m.msme_name, m.msme_desc, c.cat_name, m.msme_logo, m.approve_date,e.e_photo, m.msme_street, m.msme_brgy, cc.city_name , p.province_name ,m.msme_city, m.msme_state, m.msme_maxInvestment, m.msme_minInvestment, CONCAT(e.e_lname,", " , e.e_fname, " ", e.e_mname) AS entrepname, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + 30 DAY)) as rem, (m.msme_maxVent - COUNT(mv.msme_id)) AS remaining_venturer, (m.neededCapital - SUM(IFNULL(mv.amount,0))) AS remaining_neededCap, ROUND((SUM(IFNULL(mv.amount, 0)) / m.neededCapital * 100),0) as percent_raised, ROUND((SUM(IFNULL( mv.amount, 0))),0) AS raised, (SELECT COUNT(l.like_id) as totallikes FROM likes l WHERE l.like_to = m.msme_id) AS totallikes, 
          (SELECT IFNULL(AVG(rr.rr_rate),0) FROM rateandreview rr WHERE rr.rr_to = m.msme_id) AS rateAvarage
                FROM msme m
                INNER JOIN entreprenuer e ON e.e_id = m.e_id
                LEFT JOIN msme_venturer mv ON mv.msme_id = m.msme_id
                INNER JOIN subcategory sc ON sc.sub_id = m.sc_id
                INNER JOIN category c ON c.cat_id = sc.cat_id             
                INNER JOIN cities cc ON  m.msme_city = cc.city_id 
                INNER JOIN provinces p ON   m.msme_state = p.province_id
                WHERE sc.sub_id = m.sc_id AND c.cat_id = sc.cat_id AND c.cat_id = "'.$id.'"
                GROUP BY m.msme_id
                HAVING percent_raised <> 100 
                ORDER BY percent_raised DESC, rem DESC LIMIT 1';      
                // echo $sql;
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
    public function getTopOne($id){
        $db = $this->connectDB();
          $sql = 'SELECT m.msme_id, m.msme_name, m.msme_desc, m.msme_dateEstablish, e.e_photo,m.msme_street, m.msme_brgy, m.msme_city, m.msme_state, m.msme_networth, m.msme_grossincome, m.msme_netprofit, m.msme_size, m.status, m.msme_website, m.msme_logo, m.dti_status, m.msme_maxVent, m.msme_minVent, m.msme_maxInvestment, m.msme_minInvestment, m.msme_longitude, m.msme_latitude, m.biz_permit, m.msme_fb, m.approve_date,
            m.mayor_permit, m.dti_permit, CONCAT(e.e_lname,", " , e.e_fname, " ", e.e_mname) AS entrepname, e.e_email, e.e_fb, e.e_cpnum, e.e_telnum, m.dti_permit, m.bir_registration, m.locatormap, p.province_name, c.city_name, m.sec_registration, m.neededCapital, sc.sub_id ,sc.sub_name, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + cfi.numOfdays DAY)) as rem,     
        (SELECT ROUND(IFNULL(AVG(rr.rr_rate),0)) FROM rateandreview rr WHERE rr.rr_to = 3) AS rateAvarage,
    ROUND(((SELECT IFNULL(SUM(mv.amount), 0) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1) / m.neededCapital * 100),0) as percent_raised,(m.msme_maxVent - (select COUNT(mv.msme_id) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1)) AS remaining_venturer,(m.neededCapital - (SELECT IFNULL(SUM(mv.amount),0) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1)) AS remaining_neededCap,(SELECT COUNT(like_id) FROM likes WHERE like_to = m.e_id  AND si_status = 1 AND like_type = 1 ) AS totalLikes, (SELECT IFNULL(SUM(mv.amount),0) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1) as total_raised, (m.neededCapital - (SELECT IFNULL(SUM(mv.amount),0) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1)) as total_remaining,
        ROUND((SELECT IFNULL(AVG(rr.rr_rate),0) FROM rateandreview rr WHERE rr.rr_to = m.msme_id),1) AS rateAvarage
              FROM msme m,entreprenuer e,subcategory sc,cities c,provinces p,callforinvestment cfi
                where m.e_id = e.e_id and m.sc_id = sc.sub_id and m.msme_city = c.city_id and m.msme_state = p.province_id and cfi.status = 1 and cfi.msme_id = m.msme_id
                HAVING percent_raised <> 100
                ORDER BY percent_raised DESC, rem DESC LIMIT 1';      
                // echo $sql;
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