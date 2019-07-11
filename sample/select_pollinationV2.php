<html>
	<head>
	<link href="css/stylesV2.css" rel="stylesheet" type="text/css" />
		<style>
h3 {
  text-align: center;
  text-transform: uppercase;
  color: white;
  background-color: orange;
}
	</style>
		<script>
		//to get the system date
		var d = new Date();
		var month = d.getMonth()+1;
		var fullMonth=(month < 10 ? '0' : '') + month;
		var day = d.getDate();
		var fullDay=(day < 10 ? '0' : '') + day;
		//alert(fullDay);
		var year = d.getFullYear();
		var systemDate = year + '-'+fullMonth+'-'+fullDay;
		
		$(function(){
			$("#pollination_button_id").click(function(){
				//alert('sdfasdfasfas');
				var from_date = $('#pollination_fromDate_id').val();
				//alert(from_date);
				var to_date = $('#pollination_toDate_id').val();
				//alert(to_date);
				if (from_date != null && from_date != '' && to_date != null && to_date != '') {
				if(from_date < to_date)
				{
					if(to_date <= systemDate){
						$.post(
							"select_bagg_pollinationV2.php",
							{seed_val: seed_val,block_name: block_name,from_date: from_date,to_date: to_date},
							function(response){
									$('#pollination_table_id').html(response);
							}
					);
					}
					else{
						alert("to date must be less than systemDate");
						$('#pollination_fromDate_id').val(' ');
						$('#pollination_toDate_id').val(' ');
					}
				}
				else{
					alert("from date must be less then to date");
					$('#pollination_fromDate_id').val(' ');
					$('#pollination_toDate_id').val(' ');
				}
				}
				else{
					alert('you need to enter from and to date');
				}
			});
		});	
		</script>
	</head>
	<body>
	<h3>enter bagging from & to dates</h3>
	<div class="sample-class">
			<label>From:</label><input type="date" name="pollination_fromDate_name" id="pollination_fromDate_id" class="cssForinput">
			<label>To:</label><input type="date" id="pollination_toDate_id" class="cssForinput">
			<button type="submit" id="pollination_button_id" class="cssForButton">click here to get pollination details</button>
	</div>
	<div id="pollination_table_id">
	</div>
	</body>
</html>