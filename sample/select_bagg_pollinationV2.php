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
	$(document).ready(function(){
	var d = new Date();
	var month = d.getMonth()+1;
	var fullMonth=(month < 10 ? '0' : '') + month;
	var day = d.getDate();
	var fullDay=(day < 10 ? '0' : '') + day;
		//alert(fullDay);
	var year = d.getFullYear();
	var systemDate = year + '-'+fullMonth+'-'+fullDay;
    // code to read selected table row cell data (values).
	//validation for pollination date
	$("#pollination_Tbl").on('change','#poll_dateid',function(){
		var currentRow=$(this).closest("tr");
		validate_Bagging =currentRow.find("td:eq(1)").find("input").val();
		validate_pollinationDate = currentRow.find("td:eq(3)").find("input").val();
		//alert(validate_Bagging);
		if(validate_pollinationDate > systemDate){
			alert('pollination date must be less than system date');
			currentRow.find("td:eq(3)").find("input").val(' ');
			
		}
		else if(validate_pollinationDate < validate_Bagging)
		{
			alert('pollination date must be grater  than bagging date');
			currentRow.find("td:eq(3)").find("input").val(' ');
		}
		//alert(systemDate);
		//alert(validate_pollinationDate);
	});
	//validation for pollination quality
	//var letters = /^[a-zA-Z]+$/
	$("#pollination_Tbl").on('change','#poll_quantity',function(){
		var currentRow=$(this).closest("tr");
		Validate_Pollination_Qty_A =currentRow.find("td:eq(4)").find("input").val();
		if(isNaN(Validate_Pollination_Qty_A))
		{
			alert ('need to enter digits');
			currentRow.find("td:eq(4)").find("input").val(' ');
		}
		//alert('dfasdf');
	});
	//validation for polinator name
	$("#pollination_Tbl").on('change','#pollinator_name',function(){
		var currentRow=$(this).closest("tr");
		Validate_pollinater_name_A =currentRow.find("td:eq(8)").find("input").val();
		//for(int i=0;i <= Validate_pollinater_name_A.length;i++){
			if(isNaN(Validate_pollinater_name_A))
		{
			return true;
			
		}
		else{
			alert ('need to enter the alphabets');
			currentRow.find("td:eq(8)").find("input").val(' ');
		}
		//}
		
		//alert('dfasdf');
	});
    $("#pollination_Tbl").on('change','#Male_Parent-list',function(){
         // get the current row
         var currentRow=$(this).closest("tr"); 
         //var col1=currentRow.find("td:eq(0)").text(); // get current row 1st TD value
         var col7=currentRow.find("td:eq(6)"); // get current row 2nd TD
         var col6=currentRow.find("td:eq(5) option:selected").text(); // get current row 3rd TD
		 
         //var data=col1+"\n"+col2+"\n"+col3;
		 //var col3=$('#Male_Parent-list').find('select option:selected').val();
		$.post(
					"get_Block_pollination.php",
					{col6: col6},
					//$.each( response, function( response ) {
						//response.responseText;
						//$('#Block-list_pollination').html(response);
						//console.log( key + " : " + value );
					//});
					function(response){
						currentRow.find('td:eq(6) select').html("<option>"+response+"</option>");
						//response.responseText;
						//$('currentRow.find("td:eq(6)")').html(response);
						//$('#Block-list_pollination').html(response);
						//$('#Block-list_pollination').children().html(response);
						//$("#childElement").append("<b>Appended text</b>"
						
						//$('#insert_div').html("inserted successfully");
						
						//$('#insert_palmno__div').html(response);
						//$('#inflno_id').html(response);
			});
				//currentRow.find('td:eq(6)').html("<select><option>"+col6+"</option></select>");
	
        // alert(col6);

		
    });
	
	$("#pollination_Tbl").on('change','#Male_BLock-list',function(){
		var currentRow=$(this).closest("tr");
		var col5=currentRow.find("td:eq(5) option:selected").text();
		var col6=currentRow.find("td:eq(6) option:selected").text();
		//var data=col5+"\n"+col6;
		//alert(data);
		$.post(
					"palmno_pollination.php",
					{col5: col5,col6: col6},

					function(response){
						currentRow.find('td:eq(7) select').html("<option>"+response+"</option>");
			});
		
		
	});
});
<!--to submit the pollination details-->
/*
$(function () {
            var dataArr = [];
            $("td").each(function () {
                dataArr.push($(this).html());
            });
            $('#pollination_submit').click(function () {
                $.ajax({
                    type: "POST",
                    url: 'pollination_insertion.php',
                    data: "content=" + dataArr,
                    success: function (data) {
                        alert(data);// alert the data from the server
                    },
                    error: function () {
                    }
                });
            });
        });
*/
$("#pollination_submit").click(function (e) {
	$('#pollination_Tbl').find('tbody > tr').each(function() {
		
		palmno = $(this).find("td:eq(0)").find("input").val();
		Bagging = $(this).find("td:eq(1)").find("input").val();
		Infl_no = $(this).find("td:eq(2)").find("input").val();
		Pollination_date_A = $(this).find("td:eq(3)").find("input").val();
		Pollination_Qty_A = $(this).find("td:eq(4)").find("input").val();
		Male_seed_A = $(this).find("td:eq(5)").find("option:selected").val();
		Male_block_A = $(this).find("td:eq(6)").find("option:selected").val();
		palm_no_A = $(this).find("td:eq(7)").find("option:selected").val();
		pollinater_name_A = $(this).find("td:eq(8)").find("input").val();
		//var palmno_count = 0;
		//var total_count = 0;
		if(palmno !== undefined){
			//palmno_count ++;
			//&&(Bagging !== undefined)&&(Infl_no !== undefined)&&(Pollination_date_A !== undefined)&&(Pollination_Qty_A !== undefined)&&(Male_seed_A !== undefined)&&(Male_block_A !== undefined)&&(palm_no_A !== undefined)&&(pollinater_name_A !== undefined)){
			if((Pollination_date_A !== '')&&(Pollination_Qty_A !== '')&&(Male_seed_A !== 0)&&(Male_block_A !== 0)&&(palm_no_A !== '')&&(pollinater_name_A !== ''))
			{
				//total_count++;
					$.post(
					"pollination_insertion.php",
					{palmno: palmno,Bagging: Bagging,Infl_no: Infl_no,Pollination_date_A:Pollination_date_A,Pollination_Qty_A: Pollination_Qty_A,Male_seed_A :Male_seed_A,Male_block_A: Male_block_A,palm_no_A:palm_no_A,pollinater_name_A: pollinater_name_A},
					function(response){	
					response.responseText;
					//$('#pollination_submit').prop('disabled', true);
					$('#insert_pollination__div').html(response);
					});
			}
			//(Pollination_date_A != '')&&(Pollination_Qty_A != '')&&(Male_seed_A != 0)&&(Male_block_A != 0)&&(palm_no_A != '')&&(pollinater_name_A != '')){
		//alert(palmno);
		//alert(Bagging);
		//alert(Infl_no);
		//alert(Pollination_date_A);
		//alert(Pollination_Qty_A);
		//alert(Male_seed_A);
		//alert(Male_block_A);
		//alert(palm_no_A);
		//alert(pollinater_name_A);
		
		
		//if(palmno_count == total_count)
		//{
					
		//}
			
		else{
				alert('need to enter all the rows present in a table');
				//$("#insert_pollination__div").hide();
			}	
		}
		
		//else{
			//alert('need to enter all the details');
		//}
		
	});
	
});
$("#pollination_Tbl").on('click','#pollination_submit',function(){
//var currentRow=$(this).closest("tr");
//var col1=currentRow.find("td:eq(5) option:selected").text();
//alert(col1);
 $(this).closest('tr').find('td').each(
    function (i) {
      console.log($(this).text());
    });

});
	
