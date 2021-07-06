<?php
$server= "localhost";
$username="root";
$password="";
$dbname="project";

$conn = mysqli_connect($server,$username,$password,$dbname);

if(isset($_POST['submit'])){

if(!empty($_POST['lecturername']) && !empty($_POST['email']) && !empty($_POST['phonenumber']) && !empty($_POST['subject']) && !empty($_POST['geroup'])){

	$lname=$_POST['lecturername'];
	$email=$_POST['email'];
	$pno=$_POST['phonenumber'];
	$subject=$_POST['subject'];
	$gg=$_POST['geroup'];
	
	$query="insert into admin(lecturername,email,phonenumber,subject,geroup)
	VALUES('$lname','$email','$pno','$subject','$gg')";
	
	$run=mysqli_query($conn,$query) or die(mysqli_error());
	
	if($run){
		 echo "<script>
        alert('Successful !');
        window.location.href='adminmenu.php'
        </script>";
		
	} 
	else{
		
		echo "Form not submitted";
		}
		
	}
	else{
		echo "all fields required";
}
}

?>