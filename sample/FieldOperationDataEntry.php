<html>
<head>
<!-- to get the present working directory use the command -->
<!--
 <?php echo getcwd(); ?>
 -->
 <link href="css/styles.css" rel="stylesheet" type="text/css" />
 <script type="text/javascript" src="script/JavaScript.js"></script>
<!--
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
</style>
-->
</head>
	<title>Field Operation Data Entry</title>
	<body>
	<div class="header">
		<h1>Field Operation Data Entry</h1>
	</div>
	<!-- code for dropdown-->

	
<div class="dropdown">
  <button class="dropbtn">Seed Garden</button>
  <div class="dropdown-content">
	<!--to get the data from the table to display it in dropdown list-->
	<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "iiopr";
	$dbname = "hybridisation";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT DISTINCT sgname FROM seedgarden";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         echo  '<a href="#">'.$row["sgname"].'</a>' ;
    }
	} else {
    echo "0 results";
	}

	$conn->close();
	?>
  </div>
</div>
<div class="dropdown1" style="float:right;">
  <button class="dropbtn1">Block</button>
  <div class="dropdown-content1">
	<!--to get the data from the table to display it in dropdown list-->
	<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "iiopr";
	$dbname = "hybridisation";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT DISTINCT blkname FROM seedgarden";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
         echo  '<a href="#">'.$row["blkname"].'</a>' ;
    }
	} else {
    echo "0 results";
	}

	$conn->close();
	?>
  </div>
</div>	
		

  <div class="some-class">
	<label class="container">Bagging
    <input type="radio" checked="checked" name="radio" onClick="toggle();">
	<span class="checkmark"></span>
    </label>
	<label class="container">
    <input type="radio" name="radio">
    <span class="checkmark"></span>
    Pollination</label>
	<label class="container">
	<input type="radio" name="radio">
    <span class="checkmark"></span>
    Harvest</label>

  </div>

<div class="table-class">
<form>
<table>
  <col>
  <colgroup span="1"></colgroup>
  <colgroup span="1"></colgroup>
  <colgroup span="1"></colgroup>
  <colgroup span="1"></colgroup>
  <colgroup span="2"></colgroup>
  <tr>
   <!-- <td rowspan="2"></td>-->
   <th id="text_box_h1" colspan="1" scope="colgroup" style="display:none;"> </th>
   <th id="table_h1" colspan="1" scope="colgroup" style="display:none;">Palm no</th>
   <th id="table_h2" colspan="1" scope="colgroup" style="display:none;">Bagging Date</th>
   <th id="table_h3" colspan="1" scope="colgroup" style="display:none;">Infl No</th>
   <th colspan="2" scope="colgroup" style="display:none;">Pollination</th>
   <th colspan="1" scope="colgroup" style="display:none;">Male Parent block</th>
   <th colspan="1" scope="colgroup" style="display:none;">Male Parent No</th>
   <th colspan="1" scope="colgroup" style="display:none;">Pollinator Name</th>
   <th colspan="1" scope="colgroup" style="display:none;">Date Of Harvest</th>
   <th colspan="1" scope="colgroup" style="display:none;">Bunch Weight</th>
  </tr>
  <tr>
    <th scope="col" style="display:none;"> </th>
	<th scope="col" style="display:none;"> </th>
	<th scope="col" style="display:none;"> </th>
    <th scope="col" style="display:none;">Date</th>
    <th scope="col" style="display:none;">Qty</th>
	<th scope="col" style="display:none;"> </th>
	<th scope="col" style="display:none;"> </th>
	<th scope="col" style="display:none;"> </th>
	<th scope="col" style="display:none;"> </th>
	<th scope="col" style="display:none;"> </th>
  </tr>
 
  <tr>
   <!-- <th scope="row">Teddy Bears</th>-->
   <!--
    <td id="hidethis1" style="display:none;">50,000</td>
	-->
	<!-- to print the palm number from the table -->
	<?php
	$servername = "127.0.0.1";
	$username = "root";
	$password = "iiopr";
	$dbname = "hybridisation";
	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
	}
	$sql = "SELECT * FROM femalebagging";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		 echo  '<td id="text_box" style="display:none;"><input type="text" name="textBox" placeholder="enter palm no here" required/></td>';
         echo  '<td id="hidethis1" style="display:none;">'.$row["palmno"].'</td>' ;
		 echo  '<td id="hidethis2" style="display:none;">'.$row["baggingdt"].'</td>' ;
		 echo  '<td style="display:none;"> </td>' ;
		 echo  '<td style="display:none;"> </td>' ;
		 echo  '<td id="infl_no" style="display:none;">'.$row["inflno"].'</td>' ;
    }
	} else {
    echo "0 results";
	}
	$conn->close();
	?>
	<!--
    <td id="hidethis2" style="display:none;">30,000</td>
    -->	
   
	<td scope="col" style="display:none;"> </td>
	<td scope="col" style="display:none;"> </td>
	<td scope="col" style="display:none;"> </td>
	<td scope="col" style="display:none;"> </td>
	<td scope="col" style="display:none;"> </td>
	<td scope="col" style="display:none;"> </td>
  </tr>
  <tr>
    <!--<th scope="row">Board Games</th>-->
    <td id="hidethis3" style="display:none;">10,000</td>
    <td id="hidethis4" style="display:none;">5,000</td>
    <td style="display:none;">12,000</td>
    <td style="display:none;">9,000</td>
	<th scope="col" style="display:none;"> </th>
	<th scope="col" style="display:none;"> </th>
	<th scope="col" style="display:none;"> </th>
	<th scope="col" style="display:none;"> </th>
	<th scope="col"style="display:none;"> </th>
	<th scope="col"style="display:none;"> </th>
  </tr>
</table>
</form>
</div>
</body>
</html>