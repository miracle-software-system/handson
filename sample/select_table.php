<html>
	<head>
		<style>
		#block_container {
			display: flex;
			justify-content: center;
		}
		</style>
	</head>
	<body>
		<script>
		var d = new Date();
		var month = d.getMonth()+1;
		var fullMonth=(month < 10 ? '0' : '') + month;
		var day = d.getDate();
		var fullDay=(day < 10 ? '0' : '') + day;
		//alert(fullDay);
		var year = d.getFullYear();
		var systemDate = year + '-'+fullMonth+'-'+fullDay;
		//alert(systemDate);
		//alert(TableData);
		var seed_id = <?php echo $_REQUEST["seed_val"] ?>;
		//alert(seed_id);
		var block_name1 = "<?php if (isset($_REQUEST["block_name"])) {echo($_REQUEST["block_name"]);} ?>";

		$("#sub_button").click(function (e) {
				//e.preventDefault();
				 e.stopPropagation();
				//alert("cxvzxv");
				$('#sampleTbl').find('tbody > tr').each(function() {
					var TableData = new Array();
					var palmno = new Array();
					palmno = $(this).find("td:eq(0)").find("input").val();
					TableData = $(this).find("td:eq(1)").find("input").val();
					
					if(palmno !== undefined){
					if(TableData)
					{
						if(TableData <= systemDate){
					//alert(seed_id);
					//alert(block_name1);
					//alert(palmno);
					//alert(TableData);
					//alert(systemDate);
					
					$.post(
					"insert_palmno_table.php",
					{seed_id: seed_id,block_name1: block_name1,palmno: palmno,TableData:TableData},
					
					function(response){
						
						response.responseText;
						//$("#childElement").append("<b>Appended text</b>");
						$("#text1").val(' ');
						$('#sub_button').prop('disabled', true);
						$('#insert_palmno__div').append(response);
						//$("#insert_div").show().delay(5000).fadeOut();
						//$("#insert_palmno__div").show().delay(5000).fadeOut();
						
						//$('#insert_div').html("inserted successfully");
						
						//$('#insert_palmno__div').html(response);
						//$('#inflno_id').html(response);
					}); 
					//alert("records inserted successfully");
						}
						else{
							alert("you must enter the bagging date less than system date");
						}
					}
					else{
					alert(" Please select the missed palm number and enter the Bagging date again");
					}
	
				}
				
					});
			});
			$("#close_button").click(function (e) {
				//alert("sfasfasfasd");
				$("#insert_div").hide();
				$("#insert_palmno__div").hide();
				//$("#insert_div").show().fadeOut();
				//$("#insert_palmno__div").show().fadeOut();
			});
			//});
		</script>
		<div id="block_container" class='s2'>
		<div id="insert_div" class="s1">
		<?php
		include "connectdb.php";																						
		if (isset($_REQUEST["text1"])) 
		{ 
			$sample = $_REQUEST['text1'];
			$pieces = explode(",", $sample);
			$loop = 0;
			$loop1 = 0;
			$seedForTable = $_REQUEST["seed_val"] ;
			$blkFroTable = $_REQUEST["block_name"];
			//echo "$blkFroTable";
			//echo "$seedForTable";
			echo "<table id='sampleTbl'><tbody><tr style='background-color: #2196F3;color: white;text-align: center;	'><td>palmno</td><td>baggingdt</td></tr>";
			//echo "<table id='sampleTbl'><tbody><tr style='background-color: #2196F3;color: white;text-align: center;	'><td>palmno</td><td>baggingdt</td><td>inflno</td></tr>";
			for(;$loop < sizeof($pieces);$loop++){
				if(strpos($pieces[$loop],'-') == false){
					//echo $pieces[$loop];
					$palm = $pieces[$loop];
					//echo $palm;
					
					$query ="SELECT palmno FROM sgpalms WHERE palmno = '$palm' AND sgid='$seedForTable' AND blkid ='$blkFroTable'";
					$result = $dbhandle->query($query);
					$palm_no=array();
					while($row = $result->fetch_assoc()) {
					//echo "rows are".$row['palm_no'];
					$palm_no[]=$row['palmno'];
					}
	
					for ($i = 0; $i < count($palm_no); $i++) {
					$key =key($palm_no);
					$val = $palm_no[$key];
					//echo $val;
						if($val == $palm){
							echo "<tr><td width='200' text-align: center;><input type='text' id='palmno1' name='name' value=".$pieces[$loop]." disabled></td><td width='200'> <input type='date' id='dateid' name='name' required></td><td></tr>";
								//echo "<tr><td width='200' text-align: center;><input type='text' id='palmno1' name='name' value=".$pieces[$loop]." disabled></td><td width='200'> <input type='date' id='dateid' name='name' required></td><td width='200'><input type='text' id='inflno_id' name='name' value='' disabled></td><td></tr>";
						}
					}
				}
				else if(strpos($pieces[$loop],'-') == true){
						$pieces2 = explode("-", $pieces[$loop]);
						$nabondha = $pieces2[0];
						$nabondha1 = $pieces2[1];
						$cvtToInt1 = (int)$pieces2[0];
						$cvtToInt2 = (int)$pieces2[1];
						while($cvtToInt1 <= $cvtToInt2)
						{
							//echo $cvtToInt1;
							//echo $cvtToInt2;
							
							$query2 ="SELECT palmno FROM sgpalms WHERE palmno = '$cvtToInt1' AND sgid='$seedForTable' AND blkid ='$blkFroTable'";
							$result2 = $dbhandle->query($query2);
							$palm_no2=array();
							while($row2 = $result2->fetch_assoc()) {
								//echo "rows are".$row1['palm_no2'];
								$palm_no2[]=$row2['palmno'];
							}
							for ($j = 0; $j < count($palm_no2); $j++) {
								$key =key($palm_no2);
								$val2 = $palm_no2[$key];
								//echo $val2;
							 if($val2 == $cvtToInt1){
								 echo "<tr><td width='200'><input type='text' name='name' value=".$cvtToInt1." disabled></td><td width='200'><input type='date' id='dateid1' name='name' required></td><td></tr>";
							//echo "<tr><td width='200'><input type='text' name='name' value=".$cvtToInt1." disabled></td><td width='200'><input type='date' id='dateid1' name='name' required></td><td width='200'><input type='text' name='name' id='inflno_id1' disabled></td><td></tr>";
							 }
							}
							$cvtToInt1++;
						}
			}
		}
		}
		echo"</tbody></table>";
		echo "<button id='sub_button' style='margin-left: 200px;background-color: #2196F3;  border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;border-radius: 5px;box-shadow: 0 5px 25px rgba(0,0,0,.5);'>submit</button><button id='close_button' style='margin-left: 200px;background-color: #2196F3;  border: none;color: white;padding: 15px 32px;text-align: center;text-decoration: none;display: inline-block;font-size: 16px;margin: 4px 2px;cursor: pointer;border-radius: 5px;box-shadow: 0 5px 25px rgba(0,0,0,.5);'>close table</button>";
		?>
		</div>
		<div id="insert_palmno__div" class="s">
		<span id="childElement">
		<table><tr style='background-color: #2196F3;color: white;text-align: center;'><th>Inflorence Number</th></tr></table>
		</span>
		</div>
		</div>
		<div id="insert_div"></div>
	</body>
	
</html>