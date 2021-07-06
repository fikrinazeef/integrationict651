<!DOCTYPE html>

<html>

   <head>
      <title>SuFO</title>
	  </head>
	<!--  <link rel="stylesheet" href="index.css" />
	  <link rel="stylesheet" type="text/css" href="main.css" /> -->
	  	
	  
	 </head>
	   <style>
#tbb {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#tbb td, #tbb th {
  border: 1px solid #ddd;
  padding: 8px;
}

#tbb tr:nth-child(even){background-color: #f2f2f2;}

#tbb tr:hover {background-color: #ddd;}

#tbb th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
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
	   <script src="indexjs.js"></script> 
	<?php
require('db_connect.php');

$sql="SELECT * , CONCAT('SuFO will be opened from 6 pm - 12 am in order to make a way to implementation of ODL in UFUTURE. However, SuFO will be completely closed during the last evaluation which is starting ', startdate, ' - ', enddate) AS SuFO FROM ilearn where id =1";
$result=mysqli_query($con,$sql);

while($rows=mysqli_fetch_assoc($result)){

?>

   <body>
   
   <!-- <div id="wrapper" class="active">
      
      Sidebar 
            <!-- Sidebar 
      <div id="sidebar-wrapper">
      <ul id="sidebar_menu" class="sidebar-nav">
           <li class="sidebar-brand"><a id="menu-toggle" href="#">iLearn  V3.0<span id="main_icon" class="glyphicon glyphicon-align-justify"></span></a></li>
      </ul>
	    <ul class="sidebar-nav" id="sidebar">     
        <li><a>MENU<span class="sub_icon glyphicon glyphicon-link"></span></a></li>
		  <li><a>SuFO <span class="sub_icon glyphicon glyphicon-link"></span></a></li> -->
        
	  <?php
  
 /* $conn = mysqli_connect("localhost","root","","project");
  $sql = "select subject from admin ";
  $result = $conn-> query($sql);
  
	  if($result ->num_rows > 0){
		while ($row = $result -> fetch_assoc()){
			echo 
			"<ul><li>"."<font color=white>".$row["subject"] ."</font>"."</li></ul>";
		}
	  }
	  else{
		  echo "No results";
	  }
	  $conn-> close(); */
	  
  ?>
 <!--     </ul>
      </div> -->
          
      <!-- Page content -->
      <div id="page-content-wrapper">
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
              <div class="col-md-12">
              
            <h3><?php echo $rows['SuFO']; ?> </h3>
   
   <input type="hidden" value = "<?php echo $rows['startdate']; ?> " id= "startdate">
   <input type="hidden" value = "<?php echo $rows['enddate']; ?> " id= "enddate">
			</div>
			  <table id="tbb" border = "1" width = "100%"> 
     
         <tfoot>
            <tr>
               <br><td colspan = "6" style="text-align: center">SuFO will open soon</td>
            </tr>
         </tfoot>
         
         <tbody >
		 <div class="form-style-5">
            <tr style="text-align: center">
               <th >Group </th>
               <th >Course</th>
               <th >Team Teaching</th>
               <th >Lecturer</th>
			   <th >Status</th>
               <th>Action</th>
            </tr>
	<?php
  
  $conn = mysqli_connect("localhost","root","","project");
  $sql = "select * from admin where geroup='RCS2405B'";
  $result = $conn-> query($sql);
  
	  if($result ->num_rows > 0){
		while ($row = $result -> fetch_assoc()){
			echo "<tr><td>".$row["geroup"]."</td><td>".
			$row["subject"]."</td><td>".$row["teaching"]."</td><td>".$row["lecturername"].
			"</td><td>".$row["status"]."</td><td> <input type='button' value='CLOSE' style='background-color:red'></td></tr>";
		}
	  }
	  else{
		  echo "";
	  }
	  $conn-> close();
	  
  ?>
          
         </tbody>
         
      </table>
          </div>
        </div>
      </div>
      
    </div>
   
   
   <button id="authorize_button" style="display: none;">Reminder SuFO</button>
    <button id="signout_button" style="display: none;">Sign Out</button>
	<button id="addToCalendar" style="display: none;">Add to Google Calendar</button>
	
	 <pre id="content" style="white-space: pre-wrap;"></pre>

      
	  
	  <script type="text/javascript">
      // Client ID and API key from the Developer Console
      var CLIENT_ID = '728638435165-iu4v0d61ee17qopopp1ubvk346jfa3il.apps.googleusercontent.com';
	  //'147153121919-0pk58a10v9j9qmjmj9fm8hdo2k1h17lv.apps.googleusercontent.com';
	  //
      var API_KEY = 'AIzaSyBXXxupUQLF_amHUcrO1jgwVm7NfA7mqYM';
	  //'AIzaSyBUBpNrxs9KKC668prIPEzkXeM7hu2kU_0';
	  //

      // Array of API discovery doc URLs for APIs used by the quickstart
      var DISCOVERY_DOCS = ["https://www.googleapis.com/discovery/v1/apis/calendar/v3/rest"];

      // Authorization scopes required by the API; multiple scopes can be
      // included, separated by spaces.
      var SCOPES = "https://www.googleapis.com/auth/calendar";

      var authorizeButton = document.getElementById('authorize_button');
      var signoutButton = document.getElementById('signout_button');
	  var addToCalendar = document.getElementById('addToCalendar');

      /**
       *  On load, called to load the auth2 library and API client library.
       */
      function handleClientLoad() {
        gapi.load('client:auth2', initClient);
		
      }

      /**
       *  Initializes the API client library and sets up sign-in state
       *  listeners.
       */
      function initClient() {
        gapi.client.init({
          apiKey: API_KEY,
          clientId: CLIENT_ID,
          discoveryDocs: DISCOVERY_DOCS,
          scope: SCOPES
        }).then(function () {
          // Listen for sign-in state changes.
          gapi.auth2.getAuthInstance().isSignedIn.listen(updateSigninStatus);

          // Handle the initial sign-in state.
          updateSigninStatus(gapi.auth2.getAuthInstance().isSignedIn.get());
          authorizeButton.onclick = handleAuthClick;
          signoutButton.onclick = handleSignoutClick;
		   addToCalendar.onclick = handleAddClick;
			
        }, function(error) {
          appendPre(JSON.stringify(error, null, 2));
        });
      }

      /**
       *  Called when the signed in status changes, to update the UI
       *  appropriately. After a sign-in, the API is called.
       */
      function updateSigninStatus(isSignedIn) {
        if (isSignedIn) {
          authorizeButton.style.display = 'none';
          signoutButton.style.display = 'none';
		  addToCalendar.style.display = 'block'
          listUpcomingEvents();
        } else {
          authorizeButton.style.display = 'block';
          signoutButton.style.display = 'none';
		  ;
        }
      }

      /**
       *  Sign in the user upon button click.
       */
      function handleAuthClick(event) {
        gapi.auth2.getAuthInstance().signIn();
      }

      /**
       *  Sign out the user upon button click.
       */
      function handleSignoutClick(event) {
        gapi.auth2.getAuthInstance().signOut();
      }
	  
	  function handleAddClick(event) {
       
		getUserInput();
		    createEvent(getUserInput());
	   
      }
	  
	  
	  	function getUserInput(){
			var startdate = document.getElementById('startdate').value;
			var startTime = "06:00";
			var endTime = "23:50";
			var enddate = document.getElementById('enddate').value;
	
  
  // check input values, they should not be empty
		
		return {'startTime': startTime, 'endTime': endTime,
               'startdate': startdate,'enddate': enddate}
			   
			
		}

      /**
       * Append a pre element to the body containing the given message
       * as its text node. Used to display the results of the API call.
       *
       * @param {string} message Text to be placed in pre element.
       */
      function appendPre(message) {
        var pre = document.getElementById('content');
        var textContent = document.createTextNode(message + '\n');
        pre.appendChild(textContent);
      }

      /**
       * Print the summary and start datetime/date of the next ten events in
       * the authorized user's calendar. If no events are found an
       * appropriate message is printed.
       */

	  function createEvent(eventData) {
  // First create resource that will be send to server.
   var resource = {
        "summary": 'SuFO',
         "start": {
          "dateTime": new Date(eventData.startdate + " " + eventData.startTime).toISOString()
        },
        "end": {
          "dateTime": new Date(eventData.enddate + " " + eventData.endTime).toISOString()
          },
		  
		  'reminders': {
    'useDefault': false,
    'overrides': [
      {'method': 'email', 'minutes': 24 * 60},
      {'method': 'popup', 'minutes': 10}
    ]
  }
        };

    // create the request

	
	var request = gapi.client.calendar.events.insert({
	'calendarId': 'primary',
	'resource': resource
		});

  
    // execute the request and do something with response
			 request.execute(function(resp) {
      console.log(resp);
      alert("Your event was added to the calendar.");
    });
}
	  

    </script>
	  <script async defer src="https://apis.google.com/js/api.js"
      onload="this.onload=function(){};handleClientLoad()"
      onreadystatechange="if (this.readyState === 'complete') this.onload()">
    </script>
 
	  
   </body>
	<?php
}
	?>
	
	

	
</html>