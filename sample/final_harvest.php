<html>
<head>
<link href="css/stylesV2.css" rel="stylesheet" type="text/css" />
	<script>
		var d = new Date();
		var month = d.getMonth()+1;
		var fullMonth=(month < 10 ? '0' : '') + month;
		var day = d.getDate();
		var fullDay=(day < 10 ? '0' : '') + day;
		//alert(fullDay);
		var year = d.getFullYear();
		var systemDate = year + '-'+fullMonth+'-'+fullDay;
		var pollenationdate = "<?php echo $_REQUEST["pollenationdt"] ?>";
		//alert(BaggiData);
		function getState(val){
			//alert('dfasdf');
			harvest_date = val;
			if(harvest_date < systemDate){
				if(harvest_date > pollenationdate){
					alert(harvest_date);
				}
				else{
					alert('must be grater than pollenationdate');
					$('#dateid2').val(' ');
				}
				//alert(Pollination_Data);
				
			}
			else{
				alert('must be less than system current date');
				$('#dateid2').val(' ');
			}
		}		
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
	</script>
</head>
<body>
<div style="display: inline-block;float: left;">
<div>
			<p>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;harvest date &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Bunch weight</p>						
</div>
<div style="display: inline-block;float: left;">
<input type="text" style="width: 180px;height: 40px;background: #2196F3;border: none;" disabled>
</div>
<div style="display: inline-block;float: left;">
<input type="text" style="width: 180px;height: 40px;background: #2196F3;border: none;" disabled>
</div>
<div style="display: inline-block;float: left;" >
<input type='date' id='dateid2' name='name' onChange="getState(this.value)" placeholder="Pollination date" style="width: 180px;height: 40px;background: #2196F3;border: none;" required>	
</div>
<div style="display: inline-block;float: left;">			
<input type='text' name='name'  onkeypress="return isNumberKey(event,this)"  placeholder="enter numbers with decimal upto 3 digits"  style="width: 250px;height: 40px;background: #2196F3;border: none;" required>
</div>
</div>
</body>

</html>