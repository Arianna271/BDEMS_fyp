<?PHP
session_start();

include("database.php");
if( !verifyMD($con) ) 
{
	header( "Location: index.php" );
	return false;
}
?>
<?PHP
$act 			= (isset($_REQUEST['act'])) ? trim($_REQUEST['act']) : '';	
$historyID		= (isset($_REQUEST['historyID'])) ? trim($_REQUEST['historyID']) : '';

$donorID			= (isset($_POST['donorID'])) ? trim($_POST['donorID']) : '';
$eventID			= (isset($_POST['eventID'])) ? trim($_POST['eventID']) : '';
$participationDate	= (isset($_POST['participationDate'])) ? trim($_POST['participationDate']) : '';
$bloodSeriesNo		= (isset($_POST['bloodSeriesNo'])) ? trim($_POST['bloodSeriesNo']) : '';
$amount				= (isset($_POST['amount'])) ? trim($_POST['amount']) : '';
$verificationStatus	= (isset($_POST['verificationStatus'])) ? trim($_POST['verificationStatus']) : '';
$verifierID 		= $_SESSION["professionalID"];

$bloodSeriesNo		=	mysqli_real_escape_string($con, $bloodSeriesNo);

$success = "";

if($act == "add")
{	
	$SQL_insert = " 
	INSERT INTO `donoreventhistory`(`historyID`, `donorID`, `eventID`, `participationDate`, `bloodSeriesNo`, `amount`, `verificationStatus`, `verifierID`) 
							VALUES (NULL, '$donorID', '$eventID', '$participationDate', '$bloodSeriesNo', '$amount', '$verificationStatus', '$verifierID') ";
										
	$result = mysqli_query($con, $SQL_insert);
	
	$success = "Successfully Added";
	
	//print "<script>self.location='m-event-history.php';</script>";
	
	//semak brp total donation dan update badge
	$tot_donor 	= numRows($con, "SELECT * FROM `donoreventhistory` WHERE `donorID` = '$donorID' ");
	
	if($tot_donor == 1) $badgeID = 1;
	if($tot_donor == 2) $badgeID = 2;
	if($tot_donor == 6) $badgeID = 3;
	if($tot_donor == 11) $badgeID = 4;
	if($tot_donor == 16) $badgeID = 5;
	if($tot_donor == 21) $badgeID = 6;
	if($tot_donor == 31) $badgeID = 7;
	if($tot_donor == 41) $badgeID = 8;
	if($tot_donor == 50) $badgeID = 9;
	
	if(
		($tot_donor == 1) OR ($tot_donor == 2) OR
		($tot_donor == 6) OR ($tot_donor == 11) OR
		($tot_donor == 16) OR ($tot_donor == 21) OR
		($tot_donor == 31) OR ($tot_donor == 41) OR
		($tot_donor == 50) ) 
	{
	$SQL_insert_award = " 
		INSERT INTO `donorbadge`(`id`, `donorID`, `badgeID`, `awardedDate`, `eventID`) 
				VALUES (NULL,'$donorID','$badgeID', NOW(),'$eventID') ";
											
		$result = mysqli_query($con, $SQL_insert_award);	
	}
}

if($act == "edit")
{	
	$SQL_insert = " 
	UPDATE
		`donoreventhistory`
	SET
		`donorID` = '$donorID',
		`eventID` = '$eventID',
		`participationDate` = '$participationDate',
		`bloodSeriesNo` = '$bloodSeriesNo',
		`amount` = '$amount',
		`verificationStatus` = '$verificationStatus',
		`verifierID` = '$verifierID'
	WHERE
		`historyID` = '$historyID'
	";
										
	$result = mysqli_query($con, $SQL_insert);
	
	$success = "Successfully Updated";
	
	//print "<script>self.location='m-event-history.php';</script>";
}

