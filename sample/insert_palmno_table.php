<?php

include "connectdb.php";
if(($_REQUEST['seed_id'])&&($_REQUEST['block_name1'])&&($_REQUEST['palmno'])&&($_REQUEST["TableData"]))
{
	$seed_id=$_REQUEST['seed_id'];
	//echo($_REQUEST['seed_id']);
	$block_name=$_REQUEST['block_name1'];
	//echo($block_name);
	$palmno=$_REQUEST['palmno'];
	//echo($palmno);
	$TableData=$_REQUEST['TableData'];
	//echo($TableData);
	$query="SELECT MAX(inflno) as max_inflno FROM femalebagging WHERE sgid ='".$_REQUEST["seed_id"]."' AND blkid='".$_REQUEST["block_name1"]."' AND palmno='".$_REQUEST["palmno"]."' AND baggingdt='".$_REQUEST["TableData"]."'";
	$result = $dbhandle->query($query);
	$inflno_max=array();
	$count = true;
	while($row = $result->fetch_assoc()) {
		//echo "rows are".$row['max_inflno'];
		$inflno_max[]=$row['max_inflno'];
	}
	echo "<table>";
	
	for ($i = 0; $i < count($inflno_max); $i++) {
		$key =key($inflno_max);
		$val = $inflno_max[$key];
		//echo "rows are".$val;
		//echo $val;
		if($val)
		{
			if($count)
			{
						//echo "<tr><th>dfasdf</th></tr>";
			}	
			if($val >=1)
			{
				$val1= $val + 1;
				$upStr="INSERT INTO femalebagging (sgid,blkid,palmno,baggingdt,inflno) VALUES ( '$seed_id', '$block_name','$palmno','$TableData',$val+1)";
				$result2 = $dbhandle->query($upStr);
				//echo ("inflno was updated");
				echo "<tr><td width='200'><input type='text' id='inflno_id1' name='name' value='$val1' disabled></td></tr>";
				$count = false;
			}	
		}
		else{
				$insert_t = "INSERT INTO femalebagging (sgid,blkid,palmno,baggingdt,inflno) VALUES ( '$seed_id', '$block_name','$palmno','$TableData',1)";
				$result1 = $dbhandle->query($insert_t);
				//echo("records inserted successfully s");
				echo "<tr><td width='200'><input type='text' id='inflno_id' name='name' value='1' disabled></td></tr>";
				$count = false;
		}
	}
	echo "</table>";
	
}
?>