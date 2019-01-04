<?php


include 'connect.php';

if(isset($_POST['edit_row']))
{
 $row=$_POST['row_id'];
 $name=$_POST['nama_kategori_menu'];


 mysqli_query($con, "update kategori_menu set nama_kategori_menu='$name' where id_kategori_menu='$row'");
 echo "success";
 exit();
}
// edit Menu

if(isset($_POST['edit_menu']))
{
 $row=$_POST['row_id'];
 $name=$_POST['name'];
 $price=$_POST['price'];


 mysqli_query($con, "update menu set name='$name', price='$price' where id_menu='$row'");
 echo "success";
 exit();
}
// ====================
if(isset($_POST['delete_row']))
{
 $row_no=$_POST['row_id'];
 mysqli_query($con,"delete from kategori_menu where id_kategori_menu='$row_no'");
 echo "success";
 exit();
}

if(isset($_POST['delete_menu']))
{
 $row_no=$_POST['row_id'];
 mysqli_query($con,"delete from menu where id_menu='$row_no'");
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
