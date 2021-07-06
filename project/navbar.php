<!DOCTYPE html>

<html>

   <head>
      <title>SuFO</title>
	  </head>
	  <link rel="stylesheet" href="index.css" />
	  <link rel="stylesheet" type="text/css" href="main.css" />
	 </head>
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
	   <script src="indexjs.js"></script> 
	<?php
require('db_connect.php');

$sql="SELECT * , CONCAT('SuFO will be opened from 6 pm - 12 am in order to make a way to implementation of ODL in UFUTURE. However, SuFO will be completely closed during the last evaluation which is starting ', startdate, ' - ', enddate) AS SuFO FROM ilearn where id =1";
$result=mysqli_query($con,$sql);

while($rows=mysqli_fetch_assoc($result)){

?>

   <body>
   
   <div id="wrapper" class="active">
      
      <!-- Sidebar -->
            <!-- Sidebar -->
      <div id="sidebar-wrapper">
      <ul id="sidebar_menu" class="sidebar-nav">
           <li class="sidebar-brand"><a id="menu-toggle" href="#">iLearn  V3.0<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
      </ul>
	    <ul class="sidebar-nav" id="sidebar">     
        <li><a href="index.php" target="content">MENU</a></li>
		<li><a href="list_lecturer_api.php" target="content">LIST LECTURER</a></li>
		<li><a href="mybook_client.php" target="content">NOTES</a></li>
		
        
	  <?php
  
  $conn = mysqli_connect("localhost","root","","project");
  $sql = "select subject from admin where geroup='RCS2405B' ";
  $result = $conn-> query($sql);
  
	  if($result ->num_rows > 0){
		while ($row = $result -> fetch_assoc()){
			echo 
			"<ul><li>"."<font color=white>".$row["subject"] ."</font>"."</li></ul>";
		}
	  }
	  else{
		  echo "No Subject Available";
	  }
	  $conn-> close();
	  
  ?>
      </ul>
      </div>
	 </body>
	 <?php
}
	?>
	
	 </html>