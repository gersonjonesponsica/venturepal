
<?php
class MsmeDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function searchMsme($data) {
        $db = $this->connectDB();
        $interest = $this->getInvestorInterest($data['investor_id']);
        $withCommaInterest = array();
        for($i = 0; $i < sizeof($interest); $i++){
          array_push($withCommaInterest, $interest[$i]['sub_id']);
        }
        $withCommaInterest =  implode(',', $withCommaInterest);

        $sql = "SELECT DISTINCT m2.*, DATEDIFF(CURRENT_DATE, m2.create_date) as age FROM (
SELECT m.msme_id, m.msme_name, m.msme_desc, e.e_photo, m.msme_logo, CONCAT(e.e_lname,', ' , e.e_fname, '', e.e_mname) AS entrepname, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + 30 DAY)) as rem,
  (SELECT cc.city_name FROM cities cc where cc.city_id = m.msme_city ) as city_name, m.msme_brgy,
  (SELECT pp.province_name FROM provinces pp where pp.province_id = m.msme_state)  as province_name,
    IFNULL((m.msme_maxVent - (SELECT COUNT(mv.msme_id) as m1 from msme_venturer mv where m.msme_id = mv.msme_id)),0) AS remaining_venturer, 
    IFNULL((m.neededCapital - (SELECT SUM(IFNULL(mv.amount,0)) as m2 from msme_venturer mv where m.msme_id = mv.msme_id)),0) AS remaining_neededCap, 
    IFNULL(ROUND(((SELECT SUM(IFNULL(mv.amount, 0)) as m3 from msme_venturer mv where m.msme_id = mv.msme_id)/ m.neededCapital * 100),0),0) as percent_raised,
    IFNULL(ROUND(((select SUM(IFNULL( mv.amount, 0)) as m4 from msme_venturer mv where mv.msme_id = m.msme_id)),0),0) AS raised,
    
    (SELECT COUNT(l.like_id) as totallikes FROM likes l WHERE l.like_to = m.msme_id) AS totallikes, m.sc_id, m.msme_minInvestment, m.msme_maxInvestment,
    m.msme_city, m.msme_state, m.create_date, (SELECT IFNULL(AVG(rr.rr_rate),0) FROM rateandreview rr WHERE rr.rr_to = m.msme_id) AS rateAvarage
FROM msme m,entreprenuer e, msme_venturer mv

WHERE e.e_id = m.e_id
GROUP BY m.msme_id
    HAVING (IF(remaining_neededCap = 0,percent_raised <> 100,rem > 0))) m2, bookmark b, investor i, interest it,msme_venturer mv, likes l
WHERE
((CASE WHEN ".$data['myMatches']." = 1 THEN(m2.msme_id IN(SELECT DISTINCT ms.msme_id FROM msme ms, interest i, investor inv WHERE i.v_id = ".$data['investor_id']." AND i.status = 1 AND ms.sc_id = i.sub_id AND inv.investor_id = ".$data['investor_id']." AND inv.investor_state = ms.msme_state AND ms.msme_city = inv.investor_city AND
((inv.min_investment >= ms.msme_minInvestment AND inv.min_investment <= ms.msme_maxInvestment) 
 OR (inv.max_investment >= ms.msme_minInvestment AND inv.max_investment <= ms.msme_maxInvestment)))) ELSE 1=1 END)
 AND
(CASE WHEN ".$data['bookmark']." = 1 THEN (b.to_id = m2.msme_id AND b.from_id = 1) ELSE 1 = 1 end)
 AND
 (CASE WHEN ".$data['partFunded']." = 1 THEN (m2.raised > 0) ELSE 1 = 1 END)
 AND
 ((CASE WHEN '".$data['city']."' <> '' THEN (m2.msme_city = '".$data['city']."') ELSE 1=1 END) 
 AND 
 (CASE WHEN '".$data['province']."' <>  '' THEN (m2.msme_state = '".$data['province']."') ELSE 1=1 END))
 AND
#filter by like of the venturer
(CASE WHEN ".$data['like']." = 1 THEN (l.like_to = m2.msme_id AND l.like_from = 1) ELSE 1 = 1 END)
 AND
 (CASE WHEN ".$data['latest']."  = 1 THEN (DATEDIFF(CURRENT_DATE, m2.create_date) < 7) ELSE 1=1 END)
 AND
 (CASE WHEN ".$data['category']."  = 1 THEN m2.sc_id IN(".$withCommaInterest.") ELSE 1 = 1 END)
 AND
 (CASE WHEN ".$data['featured']." = 1 THEN totallikes <> 0 ELSE 1 = 1 END)
 AND
 (CASE WHEN ".$data['idlerange']." = 1 THEN (".$data['maxInvestment']." <= m2.msme_maxInvestment AND ".$data['maxInvestment']." >= m2.msme_minInvestment AND ".$data['minInvestment']." <=  m2.msme_maxInvestment) ELSE 1=1 END)
 )
 AND 
 (CASE WHEN '".$data['keyword']."' <> '' THEN m2.msme_name LIKE '%".$data['keyword']."%' or  
 city_name LIKE '%".$data['keyword']."%' or province_name LIKE '%".$data['keyword']."%' ELSE 1=1 END)
