<html>
<head>
	<link href="css/stylesV2.css" rel="stylesheet" type="text/css" />
	<style>
	</style>
	<script>
	var palmno;
	//alert(seed_val);
	//alert( block_name);
	function getState(val){
		palmno = val;
		//alert(palmno);
		//alert(seed_val);
		//alert( block_name);
		$.post(
				"select_bagg_pollination.php",
				{palmno: palmno,seed_val: seed_val,block_name: block_name},
				function(response){
						$('#bagg_pollination').html(response);
				}
			);
		
	}
	</script>
</head>
<body>
<!--
<div class="rTable">
<div class="rTableRow">
<div class="rTableHead">Palm number</div>
<div class="rTableHead">Bagging date</div>
<div class="rTableHead">InflNo</div>
<div class="rTableHead">Pollination date</div>
<div class="rTableHead">Pollination Qty</div>
<div class="rTableHead">Male parent Block</div>
<div class="rTableHead">Male Parent No</div>
<div class="rTableHead">Pollinator Name</div>
</div>
</div>
-->
<div style="display: inline-block;float: left;margin-left:100px; ">
<div>
			<p>&nbsp;&nbsp;<u>Palm No</u></p>
					
</div>			
			<select id="Palm_No-list" onChange="getState(this.value)" style="background: #2196F3;color: #fff;padding: 10px;width: 80px;height: 40px;border: none;font-size: 15px;">
				<option value="">select Palm</option>
				<?php
				$systemDate = date("Y-m-d");
			    echo "Today is " . $systemDate . "<br>";
				if(($_REQUEST["seed_val"])&&($_REQUEST["block_name"])){
					include "connectdb.php";
				$sql = "select distinct(palmno),baggingdt from femalebagging where sgid = '".$_REQUEST["seed_val"]."' && blkid = '".$_REQUEST["block_name"]."' && pollenationdt IS NULL";
				
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
				<!--
					<option><?php echo $systemDate; ?></option>
					<option><?php echo $rs["baggingdt"]; ?></option>
					<option><?php echo $date_interval;?></option>
				-->
					<option id="va" value="<?php echo $rs["palmno"]; ?>"><?php echo $rs["palmno"];?> </option>
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
<div id="bagg_pollination" style="display: inline-block;float: left; "></div>

</body>
</html>