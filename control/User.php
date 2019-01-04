<?php
    /**
     * Class User untuk melakukan login dan registrasi user baru
     */
    class User
    {

        private $db; //Menyimpan Koneksi database
        private $error; //Menyimpan Error Message

        // Contructor untuk class User, membutuhkan satu parameter yaitu koneksi ke databse
        function __construct($db_conn)
        {
            $this->db = $db_conn;

            // Mulai session
            session_start();
        }

        // Registrasi user baru
        public function register($email, $password)
        {
            try
            {
              if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $this->error = "Invalid email format";
                return false;
                }else{



                $query = $this->db->prepare("SELECT * FROM user WHERE email = :email");
                $query->bindParam(":email", $email);
                $query->execute();

                if($query->rowCount() > 0 ){
                  $this->error = "Email already used!";
                  return false;
                 }else{
                  $_SESSION['post'] = 1;
                  $_SESSION['num']  = $_SESSION['num']+ $_SESSION['post'] ;

                  if($_SESSION['num'] == 1){
                  $_SESSION['reg_email'] = "".$email."";
                  $_SESSION['password']  = "".$password."";
                  $_SESSION['kodeactivation'] ="".rand(100000,110000)."";
                  // $content=file_get_contents("".$_SESSION['kodeactivation']."");
                  // $subject="Code Activation";
                  // $toemail =$email;
                  // $json = send_mailgun($toemail,$subject,$content);
                    $this->true="<i class='fa fa-spin  fa-spinner'></i> Register success check your email to see activation code  <script type='text/javascript'> window.location.href = './activation-code.aspx' </script>";
                  }else{
                    $this->true="<i class='fa fa-spin  fa-spinner'></i> please wait... <script type='text/javascript'> window.location.href = './activation-code.aspx' </script>";
                  }
                  return true;
                  }


              }
              }


            catch(PDOException $e){

                if($e->errorInfo[0] == 23000){
                    $this->error = "Email already used!";
                    return false;
                }else{
                    echo $e->getMessage();
                    return false;
                }
            }
        }

        public function activation($email, $password)
        {
            try
            {
              $hashPasswd = md5($password);
              $query = $this->db->prepare("INSERT into user (email,password) values (:email, :password) ");
              $query->bindParam(":email", $email);
              $query->bindParam(":password", $hashPasswd);

              $query->execute();
              $this->true = "Activation Success Redirect to Login from <script type='text/javascript'> window.location.href = './login.aspx' </script>";
              return true;
            }
            catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }
        //Login user
        public function login($email, $password,$date)
        {
            try
            {
                // Ambil data dari database
                $query = $this->db->prepare("SELECT * FROM user WHERE email = :email and blokir ='N'");
                $query->bindParam(":email", $email);
                $query->execute();
                $data = $query->fetch();

                // Jika jumlah baris > 0
                if($query->rowCount() > 0){
                    // jika password yang dimasukkan sesuai dengan yg ada di database
                    if(md5($password) == $data['password']){
                        $_SESSION['user_session'] = $data['email'];
                        $this->true = "Login Success Redirect to dashboarrd <script type='text/javascript'> window.location.href = './beranda.aspx' </script>";
                        $query = $this->db->prepare("update user set lastlogin=:lastlogin where email=:email");
                        $query->bindParam(":lastlogin", $date);
                        $query->bindParam(":email",$email);
                        $query->execute();

                        return true;
                    }else{
                        $this->error = "Incorect Password";
                        return false;
                    }
                }else{
                    $this->error = "Incorect email";
                    return false;
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        // Cek apakah user sudah login
        public function isLoggedIn(){
            // Apakah user_session sudah ada di session
            if(isset($_SESSION['user_session']))
            {
                return true;
            }
        }

        public function getuser($username){
          try {
            $query = $this->db->prepare("SELECT * FROM user WHERE email = :email");
            $query->bindParam(":email", $username);
            $query->execute();
            return $query->fetch();
          } catch (Exception $e) {
            echo $e->getMessage();
            return false;
          }
        }

        // Logout user
        public function logout(){
            // Hapus session
            session_destroy();
            // Hapus user_session
            unset($_SESSION['user_session']);
            return true;
        }



        // Ambil error terakhir yg disimpan di variable error
        public function getLastError(){
            return $this->error;
        }
        public function getLasttrue(){
            return $this->true;
        }
    }

?>
