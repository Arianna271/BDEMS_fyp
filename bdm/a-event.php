<?PHP
session_start();

include("database.php");
if( !verifyAdmin($con) ) 
{
	header( "Location: index.php" );
	return false;
}
?>
<?PHP
$act 			= (isset($_REQUEST['act'])) ? trim($_REQUEST['act']) : '';	
$eventID		= (isset($_REQUEST['eventID'])) ? trim($_REQUEST['eventID']) : '';

$organiserID	= (isset($_POST['organiserID'])) ? trim($_POST['organiserID']) : '';
$eventName		= (isset($_POST['eventName'])) ? trim($_POST['eventName']) : '';
$eventDate		= (isset($_POST['eventDate'])) ? trim($_POST['eventDate']) : '';
$eventDateEnd	= (isset($_POST['eventDateEnd'])) ? trim($_POST['eventDateEnd']) : '';
$eventTime		= (isset($_POST['eventTime'])) ? trim($_POST['eventTime']) : '';
$eventTimeEnd	= (isset($_POST['eventTimeEnd'])) ? trim($_POST['eventTimeEnd']) : '';
$eventAddress	= (isset($_POST['eventAddress'])) ? trim($_POST['eventAddress']) : '';
$approveBy		= (isset($_POST['approveBy'])) ? trim($_POST['approveBy']) : '';

$eventName		=	mysqli_real_escape_string($con, $eventName);
$eventAddress	=	mysqli_real_escape_string($con, $eventAddress);

$success = "";

$requestID = $donorList = "";

$error = "";

if($act == "add")
{	
	if($eventDateEnd < $eventDate){
		$error ="Invalid Date";
		print "<script>alert('$error');</script>";
	}
}

if(($act == "add") && (!$error))
{	
	$max = numRows($con, "SELECT * FROM `event` ") + 1;
	$eventID = "E" . str_pad($max,4,"0",STR_PAD_LEFT);
	
	$SQL_insert = " 
	INSERT INTO `event`(`eventID`, `organiserID`, `requestID`, `donorList`, `approveBy`, `eventName`, `eventDate`, `eventDateEnd`, `eventTime`, `eventTimeEnd`, `eventAddress`,  `eventAttendees`, `approvalStatus`) 
			VALUES ('$eventID','$organiserID', '$requestID', '$donorList', '$approveBy', '$eventName', '$eventDate', '$eventDateEnd', '$eventTime', '$eventTimeEnd', '$eventAddress',  0, 'Approved') ";
										
	$result = mysqli_query($con, $SQL_insert);
	
	$success = "Successfully Added";
	
	//print "<script>self.location='a-event.php';</script>";
}

if($act == "edit")
{	
	$SQL_insert = " 
	UPDATE
		`event`
	SET
		`organiserID` = '$organiserID',
		`eventName` = '$eventName',
		`eventDate` = '$eventDate',
		`eventDateEnd` = '$eventDateEnd',
		`eventTime` = '$eventTime',
		`eventTimeEnd` = '$eventTimeEnd',
		`eventAddress` = '$eventAddress',
		`approveBy` = '$approveBy'
	WHERE
		`eventID` = '$eventID'
	";
										
	$result = mysqli_query($con, $SQL_insert);
	
	$success = "Successfully Updated";
	
	//print "<script>self.location='a-event.php';</script>";
}

