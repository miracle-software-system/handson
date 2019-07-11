<html>
<head>
	<link href="css/stylesV2.css" rel="stylesheet" type="text/css" />
	<script>
	//var baggingdt;
	//alert(seed_val);
	//alert( block_name);
	function getState(val){
		baggingdate = val;
		//alert(baggingdate);
		//alert(seed_val);
		//alert( block_name);
		$.post(
				"inflno.php",
				{palmno: palmno,baggingdate: baggingdate,seed_val: seed_val,block_name: block_name},
				function(response){
						$('#pollination_date').html(response);
				}
			);
		//alert(baggingdate);
	}
	</script>
</head>
<body>

<div style="display: inline-block;float: left;">
<div>
			<p>&emsp;<u>Bagging date</u></p>
					
</div>
	<select id="Bagging_Date-list" onChange="getState(this.value)" style="background: #2196F3;color : #fff;padding: 10px;width: 130px;height: 40px;border: none;font-size: 15px;">
				<option value="">select Bagging</option>
				<?php
				$systemDate = date("Y-m-d");
				if(($_REQUEST["seed_val"])&&($_REQUEST["block_name"])){
				include "connectdb.php";
				$sql = "select * from femalebagging where palmno = '".$_REQUEST["palmno"]."' && sgid = '".$_REQUEST["seed_val"]."' && blkid = '".$_REQUEST["block_name"]."' && pollenationdt IS NULL";
				
				$result = $dbhandle->query($sql);
				while($rs = $result->fetch_assoc()){
					$baggingdate = $rs["baggingdt"];
					$date1=date_create($systemDate);
					$date2=date_create($baggingdate);
					//$date1=date_create("2013-01-01");
					//$date2=date_create("2013-02-10");
					$diff=date_diff($date1,$date2);
					$date_interval = $diff->format("%a");
					//$diff=date_diff($systemDate,$baggingdate);
					if($date_interval > 30)
					{
					
				?>
					<option id="va" value="<?php echo $rs["baggingdt"]; ?>"><?php echo $rs["baggingdt"];?> </option>
				<?php
					}
				}
				}
				else{
					echo("you need to select the seed garden and block");
				}
				?>
	</select>
</div>
<div id="pollination_date" style="display: inline-block;float: left;"></div>
</body>
</html>