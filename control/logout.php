<?php

  session_start();

  include "connect.php";
  mysqli_query($con,"update member set online='N' where username='$_SESSION[username]'");
  session_destroy();
  header("location:./");
?>
