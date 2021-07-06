<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>List Lecturer</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
.bs-example{
margin: 20px;
}
#authorize_button {
  display: block;
  width: 100%;
  background: #04AA6D;
  padding: 0;
  border: none;
  outline: none;
  box-sizing: border-box;
  margin-top: 20px;
  height: 40px;
  border-radius: 20px;
  cursor: pointer;
  font-weight: 900;
  box-shadow: 6px 6px 6px #cbced1, -6px -6px 6px white;
  transition: 0.5s;

}
</style>
		<script type="text/javascript">
		$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
</script>
</head>
<body>
	<div class="bs-example">
		<div class="container">
			<div class="row">
			<div class="col-md-12">
			<div class="page-header clearfix">
			<h2 class="pull-left" style="text-align: center">Lecturer List</h2>
			</div>
<?php
include_once 'db_connect.php';
$result = mysqli_query($con,"SELECT * FROM admin");
?>
<?php
if (mysqli_num_rows($result) > 0) {
?>
<table class='table table-bordered table-striped'>
	<tr>
		<td>Name</td>
		<td>Email</td>
		<td>Phone number</td>
		<td>Subject</td>
		<td>Group</td>
	</tr>
<?php
	$i=0;
		while($row = mysqli_fetch_array($result)) {
?>
	<tr>
		<td><?php echo $row["lecturername"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
		<td><?php echo $row["phonenumber"]; ?></td>
		<td><?php echo $row["subject"]; ?></td>
		<td><?php echo $row["geroup"]; ?></td>
		<td><a href="adminupdate2.php?id=<?php echo $row["id"]; ?>">Update</a><br>
		<input type='hidden' name='id' value='".$row["id"]."'>
		<a href="admindelete.php?id=<?php echo $row["id"]; ?>">Delete</a></td>
	</tr>
<?php
	$i++;
}
?>

</table>

<?php
	}
	else{
		echo "No result found";
	}
?>
		</div>
	</div> 
	<a href="adminmenu.php"><input type="button" id ="authorize_button"value="BACK" />	
	</div>
</div>

</body>
</html>