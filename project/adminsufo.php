<html>
<head>
	<title>SuFO</title>
	<link rel="stylesheet" type="text/css" href="sufo.css" />
</head>
<body>

<div class="container">

<form action="admininsertsufo.php" method="post">
  <div class="brand-logo"></div>
  <div class="brand-title">STUDENT FEEDBACK ONLINE (SuFO)</div>
  <div class="inputs">
    <label>START DATE</label>
    <input type="date" name="startdate" required />
    <label>END DATE</label>
    <input type="date" name="enddate" required />
	<hr>
	
		<table border = "1" width = "100%">     
         
         <tbody >
            <tr style="text-align: center">
               <td >Start Date </td>
               <td >Last Date</td>   
				<td >Action</td>  			   
            </tr>
		
  <?php
 
$conn = mysqli_connect("localhost","root","","project");
  $sql = "select * from ilearn";
  $result = $conn-> query($sql);
  
	  if($result ->num_rows > 0){
        while ($row = $result -> fetch_assoc()){
			?>
			
            <tr>
                <td><?php echo $row["startdate"];?></td>
                <td><?php echo $row["enddate"]; ?> </td>    
				<td><button onclick="location.href='sufodelete.php?id=<?php echo $row['id']; ?>'" type="button">Delete</button></td>			
            </tr>
			<?php
        }
      }
      else{
          echo "No SuFO record";
      }
      $conn-> close();

  ?>
  	  </tbody>   
    </table>
	<hr>

  </div>
  
	<button type="submit" name="submit">SEND REMINDER SuFO</button>
    <button onclick="window.location.href='adminmenu.php'">BACK</button>
	</form>

</div>


</body>
</html>