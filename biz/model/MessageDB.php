
<?php
class MessageDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function getLastMessage($data){
           $db = $this->connectDB();
        $sql ='SELECT me.message, TIME_FORMAT(message_time,"%h:%i %p") as timem, me.from_id
        FROM message me, msme m, investor i
        WHERE 
            (CASE WHEN '.$data["usertype"].' = 1
                THEN ((i.investor_id = '.$data["from_id"].' AND '.$data["to_id"].' = m.msme_id) 
                      AND 
                     (('.$data["from_id"].' = me.to_id AND '.$data["to_id"].' = me.from_id AND me.messageType = 1
                      AND me.to_status = 1)
                      OR
                     ('.$data["from_id"].' = me.from_id AND '.$data["to_id"].' = me.to_id AND me.messageType = 2 AND me.from_status = 1)))
                ELSE
                    ((i.investor_id = '.$data["from_id"].' AND m.msme_id = '.$data["to_id"].') 
                      AND 
                     (('.$data["from_id"].' = me.to_id AND '.$data["to_id"].' = me.from_id AND me.messageType = 2 AND me.to_status = 1)
                      OR
                     ('.$data["from_id"].' = me.from_id AND '.$data["to_id"].' = me.to_id AND me.messageType = 1 AND me.from_status = 1)))
                END)
            ORDER BY timestamp(me.message_date, me.message_time) DESC LIMIT 1';
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
    public function getChoosenConvo($data){
           $db = $this->connectDB();
        $sql ='SELECT me.message, me.message_time, me.message_date, me.message_id, me.messageType, MONTHNAME(me.message_date) as month, TIME_FORMAT(message_time,"%h:%i %p") as timem , 
        (CASE 
            WHEN '.$data["usertype"].' = 1 AND me.messageType = 1 THEN (m.msme_logo)
            WHEN '.$data["usertype"].' = 1 AND me.messageType = 2 THEN (i.investor_photo)
            WHEN '.$data["usertype"].' = 2 AND me.messageType = 1 THEN (m.msme_logo)
            WHEN '.$data["usertype"].' = 2 AND me.messageType = 2 THEN (i.investor_photo)
        ELSE ""
        END)
        AS name
        FROM message me, msme m, investor i
        WHERE 
            (CASE WHEN '.$data["usertype"].' = 1
                THEN ((i.investor_id = '.$data["from_id"].' AND '.$data["to_id"].' = m.msme_id) 
                      AND 
                     (('.$data["from_id"].' = me.to_id AND '.$data["to_id"].' = me.from_id AND me.messageType = 1
                      AND me.to_status = 1)
                      OR
                     ('.$data["from_id"].' = me.from_id AND '.$data["to_id"].' = me.to_id AND me.messageType = 2 AND me.from_status = 1)))
                ELSE
                    ((i.investor_id = '.$data["to_id"].' AND m.msme_id = '.$data["from_id"].') 
                      AND 
                     (('.$data["from_id"].' = me.to_id AND '.$data["to_id"].' = me.from_id AND me.messageType = 2 AND me.to_status = 1)
                      OR
                     ('.$data["from_id"].' = me.from_id AND '.$data["to_id"].' = me.to_id AND me.messageType = 1 AND me.from_status = 1)))
                END)
            ORDER BY timestamp(me.message_date, me.message_time) ASC ';
             // LIMIT '.$data['limit'].'
        // echo $sql;
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
    public function getUserConvo($data) {
        $db = $this->connectDB();
        $sql = 'SELECT me.messageType, 
        (CASE WHEN
                '.$data["usertype"].' = 1 THEN (m.msme_name)
        ELSE (CONCAT(i.investor_fname," ", i.investor_mname, " ", i.investor_lname))
        END)
        AS name,
        (CASE WHEN
                '.$data["usertype"].' = 1 THEN (m.msme_logo)
        ELSE (i.investor_photo)
        END) 
        AS logo, TIME_FORMAT(me.message_time,"%h:%i %p") as timem, IF(me.messageType = 1, me.to_id, me.from_id) AS investorId, IF(me.messageType = 1, me.from_id, me.to_id) AS msmeId
        
        FROM message me, msme m, investor i
        WHERE 
                 (CASE WHEN
             '.$data["usertype"].' = 1 
             THEN 
            ((CASE
            WHEN me.messageType = 2 THEN (me.to_id = m.msme_id)
            WHEN me.messageType = 1 THEN (me.from_id = m.msme_id)
            ELSE ""
            END)
               AND
            (CASE
            WHEN me.messageType = 1 THEN (me.to_id = '.$data["from_id"].')
            WHEN me.messageType = 2 THEN (me.from_id = '.$data["from_id"].')
            ELSE ""
            END))
            
            ELSE   
             ((CASE
            WHEN me.messageType = 1 THEN (me.to_id = i.investor_id)
            WHEN me.messageType = 2 THEN (me.from_id = i.investor_id)
            ELSE ""
            END)
             AND
            (CASE
            WHEN me.messageType = 2 THEN (me.to_id = '.$data["from_id"].')
            WHEN me.messageType = 1 THEN (me.from_id = '.$data["from_id"].')
            ELSE ""
            END)
            )
            END
            )
            GROUP BY
            (CASE WHEN
             '.$data["usertype"].' = 1 THEN
            (CASE
             WHEN me.messageType = 2 THEN (me.to_id)
             WHEN me.messageType = 1 THEN (me.from_id)
             ELSE ""
             END)
             ELSE
             (CASE
             WHEN me.messageType = 1 THEN (me.to_id)
             WHEN me.messageType = 2 THEN (me.from_id)
             ELSE ""
             END)
             END
             ) ORDER BY timestamp(me.message_date, me.message_time) DESC';
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
    public function getNameCurrentConvo($data) {
        $db = $this->connectDB();
        $sql = 'SELECT 
        IF('.$data["usertype"].' = 1, m.msme_name, CONCAT(i.investor_fname," ", i.investor_mname, " ", i.investor_lname)) AS name,
        IF ('.$data["usertype"].' = 1 ,  m.msme_logo, i.investor_photo) as photo
        FROM  msme m, investor i
        WHERE  IF ('.$data["usertype"].' = 1 ,  m.msme_id='.$data['to_id'].',  i.investor_id = '.$data['to_id'].')';
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
    public function sendMesageToAdminNotLogin($data) {
        $db = $this->connectDB();
        $params = array($data['name'],
        				$data['email'],
        				$data['subject'],
        				$data['message'],
        				date("Y/m/d"),
        				date("h:i:sa"),
        				2);
        $sql = "INSERT INTO message(name, email, subject, message, message_date, message_time, type)
                VALUES(?,?,?,?,?,?,?)";
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

    public function sendMessage($data) {
        $db = $this->connectDB();
        $params = array($data['from_id'],
                        $data['to_id'],
                        $data['message'],
                        date('Y-m-d'),date('H:i:s'),
                        $data['messageType']);
        $sql = "INSERT INTO message(from_id, to_id, message, message_date, message_time, messageType)
                VALUES(?,?,?,?,?,?)";
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
    public function getInvestorEmailById($data) {
        $db = $this->connectDB();
        $sql = "SELECT investor_email FROM investor WHERE investor_id = ".$data['to_id']." ";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result['investor_email'];
    }
    public function sendMesageToAdminLogin($data) {
        $db = $this->connectDB();
        $params = array($data['sender_id'],
                        $data['message'],
                        date("Y/m/d"),
                        date("h:i:sa"),
                        1);
        $sql = "INSERT INTO message(from_id, message, message_date, message_time, type)
                VALUES(?,?,?,?,?)";
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

}