<?php
session_start();
include 'control/connect.php';
function tanggal_indo($tanggal)
{
	$bulan = array (1 =>   'Januari',
				'Februari',
				'Maret',
				'April',
				'Mei',
				'Juni',
				'Juli',
				'Agustus',
				'September',
				'Oktober',
				'November',
				'Desember'
			);
	$split = explode('-', $tanggal);
	return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
}
 ?>

  <!DOCTYPE html>
  <html lang="id">

  <head style="background-color:White;">
    <style>
 	 @page
 	 {
 			 size:  auto;   /* auto is the initial value */
 			 margin: 0mm;  /* this affects the margin in the printer settings */
 	 }

 	 html
 	 {
 			 background-color: #FFFFFF;
 			 margin: 10px;  /* this affects the margin on the html before sending to printer */
       font-size: 10px;
 	 }


 		 @media print{
    #noprint{
        display:none;
    }
 }

 </style>
      <title></title>
 		 <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
 		 <script language="javascript">
 		 function printPreView(reportCategory,reportType,transactionType,searchOption,customerRokaID,utilityCompany,fromDate,toDate,telcoName,bank){

 var request = "selectedMenu="+reportCategory+"&loginStatus=success&criteria="+searchOption+"&customer="+customerRokaID+"&from="+fromDate+"&to="+toDate+"&nspTypes="+utilityCompany+"&trxTypes="+transactionType+"&options="+reportType+"&telcoTypes="+telcoName+"&bankTypes="+bank+"&printable=yes";


 window.open ("report/showReport.action?"+request,null,"location=no,menubar=0,resizable=1,scrollbars=1,width=600,height=700");
 }

 		 </script>
 		 <div id="div_print">
 		 <div id="header" style="background-color:White;"></div>
 		 <div id="footer" style="background-color:White;"></div>
 		 </div>
  </head>
 <h1><?php echo "$web[title]"; ?></h1>
 <p><?php echo "$web[address]"; ?> <br> <?php echo "$web[website]"; ?></p>
<p>-------------------------------------------------------</p>
Date : <?php echo "".tanggal_indo($date).""; ?>


<table>

<thead>
</thead>
<tbody>
<?php
$t=mysqli_query($con, "select * from orders,menu where menu.id_menu=orders.id_menu and orders.clear='N'");
while ($g=mysqli_fetch_array($t)) {
?>
<tr id="row<?php echo $g['id_order'];?>">
<td><?php echo "$g[qty]"; ?></td>
<td ><?php echo "$g[name]"; ?>  </td>
<td align="right"><?php echo "".number_format($g['price']*$g['qty']).""; ?></td>
<td ></td>

<td></td>
</tr>

<?php
}

?>
<tr>
  <td></td><td></td><td>-------------------- </td>
</tr>
<tr>
<td></td><td> <strong class="text-info"> Sub Total</strong></td><td align="right"> <b class="text-success" id="totalchart"><?php echo "".number_format($_SESSION['subtotal']).""; ?></b> </td><td></td>
</tr>

<tr>
<td></td><td> <strong class="text-info">Cash &nbsp; &nbsp; &nbsp; </strong></td>
<td align="right"><b class="text-success" id="totalchart"><?php echo "".number_format($_SESSION['pembayaran']).""; ?></b></td>

<td></td>
</tr>


<tr>
<td></td><td > <strong class="text-info"> Kembali </strong></td><td align="right"><b>  <?php echo "".number_format($_SESSION['kembalian']).""; ?></b> </td><td>  </td>
</tr>



</tbody>
</table>
<p>-------------------------------------------------------</p>
<i>#ngopidicoder #mengkopikannganjuk </i>

<script src="https://code.jquery.com/jquery-2.2.4.js"></script>
  <script>
  $(document).ready(function () {
    window.print();
  });
  </script>
</body>
</html>
