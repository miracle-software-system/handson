<html>
	<body>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
	<script>
	</script>
	<?php
	include "connectdb.php";
	if (isset($_POST['col6'])) 
	{
	$query = "SELECT * FROM seedgarden WHERE sgname='".$_POST["col6"]."'";
	$result = $dbhandle->query($query);
	}
	else{
		echo "we can't find it";
	}
	?>
	<option selected> select Block</option>
	<?php
		while($rs=$result->fetch_assoc()){
	?>
	 <option id="blk_id"  value="<?php echo $rs['blkid']; ?>"><?php echo $rs['blkname']; ?></option>
	<?php
	
		}
	?>
	</body>
</html>