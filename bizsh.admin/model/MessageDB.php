
<?php
class MessageDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }

    public function getAllMessages() {
      $db = $this->connectDB();
      $sql = "SELECT * FROM message       
      where to_id = 0 ORDER BY message_date desc";
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

    public function getAllTodayMessages() {
      $db = $this->connectDB();
      $sql = "SELECT message.message_id, message.message, message.message_date, message.message_time, message.to_id, message.from_id, message.status, message.type, message.name, message.email, message.subject
      FROM message where message.message_date = cast(now() as date) and to_id = 0";
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

    public function getMessageByID($id) {
        $db = $this->connectDB();
        $sql = "SELECT * FROM message WHERE message_id = '".$id."'";
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

    public function deleteMessageByID($id) {
        $db = $this->connectDB();
        $sql = "DELETE FROM question WHERE question_id = '".$id."'";
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
    public function time_ago($timestamp){
      $time_ago = strtotime($timestamp);  
      $current_time = time();  
      $time_difference = $current_time - $time_ago;  
      $seconds = $time_difference;  
      $minutes      = round($seconds / 60 );           // value 60 is seconds  
      $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec  
      $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;  
      $weeks          = round($seconds / 604800);          // 7*24*60*60;  
      $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60  
      $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60  
      if($seconds <= 60)  
      {  
     return "Just Now";  
   }  
      else if($minutes <=60)  
      {  
     if($minutes==1)  
           {  
       return "one minute ago";  
     }  
     else  
           {  
       return "$minutes minutes ago";  
     }  
   }  
      else if($hours <=24)  
      {  
     if($hours==1)  
           {  
       return "an hour ago";  
     }  
           else  
           {  
       return "$hours hrs ago";  
     }  
   }  
      else if($days <= 7)  
      {  
     if($days==1)  
           {  
       return "yesterday";  
     }  
           else  
           {  
       return "$days days ago";  
     }  
   }  
      else if($weeks <= 4.3) //4.3 == 52/12  
      {  
     if($weeks==1)  
           {  
       return "a week ago";  
     }  
           else  
           {  
       return "$weeks weeks ago";  
     }  
   }  
       else if($months <=12)  
      {  
     if($months==1)  
           {  
       return "a month ago";  
     }  
           else  
           {  
       return "$months months ago";  
     }  
   }  
      else  
      {  
     if($years==1)  
           {  
       return "one year ago";  
     }  
           else  
           {  
       return "$years years ago";  
     }  
   }  
 }
     public function send_mail($email,$message,$subject){       
        try {
            require_once('../mailer/class.phpmailer.php');
            $from       = "jonesgerson29@gmail.com";
            $mail       = new PHPMailer();
            $mail->IsSMTP(true);            // use SMTP
            $mail->IsHTML(true);
            $mail->SMTPAuth   = true;                  // enable SMTP authentication
            $mail->Host       = "tls://smtp.gmail.com"; // SMTP host
            $mail->Port       =  465;                    // set the SMTP port
            $mail->Username   = "jonesgerson29@gmail.com";  // SMTP  username
            $mail->Password   = "myangelica<32014";  // SMTP password
            $mail->SetFrom($from, 'Gerson Jones Ponsica');
            $mail->AddReplyTo($from,'Do not reply!');
            $mail->Subject    = $subject;
            $mail->MsgHTML($message);
            $address = $email;
            $mail->AddAddress($address, $email);
            if($mail->Send()){
                echo "sent";
            }else
                echo "error";
            
            $mail->ClearAddresses();

        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }   

}