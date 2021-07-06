
<head>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round|Open+Sans">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style>
.bs-example{
margin: 20px;
}
#authorize_button {
  display: block;
  width: 10%;
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
<form action="" method="POST">
<br>
<label>Enter Lecturer Name:</label><br />
<input type="text" name="name" placeholder="Enter Name"/>
<br />
<button type="submit" id="authorize_button" name="submit">Submit</button>
</form>

 <?php

 $name = '';
 if (isset($_POST['name'])) {
    $name = $_POST['name'];
 }

 $url = "http://localhost/project/hai/" . $name;
 $client = curl_init($url);
 curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
 $response = curl_exec($client);
 $result = json_decode($response);
?>
  <table class="table table-striped" id="myProduct">
             <thead>
                 <tr> 
					<th>NAME</th>
					<th>CODE</th>
					<th>SUBJECT</th>						
                  </tr>
            </thead>
                <tbody>
                  <?php
                  for ($i = 0; $i < count($result); $i++) {					
                    ?>
                  <tr>
                     <td><?php echo $result[$i]->{'name'} ;?></td>							
                     <td><?php  echo $result[$i]->{'code'}; ?></td>							
					 <td><?php  echo $result[$i]->{'subject'}; ?></td>
                  </tr>
                       <?php
                        }
                        ?> 
                        </tbody>
                    </table>