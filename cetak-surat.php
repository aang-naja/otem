<?php

include 'control/connect.php';
$pro=mysqli_fetch_array(mysqli_query($con, "select * from profile"));
$s=mysqli_fetch_array(mysqli_query($con, "select * from surat where id_surat='$_GET[id]'"));
$r=mysqli_fetch_array(mysqli_query($con, "select * from penduduk where id_penduduk='$s[id_penduduk]'"));
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
			 margin: 0px;  /* this affects the margin on the html before sending to printer */
	 }

	 body
	 {
			 border: solid 1px #FFFFFF ;
			 margin: 10mm 15mm 10mm 15mm; /* margin you want for the content */
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

 <body >

     <div>

        <br>
        <br>
				<center>
				<table >
					<tbody>
						<tr>
							<td> <img src="<?php echo "library/upload/$web[logo]"; ?>" alt="" height="100px"> </td>
							<td> <p style="font-size:20px; text-align:center;  text-transform: uppercase;"><b>Pemerintah Kabupaten <?php echo "$pro[kabupaten]"; ?><br>
				       Kecamatan <?php echo "$pro[kecamatan]"; ?><br>
				       Desa <?php echo "$pro[desa]"; ?> </b></p>
							 <p style="font-size:14px; text-align:center;">Alamat : Desa <?php echo "$pro[desa]"; ?>, kec. <?php echo "$pro[kecamatan]"; ?>, kab. <?php echo "$pro[kabupaten]"; ?>, Kode Pos. <?php echo "$pro[kode_pos]"; ?><br>
	 		        Telp. <?php echo "$pro[telpon]"; ?></p>



						 </td>
						</tr>
					<tr>
						<td></td>
						<td></td>
					</tr>
					</tbody>
				</table>
			</center>
       <!-- alamat -->

       <!--  -->
       <hr size="5">
       <p style="text-align:center; "><span style="font-size:20px;  text-transform: uppercase;"><b> <u>surat pengantar <?php echo "$s[jenis_surat]"; ?> </u></b></span><br>
        <span style="font-size:14px; ">  Nomor : <?php echo "$s[id_surat]" ?>/SRT/VII/20.08.08/<?php echo "".date('Y').""; ?></span></p>
        <p style="text-align:justify; font-size:14px;"> Dengan ini Kepada Desa <?php echo "$pro[desa]"; ?> Kecamatan <?php echo "$pro[kecamatan]"; ?> Kabupaten <?php echo "$pro[kabupaten]"; ?>, menerangkan dengan sebenarnya bahwa :</p>

        <table style="text-align:justify; font-size:14px; ">
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>

          <tbody>
            <tr>
              <td>Nama</td><td>:</td><td><?php echo "$r[nama]"; ?></td>
            </tr>
            <tr>
              <td>Tempat, Tanggal Lahir</td><td>:</td><td><?php echo "$r[temp_lahir]"; ?>, <?php echo "".tanggal_indo($r['tanggal_lahir']).""; ?></td>
            </tr>
            <tr>
              <td>Jenis Kelamin</td><td>:</td><td><?php echo "$r[jenis_kelamin]"; ?></td>
            </tr>
            <tr>
              <td>Pekerjaan</td><td>:</td><td><?php echo "$r[pekerjaan]"; ?></td>
            </tr>
            <tr>
              <td>Agama</td><td>:</td><td><?php echo "$r[agama]"; ?></td>
            </tr>
            <tr>
              <td>Kewarganegaraan</td><td>:</td><td>Indonesia</td>
            </tr>
            <tr>
              <td>alamat</td><td>:</td><td><?php echo "$pro[desa], RT $r[rt]/ RW $r[rw], Kec. $pro[kecamatan], Kab. $pro[kabupaten]"; ?></td>
            </tr>
          </tbody>
        </table>

        <p style="text-align:justify; font-size:14px;"> <?php echo "$s[keperluan]"; ?></p>
        <p style="text-align:justify; font-size:14px;"> <?php echo "$s[keterangan]"; ?></p>
        <p style="text-align:justify; font-size:14px;"> Demikian, Surat Keterangan ini dibuat untuk dapat dipergunakan sebagaimana mestinya mohon kepada yang berkepentingan untuk mengetahuinya dan maklum adanya.</p>
        <br>
        <p style="text-align:right; font-size:14px;"><?php echo "$pro[kabupaten]"; ?>, <?php echo "".tanggal_indo(date('Y-m-d')).""; ?></p>
        <p style="text-align:right; font-size:14px;">Kepala Desa <?php echo "$pro[desa]"; ?></p>
        <br>
        <br>
        <br>

        <p style="text-align:right; font-size:14px;">-----------------------------</p>



     </div>

		 <!--  -->
		 <div id="noprint">
			 <center>   <a style="color: #42B549; font-size: 14px; text-decoration: none;" href="javascript:window.print()">
							<span style="vertical-align: middle">Cetak</span>
							<img src="https://ecs7.tokopedia.net/img/print.png" alt="Print" style="vertical-align: middle;">
					</a></center>
		 </div>


		 <!--  -->
 </body>

 </html>
