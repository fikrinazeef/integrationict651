<!doctype html>
<html>
<head>
<meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="main.css" />
	<title>SuFO</title>
	<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}

</style>
</head>
<body>
<div class="form-style-5">
<form action="" method="get">
<h2 style="text-align: center">LIST LECTURER</h2>
<table id="customers">
  <tr>
    <th>LECTURER NAME</th>
    <th>EMAIL</th>
    <th>PHONE NUMBER</th>
	<th>SUBJECT </th>
    <th>GROUP </th>
  </tr>
  <?php
  
  $conn = mysqli_connect("localhost","root","","project");
  $sql = "select * from admin";
  $result = $conn-> query($sql);
  
	  if($result ->num_rows > 0){
		while ($row = $result -> fetch_assoc()){
			echo "<tr><td>".$row["lecturername"]."</td><td>".
			$row["email"]."</td><td>".$row["phonenumber"]."</td><td>".$row["subject"].
			"</td><td>".$row["geroup"]."</td><td> <a  style='background-color:red' href='admindelete.php?id=".$row["id"]."onclick='return confirm('Are you sure to cancel this booking?');'>Delete</a></td></tr>";
		}
	  }
	  else{
		  echo "No results";
	  }
	  $conn-> close();
	  
  ?>
</table>
<br>
  <a href="adminmenu.php"><input type="button" value="Cancel" />
</form>
</div>
</body>
</html>