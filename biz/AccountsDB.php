<?php
class AccountsDB
{
    public function connectDB() {
        return new PDO('mysql:host=' . DB_HOST.  ';dbname=' . DB_NAME, DB_UID, DB_PWD);
    }
    public function loginUser($data){
        $password = md5($data['password']);
        $db = $this->connectDB();
        $sql = "SELECT * FROM accounts WHERE acc_email = '".$data['email']."' AND 
        acc_password = '".$password."' AND acc_status <> 2";
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
    public function createLoginLog($acc_id) {
        $db = $this->connectDB();
        $params = array($acc_id, date("Y-m-d H:i:s"));
        $sql = "INSERT INTO loginlogs(acc_id, created_date) VALUES(?,?)";
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
    public function getUserDetailsByIdAndType($type, $id) {
        $db = $this->connectDB();
        if($type == 1){
            $sql = "SELECT * FROM investor WHERE investor_id = '".$id."'";
        }else{
            $sql = "SELECT * FROM investee WHERE investee_id = '".$id."'";
        }
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return json_encode($result);    
    }
    public function addSubscription($data) {
        $db = $this->connectDB();
        $params = array($data['item_number'],
                        date("Y-m-d H:i:s"));
        $sql = "INSERT INTO subscription ( account_id, created_date)
                VALUES(?,?)";
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
    public function checkInvestorSubscription($data) {
        $db = $this->connectDB();
        $sql = "SELECT * from subscription WHERE account_id = '".$data['userid']."' AND status = '1' ";
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
    public function getAccountDetailsByIDandType($data) {
        $db = $this->connectDB();
        if ($data['type'] == 1) {
          $sql = "SELECT investor.investor_id, investor.investor_lname, investor.investor_fname, investor.investor_mname, investor.investor_street, investor.investor_city, investor.investor_state, investor.investor_photo, investor.investor_fb, investor.eNotify_status, investor.cpNotify_status, investor.phone_verify_status, investor.phone_verify_code,
              investor.max_investment, investor.min_investment,  
              investor.investor_cpNum, investor.investor_telNum, investor.investor_desc, 
              investor.investor_wallet, accounts.acc_email, cities.city_name, provinces.province_name
          FROM investor
          INNER JOIN accounts on accounts.investor_id = investor.investor_id
          LEFT JOIN cities on investor.investor_city = cities.city_id
          LEFT JOIN provinces on investor.investor_state = provinces.province_id
          WHERE accounts.acc_status = 1 and investor.investor_id = ".$data['id']." ";
        }else{
            $sql = "SELECT entreprenuer.e_lname, entreprenuer.e_fname, entreprenuer.e_mname, entreprenuer.e_street ,entreprenuer.e_brgy ,entreprenuer.e_city, entreprenuer.e_state, entreprenuer.e_photo,entreprenuer.e_email,entreprenuer.e_fb, entreprenuer.e_cpnum, entreprenuer.e_telnum, entreprenuer.e_desc, entreprenuer.e_notify_status, entreprenuer.cp_notify_status, entreprenuer.status, cities.city_name, provinces.province_name, accounts.acc_email
            FROM entreprenuer
            LEFT JOIN accounts ON accounts.investee_id = entreprenuer.e_id
            INNER JOIN cities ON entreprenuer.e_city = cities.city_id
            INNER JOIN provinces ON entreprenuer.e_state = provinces.province_id
            WHERE accounts.acc_status = 1 and entreprenuer.e_id = ".$data['id']."";
        }
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

    public function getUserIDbyEmail($email) {
        $db = $this->connectDB();
        $sql = "SELECT acc_id FROM accounts WHERE acc_email = '".$email."'";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return $result['acc_id'];    
    }

    public function getUserPhoto($email) {
        $db = $this->connectDB();
        $sql = "SELECT acc_id FROM accounts WHERE acc_email = '".$email."'";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return $result['acc_id'];    
    }

    public function checkEmail($email) {
        $db = $this->connectDB();
        $sql = "SELECT acc_email FROM accounts WHERE acc_email = '".$email."'";
        $stmt = $db->prepare($sql);
        $stmt ->execute();
        $result = $stmt->fetch();
        $db = null;
        return $result;    
    }

    public function updateUserToken($data) {
        $db = $this->connectDB();
        $sql = "UPDATE accounts SET tokenCode = '".$data['token']."' where acc_email = '".$data['email']."'";
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
        $sql = "UPDATE accounts SET acc_password = '".$password."'  where acc_id = '".$data['id']."' 
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
    public function changePassword($data) {
        $db = $this->connectDB();
        $password = md5($data['password']);
        $sql = "UPDATE accounts SET acc_password = '".$password."'  where acc_id = '".$data['acc_id']."' ";
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
        $sql = "UPDATE accounts SET acc_status = 1 where acc_id = '".$data['idid']."' 
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
    public function createAccount($data) {
        $db = $this->connectDB();
        $params = array($data['username'],
                        $data['email'],
                        md5($data['password']),
                        $data['code'],
                        $data['type'],
                        $data['investor_id'],
                        date("Y-m-d H:i:s"));
        $sql = '';
        if ($data['type'] == 1) {
            $sql = "INSERT INTO accounts(acc_username, acc_email, acc_password, tokenCode, acc_type, investor_id, date_created)
                VALUES(?,?,?,?,?,?,?)";
        }else{
            $sql = "INSERT INTO accounts(acc_username, acc_email, acc_password, tokenCode, acc_type, investee_id, date_created)
                    VALUES(?,?,?,?,?,?,?)";
        }
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
    public function updateInvestorContact($data) {
        $db = $this->connectDB();
        $sql = "UPDATE investor SET investor_email = '".$data['email']."',
                                    investor_telNum = '".$data['telephone']."',
                                    investor_cpNum = '".$data['mobile']."',
                                    investor_fb = '".$data['facebook']."'
        where investor_id = '".$data['userid']."'";
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
    public function updateEntrepContact($data) {
        $db = $this->connectDB();
        $params = array($data['email'],
                        $data['telephone'],
                        $data['mobile'],
                        $data['facebook']);
        $sql = "UPDATE entreprenuer SET e_email = ?,
                                    e_telNum = ?,
                                    e_cpNum = ?,
                                    e_fb = ?
        where e_id = '".$data['userid']."'";
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
    public function updateInvestorProfile($data) {
        $db = $this->connectDB();
        $params = array(ucfirst($data['lname']),
                        ucfirst($data['fname']),
                        ucfirst($data['mname']),
                        $data['brgy'],
                        $data['city'],
                        $data['state']);

        $sql = "UPDATE investor SET investor_lname = ?,
                                    investor_fname = ?,
                                    investor_mname = ?,
                                    investor_street = ?,
                                    investor_city = ?,
                                    investor_state = ?
        where investor_id = '".$data['userid']."'";
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
    public function saveVerificationCode($data) {
        $db = $this->connectDB();
        $sql = "UPDATE investor SET phone_verify_status = ".$data['stat']." ,cpNotify_status = 0, phone_verify_code = ".$data['phone_code']." where investor_id = ".$data['userid']." ";
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
    public function updateVerificationCode($data) {
        $db = $this->connectDB();
        $sql = "UPDATE investor SET phone_verify_status = 1 WHERE phone_verify_code = ".$data['p_code']." AND investor_id = ".$data['userid']." ";
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
    public function getVerificationCode($data) {
        $db = $this->connectDB();
        $sql = "SELECT phone_verify_code FROM investor where investor_id = ".$data['userid']." ";
        $result = false;
        try {
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch();
            $db = null;
        } catch (PDOException $ex) {
            echo "DB Error: ", $ex->getMessage();
        }
        return $result['phone_verify_code'];
    }    
    public function updateInvestorWallet($data) {
        $db = $this->connectDB();
        $params = array($data['wallet']);

        $sql = "UPDATE investor SET investor_wallet = ? where investor_id = '".$data['userid']."'";
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
    public function updateEntrepProfile($data) {
        $db = $this->connectDB();
        $params = array(ucfirst($data['lname']),
                        ucfirst($data['fname']),
                        ucfirst($data['mname']),
                        $data['brgy'],
                        $data['city'],
                        $data['state']);
        $sql = "UPDATE entreprenuer SET e_lname = ?,
                                    e_fname = ?,
                                    e_mname = ?,
                                    e_street = ?,
                                    e_city = ?,
                                    e_state = ?
        where e_id = '".$data['userid']."'";
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
    public function updateInvestorAboutme($data) {
        $db = $this->connectDB();
        $params = array($data['aboutme']);

        $sql = "UPDATE investor SET investor_desc = ?
        where investor_id = '".$data['userid']."'";
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
    public function updateEntrepAboutme($data) {
        $db = $this->connectDB();
        $params = array($data['aboutme']);

        $sql = "UPDATE entreprenuer SET e_desc = ?
        where e_id = '".$data['userid']."'";
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
    public function UploadInvestorImage($data) {
        $db = $this->connectDB();
        $sql = "UPDATE investor SET investor_photo = '".$data['newfilename']."' where investor_id = '".$data['investor_id']."'";
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
    public function UploadEntrepImage($data) {
        $db = $this->connectDB();
        $sql = "UPDATE entreprenuer SET e_photo = '".$data['newfilename']."' where e_id = '".$data['e_id']."'";
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
    public function updateInvestorEmailStatus($data) {
        $db = $this->connectDB();
        $sql = "UPDATE investor SET eNotify_status = '".$data['email_status']."' where investor_id = '".$data['userid']."'";
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
    public function updateEntrepEmailStatus($data) {
        $db = $this->connectDB();
        $sql = "UPDATE entreprenuer SET e_notify_status = '".$data['email_status']."' where e_id = '".$data['userid']."'";
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
    public function updateInvestorMessageStatus($data) {
        $db = $this->connectDB();
        $sql = "UPDATE investor SET cpNotify_status = '".$data['message_status']."' where investor_id = '".$data['userid']."'";
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
    public function updateEntrepMessageStatus($data) {
        $db = $this->connectDB();
        $sql = "UPDATE entreprenuer SET cp_notify_status = '".$data['message_status']."' where e_id = '".$data['userid']."'";
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
    public function updateInvestorMinMaxInvestment($data) {
        $db = $this->connectDB();
        $sql = "UPDATE investor SET 
        min_investment = '".$data['mininve']."',
        max_investment = '".$data['maxinve']."'
        where investor_id = '".$data['userid']."'";
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