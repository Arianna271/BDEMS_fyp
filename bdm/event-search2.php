<?PHP
session_start();

include("database.php");
?>
<?PHP
$postcode	= (isset($_REQUEST['postcode'])) ? trim($_REQUEST['postcode']) : '';
$eventID	= (isset($_REQUEST['eventID'])) ? trim($_REQUEST['eventID']) : '';

$SQL_list 	= "SELECT * FROM `event` WHERE `eventID` = '$eventID' ";
$result 	= mysqli_query($con, $SQL_list) ;
$data		= mysqli_fetch_array($result);
$eventName	= $data["eventName"];
?>
<!DOCTYPE html>
<html>
<title>BLOOD DONATION MANAGEMENT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Poppins", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}

.tajuk { font-family: 'Montserrat', sans-serif;  }

/* Full height bg */
.bgimg {
  background-position: left;
  background-size: cover;
  /*background-attachment:fixed;*/
  background-image: url(images/banner.jpg);
  background-repeat: no-repeat;
  /*min-width:100%;*/
 /* background-color: rgba(255, 255, 255, 0.9);
  background-blend-mode: overlay; */
}


.menu_top {
  background-position: top;
  /*background-size: cover;*/
  /*background-attachment:fixed;*/
  background-image: url(images/3rectangle.png);
  background-repeat: no-repeat;
  /*min-width:100%;*/
 /* background-color: rgba(255, 255, 255, 0.9); 
  background-blend-mode: overlay; */
}

a:link {
  text-decoration: none;
}

.w3-bar .w3-button {
  padding: 16px;
}

.w3-beach,.w3-hover-beach:hover{color:#000!important;background-color:#faf5f5!important}

.w3-dark-maroon,.w3-hover-dark-maroon:hover{color:#fff!important;background-color:#930b02!important}
.w3-text-dark-maroon,.w3-hover-text-dark-maroon:hover{color:#930b02!important}

.w3-maroon,.w3-hover-maroon:hover{color:#fff!important;background-color:#d13939!important}
.w3-text-maroon,.w3-hover-text-maroon:hover{color:#d13939!important}

</style>



<body class="" >

<?PHP include("menu.php"); ?>

<div class="w3-black w3-center" id="contact">
	<div class="w3-content w3-container bgimg" style="max-width:1400px">
		

		<div class="w3-padding-64"></div>
		<div class="w3-padding-32"></div>

	</div>
</div>


<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-red" style="max-width:1400px">
		<div class="w3-content w3-container w3-large" style="max-width:1100px">	
			<div class="w3-row">
				<div class="w3-col w3-center w3-padding-16" style="width:20%">
					Location<br>
					<div class="w3-padding"><img src="images/location.png" height="40px"></div>
					<div class="w3-tag w3-white w3-small w3-round-xlarge w3-text-maroon"><b><a href="event.php?page=event">&nbsp;<i class="fa fa-fw fa-times"></i></a>  &nbsp;&nbsp;<?PHP echo $postcode;?></b>&nbsp;</div>
				</div>
				
				<div class="w3-col  w3-center w3-padding-24" style="width:20%">				
					<img src="images/downWhite.png" width="70px">
				</div>
				
				<div class="w3-col w3-center w3-padding-16" style="width:20%">
					Blood Donation Events<br>
					<div class="w3-padding"><img src="images/event.png" height="40px"></div>					
					<div class="w3-tag w3-white w3-small w3-round-xlarge w3-text-maroon"><b><a href="event-search.php?page=event&postcode=<?PHP echo $postcode;?>"><i class="fa fa-fw fa-times"></i></a>  &nbsp;&nbsp;<?PHP echo $eventName;?></b>&nbsp;</div>
				</div>
				
				<div class="w3-col  w3-center w3-padding-24" style="width:20%">				
					<img src="images/downWhite.png" width="70px">
				</div>
				
				<div class="w3-col w3-center w3-padding-16" style="width:20%">
					Date & Time<br>
					<div class="w3-padding"><img src="images/datetime.png" height="40px"></div>
					<div class="w3-tag w3-white w3-small w3-round-xlarge w3-text-maroon"><b>&nbsp;<i class="fa fa-fw fa-check"></i>  &nbsp;&nbsp;Complete</b>&nbsp;</div>
				</div>
			</div>
		</div>
	</div>
</div>	


<div class="w3-black" id="contact">
	<div class="w3-content w3-containerx w3-white" style="max-width:1400px">
		<iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $data["eventName"]; ?>&output=embed" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		
	</div>
</div>

<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-beach" style="max-width:1400px">
		<div class="w3-content w3-container w3-large" style="max-width:1100px">	
				<p>
				<div class="w3-large w3-text-dark-maroon"><b>Event Name:</b></div>
				<?PHP echo $data["eventName"]; ?>
				</p>
				<div class="w3-padding-small"></div>
				<p>
				<div class="w3-large w3-text-dark-maroon"><b>Lacation Address:</b></div>
				<?PHP echo $data["eventAddress"]; ?>
				</p>
				<div class="w3-padding-small"></div>
				<p>
				<div class="w3-large w3-text-dark-maroon"><b>Date:</b></div>

				
<?PHP
	$date = "2021-02-02";
    $newDate = date('l', strtotime($data["eventDate"]));
  
    //echo $newDate;
	
//echo "<hr>";
	
$Date1 = $data["eventDate"];
$Date2 = $data["eventDateEnd"];
  
// Declare an empty array
$array = array();
  
// Use strtotime function
$Variable1 = strtotime($Date1);
$Variable2 = strtotime($Date2);
  
// Use for loop to store dates into array
// 86400 sec = 24 hrs = 60*60*24 = 1 day
for ($currentDate = $Variable1; $currentDate <= $Variable2; 
                                $currentDate += (86400)) {
                                      
	$Store = date('Y-m-d', $currentDate);
	$array[] = $Store;
	
	echo $Store;
	
	$newDate = date('l', strtotime($Store));
	
	echo "  (" . $newDate . ")<br>";
}
  
// Display the dates in array format
//print_r($array);

//echo $array["1"];

?>


				</p>
				
				<p>
				<div class="w3-large w3-text-dark-maroon"><b>Time:</b></div>
				<?PHP 
					$dateTime = new DateTime($data["eventTime"], new DateTimeZone('Asia/Kuala_Lumpur')); 
					echo $dateTime->format("h:i A"); 
					
					echo " - ";
					
					$dateTime = new DateTime($data["eventTimeEnd"], new DateTimeZone('Asia/Kuala_Lumpur')); 
					echo $dateTime->format("h:i A"); 

					/* echo $data["eventTime"]; ?> - <?PHP echo $data["eventTimeEnd"]; */
				?>
				</p>
		</div>
		<div class="w3-padding-32"></div>
	</div>
</div>


<?PHP include("footer.php");?>	


 
<script>

// Toggle between showing and hiding the sidebar when clicking the menu icon
var mySidebar = document.getElementById("mySidebar");

function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
  } else {
    mySidebar.style.display = 'block';
  }
}

// Close the sidebar with the close button
function w3_close() {
    mySidebar.style.display = "none";
}
</script>

</body>
</html>