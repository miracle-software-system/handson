<html>
	<head>
		<script>
			var inflno;
	//alert(seed_val);
	//alert( block_name);
	function getState(val){
		pollenationdt = val;
		//alert(inflno);
		//alert(seed_val);
		//alert( block_name);
		$.post(
				"final_harvest.php",
				{pollenationdt: pollenationdt,palmno: palmno,baggingdate: baggingdate,seed_val: seed_val,block_name: block_name},
				function(response){
						$('#harvest_final_block').html(response);
				}
			);
		
	}
		</script>
	</head>
	<body>
	<div style="display: inline-block;float: left;">
<div>
			<p>&emsp;InflNo</p>
					
</div>
	<select id="inflono_harvest-list" onChange="getState(this.value)" style="background: #2196F3;color: #fff;padding: 10px;width: 100px;height: 40px;border: none;font-size: 15px;">
				<option value="">select inflono</option>
				<?php
				//$systemDate = date("Y-m-d");
				if(($_REQUEST["seed_val"])&&($_REQUEST["block_name"])){
				include "connectdb.php";
				$sql = "select distinct(inflno),pollenationdt from femalebagging where palmno = '".$_REQUEST["palmno"]."' && sgid = '".$_REQUEST["seed_val"]."' && blkid = '".$_REQUEST["block_name"]."' && baggingdt = '".$_REQUEST["baggingdate"]."'";
				
				$result = $dbhandle->query($sql);
				while($rs = $result->fetch_assoc()){
					//$baggingdate = $rs["baggingdt"];
					//$date1=date_create($systemDate);
					//$date2=date_create($baggingdate);
					//$date1=date_create("2013-01-01");
					//$date2=date_create("2013-02-10");
					//$diff=date_diff($date1,$date2);
					//$date_interval = $diff->format("%a");
					//$diff=date_diff($systemDate,$baggingdate);
					
				?>
					<option id="va2" value="<?php echo $rs["pollenationdt"]; ?>"><?php echo $rs["inflno"];?> </option>
				<?php
					
				}
				}
				else{
					echo("you need to select the seed garden and block");
				}
				?>
	</select>
</div>
<div id="harvest_final_block" style="display: inline-block;float: left;"></div>
	</body>
</html>