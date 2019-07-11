<html>
<head>
<link href="css/stylesV2.css" rel="stylesheet" type="text/css" />
	<script>
function isNumberKey(evt, element) {
  var charCode = (evt.which) ? evt.which : event.keyCode
  if (charCode > 31 && (charCode < 48 || charCode > 57) && !(charCode == 46 || charCode == 8))
    return false;
  else {
    var len = $(element).val().length;
    var index = $(element).val().indexOf('.');
    if (index > 0 && charCode == 46) {
      return false;
    }
    if (index > 0) {
      var CharAfterdot = (len + 1) - index;
      if (CharAfterdot > 4) {
        return false;
      }
    }

  }
  return true;
}
var blkid;
		function getState(val){
			blkid = val;
			$.post(
				"final_block.php",
				{blkid: blkid,inflno: inflno,palmno: palmno,baggingdate: baggingdate,seed_val: seed_val,block_name: block_name},
				function(response){
						$('#final_block').html(response);
				}
			);
			//alert('dfafasdf');
		}
	</script>
</head>
<body>
<div style="display: inline-block;float: left; ">
<div>
<!--
<p>Pollination Qty &emsp;&emsp;&emsp; Male parent Block</p>	
-->
	<p>&nbsp;&nbsp;&nbsp;&emsp;<u>Pollination Qty</u> &emsp;&emsp;&emsp; &emsp;<u>Male parent Block</u></p>							
</div>
<div style="display: inline-block;float: left; ">
<input type='text' name='name'  onkeypress="return isNumberKey(event,this)" placeholder="Pollination Qty here" style="width: 250px;height: 40px;background: #2196F3;border: none;" required>
</div>
<div style="display: inline-block;float: left; ">
<select id="Male_Parent-list" onChange="getState(this.value)" style="background: #2196F3;color: #fff;padding: 10px;width: 90px;height: 40px;border: none;font-size: 15px;">
				<option value="">Male Parent no</option>
				<?php
				if(($_REQUEST["seed_val"])&&($_REQUEST["block_name"])){
				include "connectdb.php";
				$sql = "select distinct(blkname) from seedgarden where sgid = '".$_REQUEST["seed_val"]."'";
				$result = $dbhandle->query($sql);
				while($rs = $result->fetch_assoc()){	
				?>
				<!--
					<option><?php echo $systemDate; ?></option>
					<option><?php echo $rs["baggingdt"]; ?></option>
					<option><?php echo $date_interval;?></option>
				-->
					<option id="va1" value="<?php echo $rs["blkname"]; ?>"><?php echo $rs["blkname"];?> </option>
					
				<?php
				
				}
				}
				else{
					echo("you need to select the seed garden and block");
				}
				?>
				<option>others</option>
			</select>
		</div>
</div>
<div id="final_block" style="display: inline-block;float: left;"></div>
</body>

</html>