<?php 
include "connectdb.php";
$palmno = $_POST['palmno'];
$bag = $_POST['Bagging'];
$inf = $_POST['Infl_no'];
$pDate = $_POST['Pollination_date_A'];
$pq = $_POST['Pollination_Qty_A'];
$pName = $_POST['pollinater_name_A'];
$male_s = $_POST['Male_seed_A'];
$male_b = $_POST['Male_block_A'];
$male_palm = $_POST['palm_no_A'];

$insert_t = "UPDATE femalebagging SET pollenationdt = '$pDate',pollenationqty = '$pq',male_sgid = '$male_s' ,male_blkid = '$male_b' ,maleparentno = '$male_palm',pollenatorname= '$pName' WHERE palmno = '$palmno' && baggingdt = '$bag' && inflno = '$inf';";
$result1 = $dbhandle->query($insert_t);
echo("records inserted successfully");
//echo "<tr><td width='200'><input type='text' id='inflno_id' name='name' value='1' disabled></td></tr>";
 ?>