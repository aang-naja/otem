<?php
error_reporting(0);
$profit=$_POST['profit'];
$amount=$_POST['amount'];
$email=$_POST['email'];
if(!empty($profit) && !empty($amount) && !empty($email) ){
  $url="https://bittrex.com/api/v1.1/public/getticker?market=".$_POST['Currency']."";
  $file=file_get_contents($url);
  $json=json_decode($file, true);
  $ask=number_format($json['result']['Ask'],8);
  $bid=number_format($json['result']['Bid'],8);

  $target=$ask*($profit/100)+$ask;

  $profitamount=$amount*($profit/100)+$amount;
  $winprofit=$profitamount-$amount;
  $quantity=$amount/$bid;



?>

 <div class="form-group label-floating">
   <p class="control-label"><?php echo "<p> Bid : ".number_format($json['result']['Bid'],8)."";?></p>
   <p class="control-label"><?php echo "<p> Ask : ".number_format($json['result']['Ask'],8)."";?></p>
   <p class="control-label"><?php echo "<p> Quantity  $_POST[Currency] : ".$quantity."";?></p>
   <p class="control-label"><?php echo "<p> Traget $profit% : sell to  ".number_format($target,8)."";?></p>
   <p class="control-label"><?php echo "<p> You will get ".number_format($profitamount,8)."";?></p>
   <p class="control-label"><?php echo "<p> You will get profit ".number_format($winprofit,8)."";?></p>
   <a href="./view/ordertrade.php?quantity=<?php echo "".$quantity."&rate=".$bid."&price=".$amount."&market=".$_POST['Currency']."&email=".$_POST['email'].""?>" class="btn btn-info btn-rounded">Save</a>
</div>
<?php
}else {
  echo "plese fill all require form";
}

 ?>
