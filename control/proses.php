<?php

error_reporting(0);
session_start();
include 'connect.php';
$t=mysqli_query($con, "select * from orders,menu where menu.id_menu=orders.id_menu and orders.clear='N'");
while ($g=mysqli_fetch_array($t)) {
  $a +="".$g['price']*$g['qty']."";

}
  if(isset($_POST['pembayaran'])){
    $total="".$_POST['pembayaran']-$a."";
    $_SESSION['subtotal']  =$a;
    $_SESSION['pembayaran']  =$_POST['pembayaran'];

    $_SESSION['kembalian'] = $total;
    if($total < 0){
     echo "<div class='alert alert-danger alert-dismissible'>Tidak dapat diproses, karena nilai cash kurang dari subtotal </div>";
    }else {
      echo "<h3 class='text-success'>".number_format($total)."<h3>
      <button class='btn btn-info' id='btn1'><i id='btn1' class='fa fa-print'></i></button>
      <a class='btn btn-success' href='./?page=penjualan&act=proses'><i id='btn1' class='fa fa-save'></i></a>
      ";
    }

  }else {
    echo "<div class='alert alert-danger alert-dismissible'>Please Complete Form Payment $_POST[payment] </div>";
  }


 ?>
 <script>
   $("#btn1").click(function(){
       $("#printabel").remove();
       loadOtherPage1();
   });

   function loadOtherPage1() {
       $("<iframe id='printabel'>")
           .hide()
           .attr("src", "cetak.php")
           .appendTo("body");
       }

     </script>
