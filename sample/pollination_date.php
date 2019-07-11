<html>
<head>
	<script>
		var d = new Date();
		var month = d.getMonth()+1;
		var fullMonth=(month < 10 ? '0' : '') + month;
		var day = d.getDate();
		var fullDay=(day < 10 ? '0' : '') + day;
		//alert(fullDay);
		var year = d.getFullYear();
		var systemDate = year + '-'+fullMonth+'-'+fullDay;
		var Pollination_Data;
		//BaggiData = $(this).find("input").val();
		var BaggiData = "<?php echo $_REQUEST["baggingdate"] ?>";
		//alert(BaggiData);
		function getState(val){
			//alert('dfasdf');
			Pollination_Data = val;
			if(Pollination_Data < systemDate){
				if(Pollination_Data > BaggiData){
					
				//alert(Pollination_Data);
				$.post(
				"pollination_final_block.php",
				{BaggiData: BaggiData,seed_val: seed_val,block_name: block_name},
				function(response){
						$('#pollination_final_block').html(response);
				}
			);
				}
				else{
					alert('must be grater than bagging date');
					$('#dateid1').val(' ');
				}
				//alert(Pollination_Data);
				
			}
			else{
				alert('must be less than system current date');
				$('#dateid1').val(' ');
			}
		}
	</script>
</head>
<body>
<div style="display: inline-block;float: left; ">
<div>
			<p>&nbsp;&nbsp;&nbsp;<u>Pollination Date</u></p>
					
</div>

	<input type='date' id='dateid1' name='name' onChange="getState(this.value)" placeholder="Pollination date" style="width: 150px;height: 40px;background: #2196F3;border: none;" required>
</div>
<div id="pollination_final_block"style="display: inline-block;float: left;"></div>
</body>
</html>