//alert(document.getElementById("#pollination_Tbl").rows[0].innerHTML);
	//alert(data);
//});

	//poll_dateid
	$("#close_button1").click(function (e) {
				//alert("sfasfasfasd");
				$("#pollination_Tbl").hide();
				$("#pollination_submit").hide();
				$("#close_button1").hide();
				$("#insert_pollination__div").hide();
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

// Function to get all the dates in given range 
function getDatesFromRange($start, $end, $format = 'Y-m-d') { 
      
    // Declare an empty array 
    $array = array(); 
      
    // Variable that store the date interval 
    // of period 1 day 
    $interval = new DateInterval('P1D'); 
  
    $realEnd = new DateTime($end); 
    $realEnd->add($interval); 
  
    $period = new DatePeriod(new DateTime($start), $interval, $realEnd); 
  
    // Use loop to store date into array 
    foreach($period as $date) {                  
        $array[] = $date->format($format);  
    } 
  
    // Return the array elements 
    return $array; 
} 
//to validate pollination date

//to display pollination table
?>

<table id="pollination_Tbl" align="center"><tr><th>palm no</th><th>Bagging Date</th><th>inflorance no</th><th>Pollination date</th><th>pollination quantity</th><th>Male SeedGarden</th><th>Male Block No</th><th>palm number</th><th>Pollinator name</th></tr> 
<?php
// Function call with passing the start date and end date 
$Date = getDatesFromRange($from_date, $to_date);  
//echo  $from_date;
//var_dump($Date);
$systemDate = date("Y-m-d");
foreach ($Date as $key=>$item){
	//baggingdt = '$item'
}	
	$sql = "select distinct(palmno),baggingdt,inflno from femalebagging where sgid = '".$_REQUEST["seed_val"]."' && blkid = '".$_REQUEST["block_name"]."' && baggingdt >= '$from_date' && baggingdt < '$to_date' && subdate('$systemDate',30)>= baggingdt && pollenationdt IS NULL order by palmno,baggingdt,inflno";
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
					//if($date_interval > 30)
					//{
						?>
						<tr>
						<td><input type='text' id='palmno' name='name1' value="<?php echo $rs["palmno"];?>" size="1" disabled></td>
						<td><input type='text' id='baggingdate' name='name2' value="<?php echo $rs["baggingdt"];?>" size="6" disabled></td>
						<td><input type='text' id='inflno' name='name' value="<?php echo $rs["inflno"];?>" size="1" disabled></td>
						<td><input type='date' id='poll_dateid' name='name' size="6" required></td>
						<td><input type='text' name='name' id='poll_quantity' placeholder="Pollination Qty here" size="4"  required></td>
						<!--Male parent seedgarden code-->
						<td>
						<select id="Male_Parent-list" name="Seed_Garden_name" required>
				<option value="">Male SeedGarden</option>
				<?php
				$sql1 = "SELECT sgid,sgname from seedgarden GROUP BY sgid,sgname";
				$result1 = $dbhandle->query($sql1);
				while($rs1 = $result1->fetch_assoc()){	
				?>
				<!--
					<option><?php echo $systemDate; ?></option>
					<option><?php echo $rs["baggingdt"]; ?></option>
					<option><?php echo $date_interval;?></option>
				-->
					<option id="val" value="<?php echo $rs1["sgid"]; ?>"><?php echo $rs1["sgname"];?> </option>
					
				<?php
				
				}
				?>
			</select></td>
			<!-- MaleParent block table cell-->
			<td><select id="Male_BLock-list" required>
					<option>select block here</option>
			</select></td>
			<!-- code for palmno palmno here -->
						<td>
							<select required>
								<option>select Palm no</option>
							</select>
						</td>
						
						<td>
						<input type='text' name='name' id='pollinator_name' maxlength='15' placeholder="enter pollinator name" required>
						</td></tr>
						
						<?php
					//}
	}
	//echo "Today is " . $systemDate . "<br>";	
    //echo "$item <br>";
//}
?>

</table>
<div align="center"><button id="pollination_submit" class="cssForButton">submit</button>
<button id='close_button1' class="cssForButton">close table</button>
</div>

<div id="insert_pollination__div"></div>

<?php
//echo $from_date;
//echo $to_date;
?>
</body>
</html> 	