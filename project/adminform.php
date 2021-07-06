<!doctype html>
<html>
<head>
<meta charset="utf-8">

<link rel="stylesheet" type="text/css" href="main.css" />

	<title>SuFO</title>
	<style>
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
.wrapper{
width: 800px;
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
	<h2 style="text-align: center">Add new lecturer  <h2>
	<form action="admin.php" method="post">
	<fieldset>
	<legend><span class="number">1</span> LECTURER INFO</legend>
		<input type="text" name="lecturername" placeholder="lecturer Name" required>
		<input type="email" name="email" placeholder="email" required>
		<input type="text" name="phonenumber" placeholder="phonenumber" required>
		
	<fieldset>
	<legend><span class="number">2</span> SUBJECT</legend>
		
	</fieldset>
	<select id="subject" name="subject" required>
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
	
	<select id="geroup" name="geroup" required>
	<optgroup label="GROUP">
		<option value="RCS2405A">RCS2405A</option>
		<option value="RCS2405B">RCS2405B</option>
		<option value="RCS2405C">RCS2405C</option>

	</optgroup>
	</select>   	
			
	</fieldset>
	
		<input type="submit" id ="authorize_button" name="submit" value="Apply" />
		 <a href="adminmenu.php"><input type="button" value="Cancel" id ="authorize_button" />
	</form>
	<br>
</div>
</div>
</body>
</html>