if($act == "del")
{
	$SQL_delete = " DELETE FROM `event` WHERE `eventID` =  '$eventID' ";
	$result = mysqli_query($con, $SQL_delete);
	
	print "<script>self.location='a-event.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>BLOOD DONATION MANAGEMENT</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="w3.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link href="css/table.css" rel="stylesheet" />
<link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />

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
</head>
<body class="">

<!-- Side Navigation -->
<nav class="w3-large w3-sidebar w3-bar-block w3-collapse w3-maroon w3-card" style="z-index:3;width:250px;" id="mySidebar">
	<a href="a-main.php" class="w3-white w3-bar-item w3-large"><img src="images/logo.png" class="w3-padding" style="width:100%;"></a>
	<a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" 
	class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>

	<a href="a-main.php" class="w3-padding-16 w3-bar-item w3-button">
	<i class="fa fa-fw fa-home"></i>&nbsp; Home</a>

	<a href="a-donor.php" class="w3-padding-16 w3-bar-item w3-button">
	<i class="fa fa-fw fa-users"></i>&nbsp; Donor</a>

	<a href="a-med-pro.php" class="w3-padding-16 w3-bar-item w3-button">
	<i class="fa fa-fw fa-user-md"></i>&nbsp; Medical Professional</a>
	
	<a href="a-eventorganiser.php" class="w3-padding-16 w3-bar-item w3-button ">
	<i class="fa fa-fw fa-user"></i>&nbsp; Event Organiser</a>
	
	<a href="a-event.php" class="w3-padding-16 w3-bar-item w3-button w3-dark-maroon">
	<i class="fa fa-fw fa-map-marker-alt"></i>&nbsp; Event</a>
	
	<a href="a-event-history.php" class="w3-padding-16 w3-bar-item w3-button  ">
	<i class="fa fa-fw fa-tint"></i>&nbsp; Donor Event History</a>
	
	<a href="a-badge.php" class="w3-padding-16 w3-bar-item w3-button  ">
	<i class="fa fa-fw fa-award"></i>&nbsp; Badge</a>
	
	<a href="a-report.php" class="w3-padding-16 w3-bar-item w3-button  ">
	<i class="fa fa-fw fa-file-alt"></i>&nbsp; Generate Report</a>
	
	<div class="w3-bar-item w3-bottom w3-small w3-text-white">ver1.0</div>
</nav>

<!-- Overlay effect when opening the side navigation on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>

<!-- Page content -->
<div class="w3-main" style="margin-left:250px;">

<div class="w3-white w3-bar w3-card ">
	<i class="fa fa-bars w3-buttonx w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>

	<div class="w3-large w3-buttonx w3-bar-item w3-right w3-white w3-dropdown-hover">
      <button class="w3-button"><i class="fa fa-fw fa-user-circle fa-lg"></i> Administrator <i class="fa fa-fw fa-chevron-down w3-small"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-round-xlarge w3-border w3-border-red">
        <a href="a-profile.php" class="w3-bar-item w3-button w3-hover-maroon w3-round-xlarge"><i class="fa fa-fw fa-user-cog "></i> Profile</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-hover-maroon w3-round-xlarge"><i class="fa fa-fw fa-sign-out-alt "></i> Signout</a>
      </div>
    </div>
</div>


<div class="w3-padding-16"></div>

<div class="w3-container w3-content w3-xxlarge " style="max-width:1600px;"> List of Events</div>

	
<div class="w3-container">

	<!-- Page Container -->
	<div class="w3-container w3-content w3-white w3-card w3-padding-16 w3-round" style="max-width:1600px;">    
	  <!-- The Grid -->
	  <div class="w3-row w3-white w3-padding">
	  
		<a onclick="document.getElementById('add01').style.display='block'; " class=" w3-right w3-button w3-red w3-margin-bottom w3-round "><i class="fa fa-fw fa-lg fa-plus"></i> Add New</a>
	  
		<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
			<tr>
				<th>#</th>
				<th>Event ID</th>
				<th>Organiser ID</th>
				<th>Event Name</th>
				<th>Event Date</th>
				<th>Event Time</th>
				<th>Event Address</th>
				<th>Approved By</th>
				<th>Action</th>
			</tr>
			</thead>
			<?PHP
			$bil = 0;
			$SQL_list = "SELECT * FROM `event`,`medicalprofessional` WHERE  event.approveBy = medicalprofessional.professionalID";
			$result = mysqli_query($con, $SQL_list) ;
			while ( $data	= mysqli_fetch_array($result) )
			{
				$bil++;
				$eventID	= $data["eventID"];
			?>			
			<tr>
				<td><?PHP echo $bil ;?></td>
				<td><?PHP echo $data["eventID"];?></td>
				<td><?PHP echo $data["organiserID"];?></td>
				<td><?PHP echo $data["eventName"];?></td>
				<td><?PHP echo $data["eventDate"] . " - " . $data["eventDateEnd"];?></td>
				<td><?PHP echo $data["eventTime"] . " - " . $data["eventTimeEnd"];?></td>
				<td><?PHP echo $data["eventAddress"];?></td>
				<td><?PHP echo $data["firstName"];?></td>
				<td>
				<a href="#" onclick="document.getElementById('idEdit<?PHP echo $bil;?>').style.display='block'" class="w3-hover-text-indigo"><i class="fas fa-edit"></i></a>			
				<a href="#" onclick="document.getElementById('idDelete<?PHP echo $bil;?>').style.display='block'" class="w3-padding w3-text-red w3-hover-text-indigo"><i class="fas fa-trash-alt"></i></a>
				</td>
			</tr>	
<div id="idEdit<?PHP echo $bil; ?>" class="w3-modal" style="z-index:10;">
	<div class="w3-modal-content w3-round-large w3-card-4 w3-animate-zoom" style="max-width:600px">
		<header class="w3-container "> 
			<span onclick="document.getElementById('idEdit<?PHP echo $bil; ?>').style.display='none'" 
			class="w3-button w3-large w3-circle w3-display-topright "><i class="fa fa-fw fa-times"></i></span>
		</header>

		<div class="w3-container w3-padding w3-margin">
		
		<form action="" method="post" enctype="multipart/form-data" >
			<div class="w3-padding"></div>
			<b class="w3-large">Update </b>
			<hr>
			<div class="w3-row">
				<div class="w3-padding">
					Organiser ID <span class="w3-text-maroon">*</span>					
					<select class="w3-select w3-border w3-round-large" name="organiserID" required>
							<option value="">Select Organiser</option>
						<?PHP 
						$rst = mysqli_query($con , "SELECT * FROM `eventorganiser`");
						while ($dat = mysqli_fetch_array($rst) )
						{
						?>
							<option value="<?PHP echo $dat["organiserID"];?>" <?PHP if($data["organiserID"] == $dat["organiserID"]) echo "selected";?>><?PHP echo $dat["organiserID"];?> - <?PHP echo $dat["organiserName"];?></option>
						<?PHP 
						} ?>
					</select>
				</div>
				
				<div class="w3-padding">
					Event Name <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="eventName" value="<?PHP echo $data["eventName"];?>" required>
				</div>

				<div class="w3-padding">
					Event Date <span class="w3-text-maroon">*</span>
					<div class="w3-row">
						<div class="w3-col m5">
							<input class="w3-input w3-border w3-round-large" type="date" name="eventDate" value="<?PHP echo $data["eventDate"];?>" required>
						</div>
						<div class="w3-col m2 w3-center w3-padding"><i class="fas fa-long-arrow-alt-right fa-lg"></i>
						</div>
						<div class="w3-col m5">
							<input class="w3-input w3-border w3-round-large" type="date" name="eventDateEnd" value="<?PHP echo $data["eventDateEnd"];?>" required>
						</div>
					</div>
				</div>
				
				<div class="w3-padding">
					Event Time <span class="w3-text-maroon">*</span>
					<div class="w3-row">
						<div class="w3-col m5">
							<input class="w3-input w3-border w3-round-large" type="time" name="eventTime" value="<?PHP echo $data["eventTime"];?>" required>
						</div>
						<div class="w3-col m2 w3-center w3-padding"><i class="fas fa-long-arrow-alt-right fa-lg"></i>
						</div>
						<div class="w3-col m5">
							<input class="w3-input w3-border w3-round-large" type="time" name="eventTimeEnd" value="<?PHP echo $data["eventTimeEnd"];?>" required>
						</div>
					</div>
				</div>
				
				<div class="w3-padding">
					Event Address <span class="w3-text-maroon">*</span>
					<textarea class="w3-input w3-border w3-round" name="eventAddress" required><?PHP echo $data["eventAddress"]; ?></textarea>
				</div>
				
				<div class="w3-padding">
					Approved By <span class="w3-text-maroon">*</span>					
					<select class="w3-select w3-border w3-round-large" name="approveBy" required>
							<option value="">Select Medical Professional</option>
						<?PHP 
						$rst = mysqli_query($con , "SELECT * FROM `medicalprofessional`");
						while ($dat = mysqli_fetch_array($rst) )
						{
						?>
							<option value="<?PHP echo $dat["professionalID"];?>" <?PHP if($data["approveBy"] == $dat["professionalID"]) echo "selected";?>><?PHP echo $dat["professionalID"];?> - <?PHP echo $dat["firstName"];?></option>
						<?PHP 
						} ?>
					</select>
				</div>

			</div>
				
				<hr class="w3-clear">
				<input type="hidden" name="eventID" value="<?PHP echo $data["eventID"];?>" >
				<input type="hidden" name="act" value="edit" >
				<div class="w3-center">
					<button type="submit" class="w3-button w3-maroon w3-margin-bottom w3-round-large">Update</button>
					<button onclick="document.getElementById('idEdit<?PHP echo $bil; ?>').style.display='none'"  class="w3-button w3-border w3-border-red w3-text-red w3-margin-bottom w3-round-large">Cancel</button>
				</div>
		</form>
		</div>
	</div>
</div>

<div id="idDelete<?PHP echo $bil; ?>" class="w3-modal" style="z-index:10;">
	<div class="w3-modal-content w3-round-large w3-card-4 w3-animate-zoom" style="max-width:500px">
      <header class="w3-container w3-red w3-round-largex" style="border-radius:8px 8px 0px 0px;"> 
        <span onclick="document.getElementById('idDelete<?PHP echo $bil; ?>').style.display='none'" 
        class="w3-button w3-large w3-circle w3-display-topright "><i class="fa fa-fw fa-times"></i></span>
		<div class="w3-large w3-padding-16">Permanently Delete This Row?</div>
      </header>

		<div class="w3-container w3-padding">
		<form action="" method="post" >
			<div class="w3-padding-32 w3-center">
				<i class="fas fa-fw fa-exclamation-triangle w3-text-red"></i> Please click delete to confirm deletion.
			</div>
			
			<input type="hidden" name="eventID" value="<?PHP echo $data["eventID"];?>" >
			<input type="hidden" name="act" value="del" >
			<div class="w3-right">
				<button type="submit" class="w3-round-xlarge w3-button w3-margin-bottom w3-red">Delete</button>
				<button type="button" class="w3-round-xlarge w3-button w3-margin-bottom w3-border w3-text-red w3-border-red" onclick="document.getElementById('idDelete<?PHP echo $bil; ?>').style.display='none'"  >Cancel</button>
			</div>
		</form>
		</div>
	</div>
</div>	
			<?PHP } ?>
		</table>
		</div>

		
	  <!-- End Grid -->
	  </div>
	  
	<!-- End Page Container -->
	</div>
	
	
	

</div>
<!-- container end -->
	

<div class="w3-padding-24"></div>

     
</div>

<div id="add01" class="w3-modal" >
    <div class="w3-modal-content w3-round-large w3-card-4 w3-animate-zoom" style="max-width:600px">
      <header class="w3-container "> 
        <span onclick="document.getElementById('add01').style.display='none'" 
        class="w3-button w3-large w3-circle w3-display-topright "><i class="fa fa-fw fa-times"></i></span>
      </header>
	  
      <div class="w3-container w3-padding">
		
		<form action="" method="post">
			<div class="w3-padding"></div>
			<b class="w3-large">Add New</b>
			<hr>
			  
			<div class="w3-row">
				<div class="w3-padding">
					Organiser ID <span class="w3-text-maroon">*</span>					
					<select class="w3-select w3-border w3-round-large" name="organiserID" required>
							<option value="">Select Organiser</option>
						<?PHP 
						$rst = mysqli_query($con , "SELECT * FROM `eventorganiser`");
						while ($dat = mysqli_fetch_array($rst) )
						{
						?>
							<option value="<?PHP echo $dat["organiserID"];?>"><?PHP echo $dat["organiserID"];?> - <?PHP echo $dat["organiserName"];?></option>
						<?PHP 
						} ?>
						</select>
				</div>
				
				<div class="w3-padding">
					Event Name <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="eventName" value="" required>
				</div>

				<div class="w3-padding">
					Event Date <span class="w3-text-maroon">*</span>
					<div class="w3-row">
						<div class="w3-col m5">
							<input class="w3-input w3-border w3-round-large" type="date" name="eventDate" min="<?PHP echo date("Y-m-d");?>" value="" required>
						</div>
						<div class="w3-col m2 w3-center w3-padding"><i class="fas fa-long-arrow-alt-right fa-lg"></i>
						</div>
						<div class="w3-col m5">
							<input class="w3-input w3-border w3-round-large" type="date" name="eventDateEnd" min="<?PHP echo date("Y-m-d");?>" value="" required>
						</div>
					</div>
				</div>
				
				<div class="w3-padding">
					Event Time <span class="w3-text-maroon">*</span>
					<div class="w3-row">
						<div class="w3-col m5">
							<input class="w3-input w3-border w3-round-large" type="time" name="eventTime" value="" required>
						</div>
						<div class="w3-col m2 w3-center w3-padding"><i class="fas fa-long-arrow-alt-right fa-lg"></i>
						</div>
						<div class="w3-col m5">
							<input class="w3-input w3-border w3-round-large" type="time" name="eventTimeEnd" value="" required>
						</div>
					</div>
				</div>
				
				<div class="w3-padding">
					Event Address <span class="w3-text-maroon">*</span>
					<textarea class="w3-input w3-border w3-round" name="eventAddress" required></textarea>
				</div>
				
				<div class="w3-padding">
					Approved By <span class="w3-text-maroon">*</span>					
					<select class="w3-select w3-border w3-round-large" name="approveBy" required>
							<option value="">Select Medical Professional</option>
						<?PHP 
						$rst = mysqli_query($con , "SELECT * FROM `medicalprofessional`");
						while ($dat = mysqli_fetch_array($rst) )
						{
						?>
							<option value="<?PHP echo $dat["professionalID"];?>" ><?PHP echo $dat["professionalID"];?> - <?PHP echo $dat["firstName"];?></option>
						<?PHP 
						} ?>
					</select>
				</div>

			</div>
			  
			  <hr class="w3-clear">
			  
			  <div class="w3-section" >
				<input name="act" type="hidden" value="add">
				<div class="w3-center">
					<button type="submit" class="w3-button w3-maroon w3-margin-bottom w3-round-large">Create</button>
					<button onclick="document.getElementById('add01').style.display='none'"  class="w3-button w3-border w3-border-red w3-text-red w3-margin-bottom w3-round-large">Cancel</button>
				</div>
			  </div>
			</div>  
		</form> 
         
      </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="js/scripts.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<!--<script src="assets/demo/datatables-demo.js"></script>-->

<script>
$(document).ready(function() {

  
	$('#dataTable').DataTable( {
		paging: true,
		
		searching: true
	} );
		
	
});
</script>


<script>
var openInbox = document.getElementById("myBtn");
openInbox.click();

function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

function myFunc(id) {
  var x = document.getElementById(id);
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show"; 
    x.previousElementSibling.className += " w3-pale-red";
  } else { 
    x.className = x.className.replace(" w3-show", "");
    x.previousElementSibling.className = 
    x.previousElementSibling.className.replace(" w3-red", "");
  }
}

</script>

</body>
</html> 
