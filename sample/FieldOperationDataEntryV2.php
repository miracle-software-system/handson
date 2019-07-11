<html>
	<head>
		<title>Field Operation Data Entry</title>
		<link href="css/stylesV2.css" rel="stylesheet" type="text/css" />
		<!--
		<script type="text/javascript" src="script/JavaScriptV2.js"></script>
		-->
		<style>
		.sample-class{
			margin-top: 50px;
			margin-left: 350px;
		}
		.sample-class select{
			background: #2196F3;
			color: #fff;
			padding: 10px;
			width: 210px;
			height: 40px;
			border: none;
			font-size: 15px;
			box-shadow: 0 5px 25px rgba(0,0,0,.5);
			border-radius: 5px;
			/*-webkit-appearance: button;*/
			}
		label{
			/*font-family:Lucida Console;*/
			font-size: 20px;
		}
		/*code for radio button*/
		.radio-class {
		margin: auto;
		margin-left: 430px;
		margin-top: 40px;
		width: 60%;
		/*
		border: 3px solid orange;
		*/
		padding: 10px;
		}
.container {
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}

.text-box-class{
	margin-left: 500px;
	 

}
.cssForinput{
	text-align:center;
		    border: 5px solid white; 
    -webkit-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    -moz-box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    box-shadow: 
      inset 0 0 8px  rgba(0,0,0,0.1),
            0 0 16px rgba(0,0,0,0.1); 
    padding: 15px;
    background: rgba(255,255,255,0.5);
    margin: 0 0 10px 0;
}
.cssForButton{
  background-color: #2196F3;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
  box-shadow: 0 5px 25px rgba(0,0,0,.5);
}
.cssForLastSubmit{
	background-color: #2196F3;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
  box-shadow: 0 5px 25px rgba(0,0,0,.5);
}
/*margin the div to display the table*/
/*
.table-class{
	margin-top: 50px;
	margin-left: 100px;
	margin-bottom: 500px;
	margin-right: 200px;
	margin-left: 300px; 
}
table {
  border-collapse: collapse;
  width: 70%;
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
*/
		</style>
	</head>
	<?php include "connectdb.php"; ?>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.js"></script>
	<!--
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	-->
	<body>
	<script type="text/javascript">

	
	var seed_val;
	function getState(val){
		seed_val = val;
		$.ajax({
			type:"POST",
			url:"get_Block.php",
			data:'sgid='+val,
			success: function(data){
			$("#Block-list").html(data);
			}
		});
	//alert(seed_val);
	$('#Block-list').on('change', function() {
	block_name = this.value;     
	//alert( block_name);
	$(document).ready(function(){
		$('#button_for_table').click(function(){
			//alert("working");
			//$('#table_div_id').fadeIn();		
			var txt = $('#text1');
			//alert(seed_val);
			
			if (txt.val() != null && txt.val() != '') {  
                   // alert('you entered text ' + txt.val());
					var text1 = $('#text1').val();	
					// $("#table_div_id").load('select_table.php');
					//alert(last);
				//alert( block_name);	
				$.post(
					"select_table.php",
					{text1: text1,seed_val: seed_val,block_name: block_name},
					function(response){
						$('#hello').html(response);
					}
					);
					
					$('#table_div_id').css("display","block");
                } 
				else {  
                    alert('Please enter text');  
				}

 
					
		});
		//text_box_h2
	});
	
	});
	    
	}

	/*
	function showMsg(){
		$("#msgS").html($("#Seed_Garden-list").text());
		$("#msgB").html($("#Block-list").text());
		return false;
	}
	*/
	
	/*
function toggle1() {
	if(document.getElementById("table_div_id").style.display=='none'){
		document.getElementById("table_div_id").style.display = 'block';
	}
	return false;
	}
	*/
	var temp = 0;
		function toggle() {
	if((document.getElementById("text_box_h1").style.display=='none')||(document.getElementById("text_box_h2").style.display = '')){
		$( "#s1" ).prop( "checked", false );
		$( "#s2" ).prop( "checked", false );
		document.getElementById("text_box_h1").style.display = '';
		document.getElementById("text_box_h2").style.display = 'none';
		document.getElementById("text_box_h3").style.display = 'none';
		temp = 1;
	}	
	else if(temp == 1){
		document.getElementById("text_box_h2").style.display = 'none';
		//document.location.reload(true);
	}
/*
	else if(document.getElementById("table_div_id").style.display=='none'){
		document.getElementById("table_div_id").style.display = 'block';
	}
*/
	return false;
	}
	
	$(function(){
		$('#text1').keydown(function(er){
			var key = er.keyCode;
			if(!((key == 8) || (key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105) || ( key == 188) || ( key == 189))){ 
				er.preventDefault();
			}
		});
	});
   $(function(){
    $(".radio1_c").click(function(){
		//alert(seed_val);
		//alert( block_name);
		if((seed_val != null)&&(block_name != null)){
			$.post(
				"select_pollinationV2.php",
				{seed_val: seed_val,block_name: block_name},
				function(response){
						$('#text_box_h2').html(response);
				}
			);
		$( "#s" ).prop( "checked", false );
		$( "#s2" ).prop( "checked", false );
		$("#text_box_h1").hide("fast");
		$("#text_box_h3").hide("fast");
		//$("#hello").hide("fast");
        $("#text_box_h2").show("fast");
		
		
		}
		else{
			$( "#s1" ).prop( "checked", false );
			alert('you need to select the seed garden and block');
		}
		
    });
  });
     $(function(){
    $(".radio1_p").click(function(){
		//alert(seed_val);
		//alert( block_name);
		if((seed_val != null)&&(block_name != null)){
			$.post(
				"select_harvestingV2.php",
				{seed_val: seed_val,block_name: block_name},
				function(response){
						$('#text_box_h3').html(response);
				}
			);
		$( "#s1" ).prop( "checked", false );
		$("#text_box_h1").hide("fast");
		//$("#hello").hide("fast");
        $("#text_box_h2").hide("fast");
		$("#text_box_h3").show("fast");
		
		
		}
		else{
			$( "#s" ).prop( "checked", false );
			$( "#s2" ).prop( "checked", false );
			alert('you need to select the seed garden and block');
		}
		
    });
  });
	/*
	$(document).ready(function(){
		$("#button_for_table").click(function () {
			function show_table(){
				var id = $("#text1").val();
				$.ajax({
					type: "POST",
					url: "select_table.php",
					data:'palmno='+val,
					success: function(data){
						$("#content").html(data);
						$("#button_for_table").hide();
					}
				});
			}	
			show_table();
		});
	});
	*/

