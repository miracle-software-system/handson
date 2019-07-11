<html>
	<head>
	<link href="css/stylesV2.css" rel="stylesheet" type="text/css" />
	<style>
	
table {
  border-collapse: collapse;
  width: 90%;
}

th, td {
  text-align: center;
  padding: 10px;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
  background-color: #2196F3;
  color: white;
}
	</style>
		<script>
		//to validate the harvesting date
		var d = new Date();
		var month = d.getMonth()+1;
		var fullMonth=(month < 10 ? '0' : '') + month;
		var day = d.getDate();
		var fullDay=(day < 10 ? '0' : '') + day;
		//alert(fullDay);
		var year = d.getFullYear();
		var systemDate = year + '-'+fullMonth+'-'+fullDay;
		$("#harvest_Tbl").on('change','#harvesth_date',function(){
			var currentRow=$(this).closest("tr");
			validate_Bagging =currentRow.find("td:eq(1)").find("input").val();
			validate_harvestDate = currentRow.find("td:eq(9)").find("input").val();
			if(validate_harvestDate > systemDate){
			alert('harvesting date must be less than system date');
			currentRow.find("td:eq(9)").find("input").val(' ');
			
		}
		else if(validate_harvestDate < validate_Bagging)
		{
			alert('harvesting date must be grater  than bagging date');
			currentRow.find("td:eq(9)").find("input").val(' ');
		}
		});
		//validating bunch weight
		$("#harvest_Tbl").on('change','#Bunch_wt',function(){
		var currentRow=$(this).closest("tr");
		Validate_bunch_wt =currentRow.find("td:eq(10)").find("input").val();
		if(isNaN(Validate_bunch_wt))
		{
			alert ('need to enter digits');
			currentRow.find("td:eq(10)").find("input").val(' ');
		}
		});
		$("#harvest_submit").click(function (e) {
	$('#harvest_Tbl').find('tbody > tr').each(function() {
		palmno_h = $(this).find("td:eq(0)").find("input").val();
		Bagging_h = $(this).find("td:eq(1)").find("input").val();
		Infl_no_h = $(this).find("td:eq(2)").find("input").val();
		Pollination_date_h = $(this).find("td:eq(3)").find("input").val();
		Pollination_Qty_h = $(this).find("td:eq(4)").find("input").val();
		Male_seed_h = $(this).find("td:eq(5)").find("input").val();
		Male_block_h = $(this).find("td:eq(6)").find("input").val();
		palm_no_h = $(this).find("td:eq(7)").find("input").val();
		pollinater_name_h = $(this).find("td:eq(8)").find("input").val();
		harvest_date = $(this).find("td:eq(9)").find("input").val();
		bunch_wt = $(this).find("td:eq(10)").find("input").val();
		//alert(palmno_h);
		//alert(Bagging_h);
		//alert(Infl_no_h);
		//alert(Pollination_date_h);
		//alert(Pollination_Qty_h);
		//alert(Male_seed_h);
		//alert(Male_block_h);
		//alert(palm_no_h);
		//alert(pollinater_name_h);
		//alert(harvest_date);
		//alert(bunch_wt);
		if(palmno_h !== undefined){
			if((harvest_date !== '')&&(bunch_wt !== '')){
							$.post(
					"harvest_insertion.php",
					{palmno_h: palmno_h,Bagging_h: Bagging_h,Infl_no_h: Infl_no_h,Pollination_date_h:Pollination_date_h,Pollination_Qty_h: Pollination_Qty_h,Male_seed_h :Male_seed_h,Male_block_h: Male_block_h,palm_no_h:palm_no_h,pollinater_name_h: pollinater_name_h,harvest_date: harvest_date,bunch_wt: bunch_wt},
					
					function(response){	
					response.responseText;
					//$('#harvest_submit').prop('disabled', true);
					$('#harvest__div').html(response);
		});
			}
			else{
				//$(this).find("td:eq(9)").find("input").style.Color = "red";
				//$(this).find("td:eq(10)").find("input").style.Color = "red";
				//$('#error').show('inline');
				alert('need to enter all the rows present in a table');
				//$("#harvest__div").hide();
			}
		}
	});
		});
			$("#close_button2").click(function (e) {
				//alert("sfasfasfasd");
				$("#harvest_Tbl").hide();
				$("#harvest_submit").hide();
				$("#close_button2").hide();
				$("#harvest__div").hide();
				//$("#insert_div").show().fadeOut();
				//$("#insert_palmno__div").show().fadeOut();
			});
		</script>
	</head>
	<body>
	<?php
include "connectdb.php";
$from_date = $_REQUEST["from_date"];
$to_date = $_REQUEST["to_date"];
?>

	<table id="harvest_Tbl" align="center"><tr><th>palm no</th><th>Bagging Date</th><th>inflorance no</th><th>Pollination date</th><th>pollination quantity</th><th>Male SeedGarden</th><th>Male Block No</th><th>palm number</th><th>Pollinator name</th><th>harvest date</th><th>bunch weight</th></tr> 
	<?php 
	$systemDate = date("Y-m-d");
	$sql = "select distinct(palmno),baggingdt,inflno,pollenationdt,male_sgid,male_blkid, maleparentno,pollenationqty,pollenatorname from femalebagging where sgid = '".$_REQUEST["seed_val"]."' && blkid = '".$_REQUEST["block_name"]."' && baggingdt >= '$from_date' && baggingdt < '$to_date' && subdate('$systemDate',30)>= baggingdt && dtofharvest IS NULL order by palmno,baggingdt,inflno";
	$result = $dbhandle->query($sql);
	while($rs = $result->fetch_assoc()){
	?>
	<tr>
						<td><input type='text' id='palmno' name='name1' value="<?php echo $rs["palmno"];?>" size="1" disabled></td>
						<td><input type='text' id='baggingdate' name='name2' value="<?php echo $rs["baggingdt"];?>" size="5" disabled></td>
						<td><input type='text' id='inflno' name='name' value="<?php echo $rs["inflno"];?>" size="1" disabled></td>
						<td><input type='text' id='pollenationdt' name='name' value="<?php echo $rs["pollenationdt"];?>"  size="6" disabled></td>
						<td><input type='text' id='pollenationqty' name='name' value="<?php echo $rs["pollenationqty"];?>" size="3" disabled></td>
						<td><input type='text' id='male_sgid' name='name' value="<?php echo $rs["male_sgid"];?>" size="2" disabled></td>
						<td><input type='text' id='male_blkid' name='name' value="<?php echo $rs["male_blkid"];?>" size="2" disabled></td>
						<td><input type='text' id='male_blkid' name='name' value="<?php echo $rs["maleparentno"];?>" size="2" disabled></td>
						<td><input type='text' id='maleparentno' name='name' value="<?php echo $rs["pollenatorname"];?>" size="2" disabled></td>
						<td><input type='date' id='harvesth_date' name='name' size="5" required></td>
						<td><input type='text' id='Bunch_wt' name='name' size="3" required></td>
						
	</tr>
	<?php
	}
	?>
	</table>
<div align="center"><button id="harvest_submit" class="cssForButton">submit</button>
<button id='close_button2' class="cssForButton">close table</button>
</div>
<div id="harvest__div"></div>
<span id="error" style="display:none;" >need to enter the details</span>
	</body>
</html>

