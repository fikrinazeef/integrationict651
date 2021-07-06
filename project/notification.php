<?php

$sql="SELECT * FROM ilearn where startdate =1";
$sqla="SELECT * FROM admin  ";
$result=mysqli_query($con,$sql);

while($rows=mysqli_fetch_assoc($result)){

?>