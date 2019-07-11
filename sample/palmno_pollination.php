<html>
	<body>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
	<script>
	</script>
	<?php
	include "connectdb.php";
	if ((isset($_POST['col5']))&&(isset($_POST['col6'])))
	{
	$query = "SELECT palmno FROM sgpalms WHERE sgid IN (SELECT sgid FROM seedgarden WHERE sgname= '".$_POST["col5"]."') && blkid IN (SELECT blkid FROM seedgarden WHERE blkname= '".$_POST["col6"]."') && parenttype ='P'"; 
	
	$result = $dbhandle->query($query);
	}
	else{
		echo "we can't find it";
	}
	?>
	<option selected> select palmno</option>
	<?php
		while($rs=$result->fetch_assoc()){
	?>
	 <option id="blk_id"  value="<?php echo $rs['palmno']; ?>"><?php echo $rs['palmno']; ?></option>
	<?php
	
		}
	?>
	</body>
</html>

