
<?php
class AdminDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function loginAdmin($data){
        $password = md5($data['password']);
        $db = $this->connectDB(); 
        $sql = "SELECT * FROM admin WHERE username= '".$data['username']."' AND 
        password = '".$password."' AND status = 1";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            $db = null;
        } catch(PDOException $ex) {
            echo "DB Error:", $ex->getMessage();
        }
        return $result;
    }
    public function addAdmin($data) {
        $db = $this->connectDB();
        $params = array(ucfirst($data['fname']),
                        ucfirst($data['lname']),
                        $data['email'],
                        $data['username'],
                        $data['password'],
                        date('Y-m-d H:i:s'));
        $sql = "INSERT INTO admin(fname, lname, email, username, password,date_created)
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
    public function getUserIDbyEmail($email) {
        $db = $this->connectDB();
        $sql = "SELECT userID FROM accounts WHERE userEmail = '".$email."'";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return $result['userID'];    
    }
    
    public function getAllAdmin() {
      $db = $this->connectDB();
      $sql = "SELECT * FROM admin where status = 1 OR status = 0";
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

    public function updateUserToken($data) {
        $db = $this->connectDB();
        $sql = "UPDATE accounts SET tokenCode = '".$data['token']."' where userEmail = '".$data['email']."'";
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
    public function resetUserPassword($data) {
        $db = $this->connectDB();
        $password = md5($data['password']);
        $sql = "UPDATE accounts SET userPass = '".$password."'  where userID = '".$data['id']."' 
        AND tokenCode = '".$data['code']."' ";
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
    public function confirmRegistration($data) {
        $db = $this->connectDB();
        $sql = "UPDATE accounts SET userStatus = 'Y' where userID = '".$data['idid']."' 
        AND tokenCode = '".$data['codecode']."'";
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

    public function createAccountWithFb($data) {
        $db = $this->connectDB();
        $params = array($data['fb_name'],
                        $data['fb_id'],
                        md5($data['fb_email']),
                        $data['fb_prof']);
        $sql = "INSERT INTO facebook_login(fb_name, fb_id, fb_email, fb_prof)
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
    public function send_mail($email,$message,$subject){       
        try {
            require_once('../mailer/class.phpmailer.php');
            $from       = "from@yourwebsite.com";
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
            $mail->Send(); 
            $mail->ClearAddresses();

        } catch (Exception $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
    }  
    public function is_logged_in(){
        if(isset($_SESSION['userSession'])){
            return true;
        }
    }
    
    public function redirect($url){
        header("Location: $url");
    }
    
    public function logout(){
        session_destroy();
        $_SESSION['userSession'] = false;
    } 
}