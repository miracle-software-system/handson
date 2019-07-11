<html>
	<head>
		<script>
	$(function(){
		$('#text2').keydown(function(er){
			var key = er.keyCode;
			if(!((key == 46) || (key >= 35 && key <= 40) || (key >= 48 && key <= 57) || (key >= 96 && key <= 105) || ( key == 188) || ( key == 189))){
				$(this).next('#text2').focus();
				return true;
			}
			else{
				alert('must be enter alphabets');
				$(this).next('#text2').focus();
				return false;
			}
		});
	});
		</script>
	</head>
	<body>
	<div >
	<div>
			<p>&nbsp;&nbsp;&nbsp;&emsp;<u>Male Parent No</u> &emsp;&nbsp;&nbsp;&nbsp;&emsp;&emsp; <u>Pollinator Name</u></p>
					
	</div>
	<div style="display: inline-block;float: left; ">
	<select id="Male-list"  style="background: #2196F3;color: #fff;padding: 10px;width: 200px;height: 40px;border: none;font-size: 15px;">
				<option value="">palM no</option>
				<?php
				if(($_REQUEST["seed_val"])&&($_REQUEST["block_name"])){
				include "connectdb.php";
				$sql = "select distinct(palmno) from sgpalms where sgid = '".$_REQUEST["seed_val"]."' && blkid = '".$_REQUEST["block_name"]."' && parenttype='P'";
				$result = $dbhandle->query($sql);
				while($rs = $result->fetch_assoc()){	
				?>
				<!--
					<option><?php echo $systemDate; ?></option>
					<option><?php echo $rs["baggingdt"]; ?></option>
					<option><?php echo $date_interval;?></option>
				-->
					<option id="va1" value="<?php echo $rs["palmno"]; ?>"><?php echo $rs["palmno"];?> </option>
					
				<?php
				
				}
				}
				else{
					echo("you need to select the seed garden and block");
				}
				?>
			</select>
		</div>
		
		<input type='text' name='name' id='text2' maxlength='15' style="width: 180px;height: 40px;background: #2196F3;border: none;" placeholder="enter pollinator name" required>
		</div>
	</body>
</html>