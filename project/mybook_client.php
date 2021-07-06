<head>
<link rel="stylesheet" type="text/css" href="main.css" />
<style>
#authorize_button {
  display: block;
  width: 50%;
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
<div class="wrapper">
	<div class="form-style-5">
<form action="" method="POST">
<label>Enter Author Name:</label><br />
<input type="text" name="author_name" placeholder="Enter Author Name" required/>
<br><br>
<button type="submit" id ="authorize_button" name="submit">Submit</button>
</form>
</div></div>
<?php
if (isset($_POST['author_name']) && $_POST['author_name']!="") {
    $author_name = $_POST['author_name'];
} else{
    $author_name="unknown";
}
$url = "https://api.nytimes.com/svc/books/v3/reviews.json?author=".
$author_name . "&api-key=ibGXdk1tmsHxvKUPAQFpM7XjKA8P0Gpb";
//echo $url. "<br>";

$client = curl_init($url);
curl_setopt($client, CURLOPT_URL, $url);
curl_setopt($client, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($client,CURLOPT_RETURNTRANSFER,true);

$response = curl_exec($client);

$result = json_decode($response,TRUE);
//echo var_dump($response);

//echo "Result status : " . $result["status"];
echo "<br> Number of Results : " . $result["num_results"];
foreach ($result["results"] as $key=>$value) {

echo " <br> ";
echo "<br>" .$key. " Book Title : " . $result["results"]["{$key}"]["book_title"];
echo "<br> Book Summary : " . $result["results"]["{$key}"]["summary"];
}
?>
