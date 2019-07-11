<?php 
include "connectdb.php";
$palmno = $_POST['palmno_h'];
$bag = $_POST['Bagging_h'];
$inf = $_POST['Infl_no_h'];
$pDate = $_POST['Pollination_date_h'];
$pq = $_POST['Pollination_Qty_h'];
$pName = $_POST['pollinater_name_h'];
$male_s = $_POST['Male_seed_h'];
$male_b = $_POST['Male_block_h'];
$male_palm = $_POST['palm_no_h'];
$harvest_dt = $_POST['harvest_date'] ;
$bnch_wt = 	$_POST['bunch_wt'] ;

$insert_t = "UPDATE femalebagging SET dtofharvest = '$harvest_dt',bunchwt = '$bnch_wt' WHERE palmno = '$palmno' && baggingdt = '$bag' && inflno = '$inf' && pollenationdt = '$pDate' && pollenationqty = '$pq' && male_sgid = '$male_s' && male_blkid = '$male_b' && maleparentno = '$male_palm' && pollenatorname= '$pName';";
$result1 = $dbhandle->query($insert_t);
echo("records inserted successfully");
//echo "<tr><td width='200'><input type='text' id='inflno_id' name='name' value='1' disabled></td></tr>";
 ?>