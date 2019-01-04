
 <?php
      require_once "db.php";
      require_once "User.php";
      $user = new User($db);
      if($_POST['code'] == $_SESSION['kodeactivation']){
        
          $email        = $_SESSION['reg_email'];

          $password     = $_SESSION['password'];

          if($user->activation($email, $password)){
              $true = $user->getLasttrue();
          }else{
              $error = $user->getLastError();
          }
      }else{
        echo "<div class='alert alert-danger alert-dismissible'>enter registration code correctly </div>";
      }

      if(isset($error)){
          echo "<div class='alert alert-danger alert-dismissible'>$error</div>";
      }elseif(isset($true)) {
          echo "<div class='alert alert-success alert-dismissible'>$true<div>";
      }

   ?>
