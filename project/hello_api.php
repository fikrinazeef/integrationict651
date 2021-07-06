
<?php

header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");

require_once "dbconn.php";

$query = "SELECT * FROM register";

$name = '';
if (isset($_GET['name']) && $_GET['name'] <> '')
{
    $name = $_GET['name'];
    $query = $query . " WHERE name LIKE '%" . $name . "%'";
}

$result = mysqli_query($conn, $query) or die("Select Query Failed.");

 //$row = mysqli_fetch_all($result, MYSQLI_ASSOC);
 $count = mysqli_num_rows($result);

if($count > 0)
{
 $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
 http_response_code(200);
 echo json_encode($row);
}
else
{
	http_response_code(400);
 	echo json_encode(array("message" => "No Product Found.", "status" => false));
}

?>



