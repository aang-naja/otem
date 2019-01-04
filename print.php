<?php

//definisikan nama printernya dibawah

$handle= printer_open("POST-5820D");

printer_set_option($handle, PRINTER_MODE, "RAW");

printer_start_doc($handle, "Menggunakan Printer PHP");

printer_start_page($handle);

//tuliskan huruf yang akan dicetak disini

$cetak = "Testing Printer dengan PHP";

printer_write( $handle , $cetak);

printer_end_page($handle);

printer_end_doc($handle);

printer_close($handle);

?>
