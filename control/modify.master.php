<?php


include 'connect.php';
  
if(isset($_POST['edit_row']))
{
 $row=$_POST['row_id'];
 $name=$_POST['nama_kategori_khas'];


 mysqli_query($con, "update kategori_khas set nama_kategori_khas='$name' where id_kategori_khas='$row'");
 echo "success";
 exit();
}

if(isset($_POST['delete_row']))
{
 $row_no=$_POST['row_id'];
 mysqli_query($con,"delete from kategori_khas where id_kategori_khas='$row_no'");
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
