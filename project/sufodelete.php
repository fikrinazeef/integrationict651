<?php
$server= "localhost";
$username="root";
$password="";
$dbname="project";

$con = mysqli_connect($server,$username,$password,$dbname);


if(isset($_GET['id'])){
$id = $_GET['id'];

   
	$query = "DELETE FROM ilearn WHERE id='$id'";

    $run=mysqli_query($con,$query) or die(mysqli_error());

    if($run){
        echo "<script>
        alert('delete successful !');
        window.location.href='adminsufo.php'
        </script>";
    }else{
       echo "<script>
        alert('delete not successful !');
        window.location.href='adminsufo.php'
        </script>";;
    }
}
?>