#HAVING percent_raised > 100
ORDER BY 
     (CASE WHEN ".$data['sort']." = 1 AND ".$data['orderbylike']." = 1 THEN totallikes ELSE '' END) ASC,
     (CASE WHEN ".$data['sort']." = 0 AND ".$data['orderbylike']." = 1 THEN totallikes ELSE '' END) DESC,
     (CASE WHEN ".$data['sort']." = 1 AND ".$data['orderbycompletion']." = 1 THEN m2.percent_raised ELSE '' END) ASC,
     (CASE WHEN ".$data['sort']." = 0 AND ".$data['orderbycompletion']." = 1 THEN m2.percent_raised ELSE '' END) DESC";
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
    public function getAllEntrepMSMEbyID2($entrep_id) {
      $db = $this->connectDB();
      $sql = 'SELECT m.msme_id, s.sub_name, m.msme_logo, m.msme_minInvestment, m.approve_date,m.msme_maxInvestment, e.e_photo, m.msme_name, m.msme_desc, CONCAT(e.e_lname,", " , e.e_fname, " ", e.e_mname) AS entrepname, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + 30 DAY)) as rem,
         IFNULL((SELECT (m.msme_maxVent - COUNT(mv.msme_id))  FROM msme_venturer mv where mv.msme_id = m.msme_id),0) AS remaining_venturer , 
         (m.neededCapital - (IFNULL((SELECT SUM(IFNULL(mv.amount,0)) FROM msme_venturer mv where mv.msme_id = m.msme_id),0))) AS remaining_neededCap , 
         ROUND(IFNULL((SELECT SUM(IFNULL(mv.amount,0)) from msme_venturer mv where mv.msme_id = m.msme_id),0) / m.neededCapital * 100,0) as percent_raised1,
         IFNULL((SELECT ROUND((SUM(IFNULL( mv.amount, 0))),0)  FROM msme_venturer mv where mv.msme_id = m.msme_id),0) AS raised, 
         IFNULL((SELECT COUNT(l.like_id) FROM likes l WHERE l.like_to = m.msme_id),0) AS totallikes, (SELECT IFNULL(AVG(rr.rr_rate),0) FROM rateandreview rr WHERE rr.rr_to = m.msme_id) AS rateAvarage
       FROM msme m
          INNER JOIN entreprenuer e ON e.e_id = m.e_id 
          INNER JOIN subcategory s ON s.sub_id = m.sc_id 
          INNER JOIN cities c ON m.msme_city = c.city_id 
          INNER JOIN provinces p ON m.msme_state = p.province_id
          WHERE m.status = 1 AND m.e_id = '.$entrep_id.'
          group by m.msme_id 
          ORDER By percent_raised1 DESC';      

      $result = false;
      // echo $sql;
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
    public function getAllEntrepMSMEbyID($id) {
        $db = $this->connectDB();
        $sql = 'SELECT DISTINCT  m.status, m.msme_id, m.msme_name, m.msme_logo, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + 30 DAY)) as rem, IFNULL((Select ROUND((SUM(IFNULL(mv.amount, 0)) / m.neededCapital * 100),0) from msme_venturer mv where m.msme_id = mv.msme_id),0)  as percent_raised
          FROM msme m where m.e_id = "'.$id.'" group by m.msme_id
          ORDER BY percent_raised DESC';

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
    public function getSummary() {
        $db = $this->connectDB();
        $sql = 'SELECT (SELECT COUNT(acc_id) FROM accounts WHERE acc_type = 1 AND acc_status = 1) as investors, (SELECT SUM(amount) FROM msme_venturer) deployed, (SELECT COUNT(ms.msme_id) FROM (SELECT m.msme_id
        FROM msme m,callforinvestment cfi
        WHERE m.msme_id = cfi.msme_id
        GROUP BY m.msme_id) as ms) as funded,(SELECT SUM(mv.amount) FROM msme_venturer mv,callforinvestment cfi WHERE mv.cfi_id = cfi.call_id and cfi.status = 1) as investment';

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
    public function getCycleDetails($data) {
        $db = $this->connectDB();
        $sql = "SELECT cfi.call_id,cfi.cycle, COUNT(mv.v_id) as numOfInvestor, CONCAT(DATE_FORMAT(cfi.launch_date,'%M %d %Y'),' to ', DATE_FORMAT(TIMESTAMPADD(DAY,cfi.numOfdays,cfi.launch_date), '%M %d %Y')) as duration,if(cfi.status = 0, 'PAID','ONGOING') as status,cfi.numOfdays,cfi.interestrate,cfi.amount
            FROM callforinvestment cfi, msme_venturer mv
            WHERE mv.msme_id = '".$data['msmeid']."' and mv.cfi_id = cfi.call_id AND if('".$data['type']."' <> 2 , IF('".$data['type']."' = 0 , cfi.status = 0, cfi.status = 1), cfi.status = 1 or cfi.status = 0)
            GROUP BY cfi.call_id";

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
    public function getInvestorInterest($id) {
        $db = $this->connectDB();
        $sql = "SELECT i.status, i.v_id, s.sub_name, i.sub_id
        from interest i
        INNER JOIN subcategory s on i.sub_id = s.sub_id
        WHERE i.v_id = '".$id."' AND i.status = '1' ";
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
    public function getMsmeInvestor2($msme_id, $v_id) {
        $db = $this->connectDB();
        $sql = "SELECT mv.amount, CONCAT(i.investor_lname,', ' , i.investor_fname, ' ', i.investor_mname) AS investorName, 
        i.investor_photo, mv.v_id, c.contract_file , c.proof_invesment, mv.msme_id, c.contract_date
        from msme_venturer mv
        INNER JOIN investor i on mv.v_id = i.investor_id
        INNER JOIN contract c on c.v_id = i.investor_id
        WHERE mv.msme_id = '".$msme_id."' AND mv.v_id = '".$v_id."'
        group by mv.v_id";
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
    public function getInvestorMsmeHistory($msme_id, $v_id) {
        $db = $this->connectDB();
        $sql = "SELECT mv.amount, m.msme_name, mv.v_id, m.msme_logo, c.contract_file , c.proof_invesment, mv.msme_id, c.contract_date
        FROM contract c, msme_venturer mv, msme m
        WHERE mv.msme_id = '".$msme_id."' AND mv.v_id = '".$v_id."' AND c.v_id = mv.v_id AND c.msme_id = mv.msme_id 
        AND m.msme_id = mv.msme_id AND c.msme_id = mv.msme_id
        group by mv.v_id ";
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
    public function getMsmeInvestor($msme_id) {
        $db = $this->connectDB();
        $sql = "SELECT mv.amount, CONCAT(i.investor_lname,', ' , i.investor_fname, ' ', i.investor_mname) AS investorName, i.investor_photo, mv.v_id
        from msme_venturer mv
        INNER JOIN investor i on mv.v_id = i.investor_id
        WHERE mv.msme_id = '".$msme_id."' ";
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
    public function getMsmeInvestorSubscribe($msme_id) {
        $db = $this->connectDB();
        $sql = "SELECT mv.amount, CONCAT(i.investor_lname,', ' , i.investor_fname, ' ', i.investor_mname) AS investorName, i.investor_photo, mv.v_id
        from msme_venturer mv
        INNER JOIN investor i on mv.v_id = i.investor_id
        WHERE mv.msme_id = '".$msme_id."' ";
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
    public function deleteMsmeByID($id) {
        $db = $this->connectDB();
        $sql = "";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute();
            $db = null;
        } catch (PDOException $fex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }
    public function addTemporaryMSME($data) {
        $db = $this->connectDB();
        $sql = "INSERT INTO msme(create_date, e_id) VALUES ('".$data['datenow']."','".$data['e_id']."' )";
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

    public function deleteAdminByID($id) {
        $db = $this->connectDB();
        $sql = "DELETE FROM admin WHERE admin_id = '".$id."'";
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
    public function checkAdminUsername($username) {
        $db = $this->connectDB();
        $sql = "SELECT username FROM admin WHERE username = '".$username."'";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return $result;    
    }
    public function getEntrepByAccountID($id) {
        $db = $this->connectDB();
        $sql = "SELECT entreprenuer.e_id, entreprenuer.e_lname, entreprenuer.e_fname, entreprenuer.e_mname, entreprenuer.e_street, entreprenuer.e_brgy, entreprenuer.e_state, entreprenuer.e_city, entreprenuer.e_brgy, cities.city_name, 
        provinces.province_name, entreprenuer.e_photo, entreprenuer.e_email, entreprenuer.e_fb, entreprenuer.e_cpnum, entreprenuer.e_telnum, entreprenuer.e_desc, entreprenuer.e_notify_status, 
        entreprenuer.cp_notify_status, entreprenuer.create_date, entreprenuer.delete_date, entreprenuer.update_date, entreprenuer.status
        FROM entreprenuer 
        INNER JOIN cities ON entreprenuer.e_city = cities.city_id
        INNER JOIN provinces ON entreprenuer.e_state = provinces.province_id
        WHERE entreprenuer.e_id = '".$id."' ";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return json_encode($result);    
    }
    public function getMSMEbyCreateDate($create_date, $e_id) {
      $db = $this->connectDB();
      $sql = "SELECT msme_id FROM msme where create_date = '".$create_date."' 
      AND e_id = '".$e_id."'";
      $result = false;
      try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        $db = null;
      } catch(PDOException $ex) {
        echo "DB Error:", $ex->getMessage();
      }
      return $result['msme_id'];
    }
    public function getMsmeGallery($data){
      $db = $this->connectDB();
      $sql = "SELECT * FROM document where doc_type = '2' 
      AND msme_id = '".$data['msme_id']."' AND status = '1'";
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
    public function getMsmeDocument($data){
      $db = $this->connectDB();
      $sql = "SELECT * FROM document where doc_type = '1' 
      AND msme_id = '".$data['msme_id']."' AND status = '1' ";
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
    public function deleteDocumentByID($data) {
        $db = $this->connectDB();
        $sql = "UPDATE document SET status = '2' where msme_id = '".$data['msme_id']."' AND doc_id = '".$data['doc_id']."'";
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
    // public function getMsmeApproveDate($data) {
    //   $db = $this->connectDB();
    //   $sql = 'SELECT approve_date FROM msme where msme_id = "'.$data['msme_id'].'" ';      

    //   $result = false;
    //   try {
    //     $stmt = $db->prepare($sql);
    //     $stmt->execute();
    //     $result = $stmt->fetch();
    //     $db = null;
    //   } catch(PDOException $ex) {
    //     echo "DB Error:", $ex->getMessage();
    //   }
    //   return json_encode($result);
    // }   

    public function getMsmeApproveDate2($msme_id) {
      $db = $this->connectDB();
      $sql = 'SELECT approve_date FROM msme where msme_id = "'.$msme_id.'" ';      

      $result = false;
      try {
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        $db = null;
      } catch(PDOException $ex) {
        echo "DB Error:", $ex->getMessage();
      }
      return $result['approve_date'];
    } 
    public function extendMsmeDuration($data){
      $app_data = $this->getMsmeApproveDate2($data['msme_id']);
      return $app_data;
    }
  
    public function getAllMsmeMatchByInvestor($data) {
      $db = $this->connectDB();
      $sql = "SELECT DISTINCT m2.*, DATEDIFF(CURRENT_DATE, m2.create_date) as age FROM (
SELECT m.msme_id, m.msme_name, m.msme_desc, e.e_photo, m.msme_logo, CONCAT(e.e_lname,', ' , e.e_fname, '', e.e_mname) AS entrepname, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + 30 DAY)) as rem,
  (SELECT cc.city_name FROM cities cc where cc.city_id = m.msme_city ) as city_name, m.msme_brgy,
  (SELECT pp.province_name FROM provinces pp where pp.province_id = m.msme_state)  as province_name,
    IFNULL((m.msme_maxVent - (SELECT COUNT(mv.msme_id) as m1 from msme_venturer mv where m.msme_id = mv.msme_id)),0) AS remaining_venturer, 
    IFNULL((m.neededCapital - (SELECT SUM(IFNULL(mv.amount,0)) as m2 from msme_venturer mv where m.msme_id = mv.msme_id)),0) AS remaining_neededCap, 
    IFNULL(ROUND(((SELECT SUM(IFNULL(mv.amount, 0)) as m3 from msme_venturer mv where m.msme_id = mv.msme_id)/ m.neededCapital * 100),0),0) as percent_raised,
    IFNULL(ROUND(((select SUM(IFNULL( mv.amount, 0)) as m4 from msme_venturer mv where mv.msme_id = m.msme_id)),0),0) AS raised,
    
    (SELECT COUNT(l.like_id) as totallikes FROM likes l WHERE l.like_to = m.msme_id) AS totallikes, m.sc_id, m.msme_minInvestment, m.msme_maxInvestment,
    m.msme_city, m.msme_state, m.create_date, (SELECT IFNULL(AVG(rr.rr_rate),0) FROM rateandreview rr WHERE rr.rr_to = m.msme_id) AS rateAvarage
FROM msme m,entreprenuer e, msme_venturer mv

WHERE e.e_id = m.e_id
GROUP BY m.msme_id
    HAVING (IF(remaining_neededCap = 0,percent_raised <> 100,rem <> 0))) m2, bookmark b, investor i, interest it,msme_venturer mv, likes l
WHERE
((CASE WHEN 1 = 1 THEN(m2.msme_id IN(SELECT DISTINCT ms.msme_id FROM msme ms, interest i, investor inv WHERE i.v_id = ".$data['investor_id']." AND i.status = 1 AND ms.sc_id = i.sub_id AND inv.investor_id = ".$data['investor_id']." AND inv.investor_state = ms.msme_state AND ms.msme_city = inv.investor_city AND
((inv.min_investment >= ms.msme_minInvestment AND inv.min_investment <= ms.msme_maxInvestment) 
 OR (inv.max_investment >= ms.msme_minInvestment AND inv.max_investment <= ms.msme_maxInvestment)))) ELSE 1=1 END))
 
#HAVING percent_raised > 100
ORDER BY 
     (CASE WHEN ".$data['sort']." = 1 AND ".$data['orderbylike']." = 1 THEN totallikes ELSE '' END) ASC,
     (CASE WHEN ".$data['sort']." = 0 AND ".$data['orderbylike']." = 1 THEN totallikes ELSE '' END) DESC,
     (CASE WHEN ".$data['sort']." = 1 AND ".$data['orderbycompletion']." = 1 THEN m2.percent_raised ELSE '' END) ASC,
     (CASE WHEN ".$data['sort']." = 0 AND ".$data['orderbycompletion']." = 1 THEN m2.percent_raised ELSE '' END) DESC ";      

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
    public function getMSMEbyId($data) {
      $db = $this->connectDB();
      $sql = 'SELECT DISTINCT m.msme_id, m.msme_name, m.msme_desc, m.msme_dateEstablish, e.e_photo,m.msme_street, m.msme_brgy, m.msme_city, m.msme_state, m.msme_networth, m.msme_grossincome, m.msme_netprofit, m.msme_size, m.status, m.msme_website, m.msme_logo, m.dti_status, m.msme_maxVent, m.msme_minVent, m.msme_maxInvestment, m.msme_minInvestment, m.msme_longitude, m.msme_latitude, m.biz_permit, m.msme_fb, m.approve_date,
        m.mayor_permit, m.dti_permit, CONCAT(e.e_lname,", " , e.e_fname, " ", e.e_mname) AS entrepname, e.e_email, e.e_fb, e.e_cpnum, e.e_telnum, m.dti_permit, m.bir_registration, m.locatormap, p.province_name, c.city_name, m.sec_registration, m.neededCapital, sc.sub_id ,sc.sub_name, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + cfi.numOfdays DAY)) as rem,     
(SELECT ROUND(IFNULL(AVG(rr.rr_rate),0)) FROM rateandreview rr WHERE rr.rr_to = 3) AS rateAvarage,
ROUND(((SELECT IFNULL(SUM(mv.amount), 0) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1) / m.neededCapital * 100),0) as percent_raised,(m.msme_maxVent - (select COUNT(mv.msme_id) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1)) AS remaining_venturer,(m.neededCapital - (SELECT IFNULL(SUM(mv.amount),0) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1)) AS remaining_neededCap,(SELECT COUNT(like_id) FROM likes WHERE like_to = "'.$data['msme_id'].'" AND si_status = 1 AND like_type = 1 ) AS totalLikes, (SELECT IFNULL(SUM(mv.amount),0) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1) as total_raised, (m.neededCapital - (SELECT IFNULL(SUM(mv.amount),0) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1)) as total_remaining,
    ROUND((SELECT IFNULL(AVG(rr.rr_rate),0) FROM rateandreview rr WHERE rr.rr_to = m.msme_id),1) AS rateAvarage,
     (SELECT COUNT(cfi.call_id) FROM callforinvestment cfi WHERE cfi.msme_id = m.msme_id AND cfi.status = 1) as countStatus 
          FROM msme m,entreprenuer e,subcategory sc,cities c,provinces p, callforinvestment cfi
            where m.msme_id = "'.$data['msme_id'].'" and m.e_id = e.e_id and m.sc_id = sc.sub_id and m.msme_city = c.city_id and m.msme_state = p.province_id ';      

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
    public function getPopularMSME($data) {
      $db = $this->connectDB();
          $sql = 'SELECT m.msme_id, m.msme_name, m.msme_desc, m.msme_dateEstablish, e.e_photo,m.msme_street, m.msme_brgy, m.msme_city, m.msme_state, m.msme_networth, m.msme_grossincome, m.msme_netprofit, m.msme_size, m.status, m.msme_website, m.msme_logo, m.dti_status, m.msme_maxVent, m.msme_minVent, m.msme_maxInvestment, m.msme_minInvestment, m.msme_longitude, m.msme_latitude, m.biz_permit, m.msme_fb, m.approve_date,
            m.mayor_permit, m.dti_permit, CONCAT(e.e_lname,", " , e.e_fname, " ", e.e_mname) AS entrepname, e.e_email, e.e_fb, e.e_cpnum, e.e_telnum, m.dti_permit, m.bir_registration, m.locatormap, p.province_name, c.city_name, m.sec_registration, m.neededCapital, sc.sub_id ,sc.sub_name, timestampdiff(DAY, now(), DATE_ADD(m.approve_date, INTERVAL + cfi.numOfdays DAY)) as rem,     
        (SELECT ROUND(IFNULL(AVG(rr.rr_rate),0)) FROM rateandreview rr WHERE rr.rr_to = 3) AS rateAvarage,
    ROUND(((SELECT IFNULL(SUM(mv.amount), 0) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1) / m.neededCapital * 100),0) as percent_raised,(m.msme_maxVent - (select COUNT(mv.msme_id) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1)) AS remaining_venturer,(m.neededCapital - (SELECT IFNULL(SUM(mv.amount),0) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1)) AS remaining_neededCap,(SELECT COUNT(like_id) FROM likes WHERE like_to = m.e_id  AND si_status = 1 AND like_type = 1 ) AS totalLikes, (SELECT IFNULL(SUM(mv.amount),0) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1) as total_raised, (m.neededCapital - (SELECT IFNULL(SUM(mv.amount),0) FROM msme_venturer mv, callforinvestment cfi where mv.msme_id = m.msme_id and mv.cfi_id = cfi.call_id and cfi.status = 1)) as total_remaining,
        ROUND((SELECT IFNULL(AVG(rr.rr_rate),0) FROM rateandreview rr WHERE rr.rr_to = m.msme_id),1) AS rateAvarage
              FROM msme m,entreprenuer e,subcategory sc,cities c,provinces p,callforinvestment cfi
                where m.e_id = e.e_id and m.sc_id = sc.sub_id and m.msme_city = c.city_id and m.msme_state = p.province_id and cfi.status = 1 and cfi.msme_id = m.msme_id
                HAVING percent_raised < 100';      

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

     public function getPartlyFunded($data) {
      $db = $this->connectDB();
      // var $ext = 0;
          $sql = "SELECT m.msme_id, m.msme_name, m.msme_desc, SUM(cfi.amount) as raised, CONCAT(e.e_lname,', ',e.e_fname,' ',e.e_mname) as entrepname,m.msme_logo, e.e_photo,count(call_id) as roll, 
    (SELECT COUNT(c.call_id) FROM callforinvestment c WHERE m.msme_id = c.msme_id and c.status = 1) as ongoingRoll,
    (SELECT COUNT(c.call_id) FROM callforinvestment c WHERE m.msme_id = c.msme_id and c.status = 0) as doneRoll
    FROM msme m, callforinvestment cfi,entreprenuer e
    WHERE m.msme_id = cfi.msme_id and m.e_id = e.e_id AND cfi.msme_id = m.msme_id AND (cfi.launch_status = 1 )

    GROUP BY m.msme_id ORDER BY raised DESC";      

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
   
    public function addMSME($data) {
        $db = $this->connectDB();
        $params = array($data['categories'],
                        $data['badge'],
                        $data['barangay'],
                        $data['province'],
                        $data['city'],
                        $data['establishdate'],
                        $data['capneeded'],
                        $data['bname'],
                        $data['profit'],
                        $data['worth'],
                        $data['gross'],
                        $data['g_desc'],
                        $data['b_desc'],
                        $data['b_video'],
                        $data['website'],
                        $data['long'],
                        $data['lat'],
                        $data['capneeded'] - 100,
                        100,
                        2, 
                        $data['capneeded'] / 100);

        $sql = "UPDATE msme SET sc_id = ?, 
                              msme_size = ? ,
                              msme_brgy = ? ,
                              msme_state = ? ,
                              msme_city = ? ,
                              msme_dateEstablish = ? ,
                              neededCapital = ? ,
                              msme_name = ? ,
                              msme_netprofit = ? ,
                              msme_networth = ? ,
                              msme_grossincome = ? ,
                              msme_galdesc = ? ,
                              msme_desc = ? ,
                              msme_video = ? ,
                              msme_website = ?,
                              msme_longitude = ?,
                              msme_latitude = ?,
                              msme_maxInvestment = ? ,
                              msme_minInvestment = ?,
                              msme_minVent = ?, 
                              msme_maxVent = ?

        WHERE msme_id = '".$data['msme_id']."' ";

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
    public function updateStatus($data) {
        $db = $this->connectDB();
        $sql = "UPDATE admin SET status = '".$data['stat']."' where admin_id = '".$data['admin_id']."'";
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
    public function updateMsmeDesc($data) {
        $db = $this->connectDB();
        $sql = "UPDATE msme SET msme_desc = '".$data['desc']."' where msme_id = '".$data['msme_id']."'";
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
    public function updateMsmeCategory($data) {
        $db = $this->connectDB();
        $sql = "UPDATE msme SET sc_id = '".$data['sub_id']."' 
        where msme_id = '".$data['msme_id']."'";
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
    public function updateBusinessDetails($data) {
        $db = $this->connectDB();
        $params = array($data['date_es'],
                        $data['net_worth'],
                        $data['gross_income'],
                        $data['net_profit'],
                        $data['msme_id']);
        $sql = "UPDATE msme 
        SET msme_dateEstablish = ?, msme_networth = ?, msme_grossincome = ?,  msme_netprofit = ?
        where msme_id = ?";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute($params);
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error: ", $ex->getMessage();
        }
        return $result;
    }
    public function updateContactDetails($data) {
        $db = $this->connectDB();
        $params = array($data['website'],
                        $data['facebook'],
                        $data['msme_id']);
        $sql = "UPDATE msme  SET  msme_website = ?,  msme_fb = ?
        where msme_id = ?";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute($params);
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error: ", $ex->getMessage();
        }
        return $result;
    }            
    public function UploadMSMEPhoto($data) {
        $db = $this->connectDB();
        $sql = "UPDATE msme SET msme_logo = '".$data['newfilename']."' where msme_id = '".$data['msme_id']."'";
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
    public function UploadBizPermit($data) {
        $db = $this->connectDB();
        $sql = "UPDATE msme SET biz_permit = '".$data['newfilename']."' where msme_id = '".$data['msme_id']."'";
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
    public function UploadMayorPermit($data) {
        $db = $this->connectDB();
        $sql = "UPDATE msme SET mayor_permit = '".$data['newfilename']."' where msme_id = '".$data['msme_id']."'";
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
    public function UploadDTICertificate($data) {
        $db = $this->connectDB();
        $sql = "UPDATE msme SET dti_permit = '".$data['newfilename']."' where msme_id = '".$data['msme_id']."'";
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
    public function updateCoordinate($data){
        $db = $this->connectDB();
        $sql = "UPDATE msme SET msme_longitude = '".$data['lng']."', msme_latitude = '".$data['lat']."' where msme_id = '".$data['msme_id']."' AND e_id='".$data['e_id']."' ";
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
    public function UploadMSMEDocument($data) {
        $db = $this->connectDB();
         $params = array($data['newfilename'],
                        $data['msme_id'],
                        date('Y-m-d H:i:s'),1);

        $sql = "INSERT INTO document (doc_name, msme_id, created_date, doc_type) VALUES (?,?,?,?)";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute($params);
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error: ", $ex->getMessage();
        }
        return $result;
    }                
    public function UploadMSMEGallery($data) {
        $db = $this->connectDB();
         $params = array($data['newfilename'],
                        $data['msme_id'],
                        date('Y-m-d H:i:s'),2);

        $sql = "INSERT INTO document (doc_name, msme_id, created_date,doc_type) VALUES (?,?,?,?)";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $result = $stmt->execute($params);
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error: ", $ex->getMessage();
        }
        return $result;
    }    
    public function UploadEtrepDetails($data) {
        $db = $this->connectDB();
        $sql = "UPDATE entreprenuer SET e_fname = '".$data['fname']."',
                                        e_lname = '".$data['lname']."',
                                        e_mname = '".$data['mname']."',
                                        e_street = '".$data['street']."',
                                        e_brgy = '".$data['barangay']."',
                                        e_city = '".$data['city']."',
                                        e_state = '".$data['province']."',
                                        e_email = '".$data['email']."',
                                        e_fb = '".$data['fb']."',
                                        e_cpnum = '".$data['mobile']."',
                                        e_telnum = '".$data['telephone']."',
                                        e_desc = '".$data['desc']."',
                                        update_date = '".date('Y-m-d H:i:s')."'
                                         WHERE e_id = '".$data['entrep_id']."'";
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
}