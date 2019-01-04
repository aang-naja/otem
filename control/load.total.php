<?php
error_reporting(0);
include 'connect.php';
$t=mysqli_query($con, "select * from orders,menu where menu.id_menu=orders.id_menu and orders.clear='N'");
while ($g=mysqli_fetch_array($t)) {
  $a +="".$g['price']*$g['qty']."";

}
  echo "<h4>".number_format($a)."</h4>";

 ?>