</script>
	
		<div class="header">
			<h2>Field Operation Data Entry</h2>
		</div>
		<div class="sample-class">
		<form method="post">

			<label>Seed Garden </label>
			<select id="Seed_Garden-list" onChange="getState(this.value)" name="Seed_Garden_name">
				<option value="">select seed garden here</option>
				<?php
				$sql = "SELECT sgid,sgname from seedgarden GROUP BY sgid,sgname";
				$result = $dbhandle->query($sql);
				while($rs = $result->fetch_assoc()){
				?>
					<option id="va" value="<?php echo $rs["sgid"]; ?>"><?php echo $rs["sgname"];?> </option>
				<?php
				}
				?>
			</select>

			<label>Block </label>
			<select id="Block-list">
				<option id="block" value="">select block here </option>
			</select>
			<!--
			<button value="submit" onClick="showMsg()">Submit</button>
			-->
		</form>
		</div>
		<div class="radio-class">
			<label class="container">
			<!--
			<input type="radio" checked="checked" name="radio" onClick="toggle();">
			-->
			<input type="radio" id="s" name="radio" onClick="toggle();">
			<span class="checkmark"></span>
			Bagging</label>
			<label class="container">
			<input type="radio" id="s1" name="radio1" class="radio1_c">
			<span class="checkmark"></span>
			Pollination</label>
			<label class="container">
			<input type="radio" id="s2" name="radio" class="radio1_p">
			<span class="checkmark"></span>
			Harvest</label>
		</div>
				<div id="text_box_h1" class="text-box-class" style="display:none;">
					<input id="text1" type="text"  name="textBox" class="cssForinput" placeholder="enter palm no here" />
					<button id="button_for_table" value="submit" name="validate" class="cssForButton">click here to enter</button>
				</div>
				<div id="hello" name="hai" class ="table-class">
				<?php
							if (isset($_POST["#hello"])) 
		{
			$think = $_POST["#hello"];
		}
				?>
				</div>
		
			<div id="text_box_h2" class="desc" style="display:none;">
			</div>
			<div id="text_box_h3" class="desc" style="display:none;">
			</div>
		<!--
		Selected Seed Garde:<span id="msgS"></span>
		Selected Block:<span id="msgB"></span>
		-->
	</body>
</html>