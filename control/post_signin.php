<?php
     date_default_timezone_set('Asia/Jakarta');
     require_once "db.php";
     require_once "User.php";
     $user = new User($db);
     if(isset($_POST['email']) && isset($_POST['password'])){
         $email     = $_POST['email'];
         $password  = $_POST['password'];
         $date= date('Y-m-d h:i:s');
         if($user->login( $email, $password,$date)){
             $true = $user->getLasttrue();
         }else{
             $error = $user->getLastError();
         }
     }else{
       echo "<div class='alert alert-danger alert-dismissible'>please Complete form login </div>";
     }

     if(isset($error)){
         echo "<div class='alert alert-danger alert-dismissible'>$error</div>";
     }elseif(isset($true)) {
         echo "<div class='alert alert-success alert-dismissible'>$true<div>";
     }
  ?>
