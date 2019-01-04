<?php
     require_once "db.php";
     require_once "User.php";
     $user = new User($db);
     if(isset($_POST['username']) && isset($_POST['password'])){
         $email     = $_POST['email'];
         $password  = $_POST['password'];
         if($user->register($email, $password)){
             $true = $user->getLasttrue();
         }else{
             $error = $user->getLastError();
         }
     }else{
       echo "<div class='alert alert-danger alert-dismissible'>please Complete form registration $_POST[email] </div>";
     }

     if(isset($error)){
         echo "<div class='alert alert-danger alert-dismissible'>$error</div>";
     }elseif(isset($true)) {
         echo "<div class='alert alert-success alert-dismissible'>$true<div>";
     }
  ?>