if($act == "del")
{
	$SQL_delete = " DELETE FROM `donoreventhistory` WHERE `historyID` =  '$historyID' ";
	$result = mysqli_query($con, $SQL_delete);
	
	print "<script>self.location='m-event-history.php';</script>";
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
	<a href="m-main.php" class="w3-white w3-bar-item w3-large"><img src="images/logo.png" class="w3-padding" style="width:100%;"></a>
	<a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" 
	class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>

	<a href="m-main.php" class="w3-padding-16 w3-bar-item w3-button ">
	<i class="fa fa-fw fa-home"></i>&nbsp; Home</a>
	
	<a href="m-donor.php" class="w3-padding-16 w3-bar-item w3-button  ">
	<i class="fa fa-fw fa-users"></i>&nbsp; Donor</a>
	
	<a href="m-event.php" class="w3-padding-16 w3-bar-item w3-button  ">
	<i class="fa fa-fw fa-map-marker-alt"></i>&nbsp; Event List</a>
	
	<a href="m-eventorganiser.php" class="w3-padding-16 w3-bar-item w3-button  ">
	<i class="fa fa-fw fa-user"></i>&nbsp; Organiser Request</a>
	
	<a href="m-event-history.php" class="w3-padding-16 w3-bar-item w3-button w3-dark-maroon">
	<i class="fa fa-fw fa-tint"></i>&nbsp; Donor Event History</a>	
	
	<div class="w3-bar-item w3-bottom w3-small w3-text-white">ver1.0</div>
</nav>

<!-- Overlay effect when opening the side navigation on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="Close Sidemenu" id="myOverlay"></div>

<!-- Page content -->
<div class="w3-main" style="margin-left:250px;">

<div class="w3-white w3-bar w3-card ">
	<i class="fa fa-bars w3-buttonx w3-white w3-hide-large w3-xlarge w3-margin-left w3-margin-top" onclick="w3_open()"></i>

	<div class="w3-large w3-buttonx w3-bar-item w3-right w3-white w3-dropdown-hover">
      <button class="w3-button"><i class="fa fa-fw fa-user-circle fa-lg"></i> <?PHP echo $_SESSION["username"]; ?> <i class="fa fa-fw fa-chevron-down w3-small"></i></button>
      <div class="w3-dropdown-content w3-bar-block w3-round-xlarge w3-border w3-border-red">
        <a href="m-profile.php" class="w3-bar-item w3-button w3-hover-maroon w3-round-xlarge"><i class="fa fa-fw fa-user-cog "></i> Profile</a>
        <a href="logout.php" class="w3-bar-item w3-button w3-hover-maroon w3-round-xlarge"><i class="fa fa-fw fa-sign-out-alt "></i> Signout</a>
      </div>
    </div>
</div>


<div class="w3-padding-16"></div>

<div class="w3-container w3-content w3-xxlarge " style="max-width:1400px;"> List of Donor Event History</div>

	
<div class="w3-container">

	<!-- Page Container -->
	<div class="w3-container w3-content w3-white w3-card w3-padding-16 w3-round" style="max-width:1400px;">    
	  <!-- The Grid -->
	  <div class="w3-row w3-white w3-padding">
	  
		<a onclick="document.getElementById('add01').style.display='block'; " class=" w3-right w3-button w3-red w3-margin-bottom w3-round "><i class="fa fa-fw fa-lg fa-plus"></i> Add Donor</a>
	  
		<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
			<tr>
				<th>#</th>
				<th>Donor ID</th>
				<th>Event ID</th>
				<th>Participation Date</th>
				<th>Blood Series No</th>
				<th>Blood Amount (mL)</th>
				<th>Verification Status</th>
				<th>Verifier By</th>
				<th>Action</th>
			</tr>
			</thead>
			<?PHP
			$bil = 0;
			$SQL_list = "SELECT * FROM `donoreventhistory` ";
			$result = mysqli_query($con, $SQL_list) ;
			while ( $data	= mysqli_fetch_array($result) )
			{
				$bil++;
				$historyID	= $data["historyID"];
			?>			
			<tr>
				<td><?PHP echo $bil ;?></td>
				<td><?PHP echo $data["donorID"];?></td>
				<td><?PHP echo $data["eventID"];?></td>
				<td><?PHP echo $data["participationDate"];?></td>
				<td><?PHP echo $data["bloodSeriesNo"];?></td>
				<td><?PHP echo $data["amount"];?></td>
				<td><?PHP echo $data["verificationStatus"];?></td>
				<td><?PHP echo $data["verifierID"];?></td>
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
					Donor ID <span class="w3-text-maroon">*</span>					
					<select class="w3-select w3-border w3-round-large" name="donorID" required>
							<option value="">Select Donor</option>
						<?PHP 
						$rst = mysqli_query($con , "SELECT * FROM `donor`");
						while ($dat = mysqli_fetch_array($rst) )
						{
						?>
							<option value="<?PHP echo $dat["donorID"];?>" <?PHP if($data["donorID"] == $dat["donorID"]) echo "selected";?>><?PHP echo $dat["donorID"];?> - <?PHP echo $dat["firstName"];?></option>
						<?PHP 
						} ?>
						</select>
				</div>
				
				<div class="w3-padding">
					Event ID <span class="w3-text-maroon">*</span>					
					<select class="w3-select w3-border w3-round-large" name="eventID" required>
							<option value="">Select Event</option>
						<?PHP 
						$rst = mysqli_query($con , "SELECT * FROM `event`");
						while ($dat = mysqli_fetch_array($rst) )
						{
						?>
							<option value="<?PHP echo $dat["eventID"];?>" <?PHP if($data["eventID"] == $dat["eventID"]) echo "selected";?>><?PHP echo $dat["eventID"];?> - <?PHP echo $dat["eventName"];?></option>
						<?PHP 
						} ?>
						</select>
				</div>
				
				<div class="w3-padding">
					Participation Date <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="date" name="participationDate" value="<?PHP echo $data["participationDate"];?>" required>
				</div>

				<div class="w3-padding">
					Blood Series No <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="bloodSeriesNo" value="<?PHP echo $data["bloodSeriesNo"];?>" required>
				</div>
				
				<div class="w3-padding">
					Blood Amount (mL) <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="amount" value="<?PHP echo $data["amount"];?>" required>
				</div>
				
				<div class="w3-padding">
					Verification Status <span class="w3-text-maroon">*</span>					
					<select class="w3-select w3-border w3-round-large" name="verificationStatus" required>						
						<option value="Verified" <?PHP if($data["verificationStatus"] == "Verified") echo "selected";?>>Verified</option>
						<option value="Pending" <?PHP if($data["verificationStatus"] == "Pending") echo "selected";?>>Pending</option>						
					</select>
				</div>

			</div>
				
				<hr class="w3-clear">
				<input type="hidden" name="historyID" value="<?PHP echo $data["historyID"];?>" >
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
			
			<input type="hidden" name="historyID" value="<?PHP echo $data["historyID"];?>" >
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
					Donor ID <span class="w3-text-maroon">*</span>					
					<select class="w3-select w3-border w3-round-large" name="donorID" required>
							<option value="">Select Donor</option>
						<?PHP 
						$rst = mysqli_query($con , "SELECT * FROM `donor`");
						while ($dat = mysqli_fetch_array($rst) )
						{
						?>
							<option value="<?PHP echo $dat["donorID"];?>"><?PHP echo $dat["donorID"];?> - <?PHP echo $dat["firstName"];?></option>
						<?PHP 
						} ?>
						</select>
				</div>
				
				<div class="w3-padding">
					Event ID <span class="w3-text-maroon">*</span>					
					<select class="w3-select w3-border w3-round-large" name="eventID" required>
							<option value="">Select Event</option>
						<?PHP 
						$rst = mysqli_query($con , "SELECT * FROM `event`");
						while ($dat = mysqli_fetch_array($rst) )
						{
						?>
							<option value="<?PHP echo $dat["eventID"];?>"><?PHP echo $dat["eventID"];?> - <?PHP echo $dat["eventName"];?></option>
						<?PHP 
						} ?>
						</select>
				</div>
				
				<div class="w3-padding">
					Participation Date <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="date" name="participationDate" value="" required>
				</div>

				<div class="w3-padding">
					Blood Series No <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="bloodSeriesNo" value="" required>
				</div>
				
				<div class="w3-padding">
					Blood Amount (mL) <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="amount" value="" required>
				</div>
				
				<div class="w3-padding">
					Verification Status <span class="w3-text-maroon">*</span>					
					<select class="w3-select w3-border w3-round-large" name="verificationStatus" required>						
						<option value="Verified">Verified</option>
						<option value="Pending">Pending</option>						
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
