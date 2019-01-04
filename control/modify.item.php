<?php


include 'connect.php';

if(isset($_POST['edit_row']))
{
 $row=$_POST['row_id'];
 $name=$_POST['name'];
 $satuan=$_POST['satuan'];
 $qty=$_POST['qty'];
 $price=$_POST['price'];



 mysqli_query($con, "update item set nama_item='$name', satuan='$satuan', qty='$qty', price='$price' where kode_item='$row' ");
 echo "success";
 exit();
}

if(isset($_POST['delete_row']))
{
 $row_no=$_POST['row_id'];
 mysqli_query($con,"delete from suplier where id_suplier='$row_no'");
 echo "success";
 exit();
}

if(isset($_POST['insert_row']))
{
 $name=$_POST['name_val'];
 $age=$_POST['age_val'];
 mysqli_query($con,"insert into user_detail values('','$name','$age')");
 echo mysql_insert_id();
 exit();
}
?>
