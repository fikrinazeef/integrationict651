<?php
// Include database connection file
require_once "db_connect.php";
if(count($_POST)>0) {
	$update = mysqli_query($con,"UPDATE admin set  lecturername='" . $_POST['lecturername'] . "', email='" . $_POST['email'] . "' ,phonenumber='" . $_POST['phonenumber'] .
		"' ,subject='" . $_POST['subject']	."' ,geroup='" . $_POST['geroup'] ."' WHERE id='" . $_POST['id'] . "'");
		
		if($update){
			echo "<script>
			alert('Update success !');
			window.location.href='adminupdate1.php'
			</script>";
		}else{
			echo "<script>
			alert('Update failed !');
			window.location.href='adminupdate2.php'
			</script>";
		}

		$message = "Record Modified Successfully";
	}
		$result = mysqli_query($con,"SELECT * FROM admin WHERE id='" . $_GET['id'] . "'");
		$row= mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Update Record</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="main.css" />

<style type="text/css">
.wrapper{
width: 500px;
margin: 0 auto;
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
</head>
	<body>
		<div class="wrapper">
			<div class="form-style-5">
			<div class="row">
			<div class="col-md-12">
			<div class="page-header">
		<h2>Update Record</h2>
		</div>
<p>Please edit the input values and submit to update the record.</p>
		<form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
		<div class="form-group">
			
			<input type="hidden" name="id" class="form-control" value="<?php echo $row["id"]; ?>">
			</div>
			<div class="form-group">
			<label>Name</label>
			<input type="text" name="lecturername" class="form-control" value="<?php echo $row["lecturername"]; ?>">
			</div>
			
			<div class="form-group ">
			<label>Email</label>
			<input type="email" name="email" class="form-control" value="<?php echo $row["email"]; ?>">
			</div>
			
			<div class="form-group">
			<label>Phone Number</label>
			<input type="text" name="phonenumber" class="form-control" value="<?php echo $row["phonenumber"]; ?>">
			</div>
			
			<div class="form-group">
			<label>Group : <?php echo $row["subject"]; ?></label>
			<select id="geroup" name="subject"  class="form-control"  >
			<optgroup label="CODE">
				<option value="ICT 600">ICT 600</option>
				<option value="ICT 602">ICT 602</option>
				<option value="ICT 603">ICT 603</option>
				<option value="ICT 604">ICT 604</option>
				<option value="ICT 651">ICT 651</option>
				<option value="CSP 600">CSP 600</option>
				<option value="TAC 501">TAC 501</option>
			</optgroup>
			</select> 
			</div>			
			
			<div class="form-group">
			<label>Group : <?php echo $row["geroup"]; ?></label>
			<select id="geroup" name="geroup"  class="form-control"  >
			<optgroup label="GROUP">
				<option value="RCS2405A">RCS2405A</option>
				<option value="RCS2405B">RCS2405B</option>
				<option value="RCS2405C">RCS2405C</option>
			</optgroup>
			</select> 
			</div>
			
			<input type="hidden" name="id" value="<?php echo $row["id"]; ?>"/>
					
			<button type="submit" id ="authorize_button">SUBMIT</button>
			<button type="button" id ="authorize_button" onClick="location.href='adminupdate1.php'">CANCEL</button>
		
		</form>
		</div>
		</div>        
	</div>
	</div>
	
</body>
</html>