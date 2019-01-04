<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "kasir";


$con=mysqli_connect($server,$username,$password,$database);
// check connection
if (mysqli_connect_errno()) {
  exit('Connect failed: '. mysqli_connect_error());
}
$webmaster="select * from web_master where id_plan='1' ";
$webquery=mysqli_query($con, $webmaster);
$web=mysqli_fetch_array($webquery);
$datetime=date('Y-m-d H:i:s');
$date=date('Y-m-d');
$jam=date('H:i"s');

?>
