<?php
$server= "localhost";
$username="root";
$password="";
$dbname="project";

$conn = mysqli_connect($server,$username,$password,$dbname);

if(isset($_POST['submit'])){

if(!empty($_POST['startdate']) && !empty($_POST['enddate'])){

	$start=$_POST['startdate'];
	$end=$_POST['enddate'];
	
	$query="insert into ilearn(startdate,enddate)
	VALUES('$start','$end')";
	
	$run=mysqli_query($conn,$query) or die(mysqli_error());
	
	if($run){
		 echo "<script>
        alert('Successful sent!');
        window.location.href='adminsufo.php'
        </script>";
		
	} 
	else{
		
		echo "Error";
		}
		
	}
	else{
		echo "all fields required";
}
}

?>