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
$eventID	= (isset($_POST['eventID'])) ? trim($_POST['eventID']) : '';

$tot_found 	= numRows($con, "SELECT * FROM `donoreventhistory`,`donor` WHERE donoreventhistory.donorID = donor.donorID AND `eventID` = '$eventID' ");
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
	
	<a href="a-event.php" class="w3-padding-16 w3-bar-item w3-button  ">
	<i class="fa fa-fw fa-map-marker-alt"></i>&nbsp; Event</a>
	
	<a href="a-event-history.php" class="w3-padding-16 w3-bar-item w3-button  ">
	<i class="fa fa-fw fa-tint"></i>&nbsp; Donor Event History</a>
	
	<a href="a-badge.php" class="w3-padding-16 w3-bar-item w3-button ">
	<i class="fa fa-fw fa-award"></i>&nbsp; Badge</a>
	
	<a href="a-report.php" class="w3-padding-16 w3-bar-item w3-button w3-dark-maroon">
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

<div class="w3-container w3-content w3-xxlarge " style="max-width:1400px;"> Generate Report</div>

	
<div class="w3-container">

	<!-- Page Container -->
	<div class="w3-container w3-content w3-white w3-card w3-padding-16 w3-round" style="max-width:1400px;">    
	  <!-- The Grid -->
	  <div class="w3-row w3-white w3-padding">
	  
		<form action="" method="post" >
			<div class="w3-row w3-padding-16 w3-border w3-round w3-padding">
				<div class="w3-col m4 w3-margin-right">
					<select class="w3-select w3-border w3-round-large w3-padding w3-padding-small" name="eventID" required>
						<option value="">Select Event</option>
						<?PHP 
						$rst = mysqli_query($con , "SELECT * FROM `event`");
						while ($dat = mysqli_fetch_array($rst) )
						{
						?>
						<option value="<?PHP echo $dat["eventID"];?>" <?PHP if($eventID ==  $dat["eventID"]) echo "selected";?>><?PHP echo $dat["eventID"];?> - <?PHP echo $dat["eventName"];?></option>
						<?PHP 
						} ?>
					</select>			
				</div>

				<div class="w3-col m2">
					<button type="submit" class="w3-button w3-maroon w3-round-large">Generate &nbsp;<i class="fa fa-fw fa-search"></i></button>
				</div>
				
				<div class="w3-right">
				<a target="_blank" href="a-report-csv.php?eventID=<?PHP echo $eventID;?>" class="<?PHP if($tot_found == 0) echo "w3-disabled";?> w3-button w3-black w3-round-large">CSV &nbsp;<i class="fas fa-file-csv fa-lg"></i></button></a>
				</div>
			</div>
		</form>
		
		<div class="w3-padding-16"></div>
	  
		<div class="table-responsive">
		<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead>
			<tr>
				<th>#</th>
				<th>Donor ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Participation Date</th>
				<th>Blood Series No</th>
				<th>Blood Amount (mL)</th>
			</tr>
			</thead>
			<?PHP
			$bil = 0;
			$SQL_list = "SELECT * FROM `donoreventhistory`,`donor` WHERE donoreventhistory.donorID = donor.donorID AND `eventID` = '$eventID' ";
			$result = mysqli_query($con, $SQL_list) ;
			while ( $data	= mysqli_fetch_array($result) )
			{
				$bil++;
			?>			
			<tr>
				<td><?PHP echo $bil ;?></td>
				<td><?PHP echo $data["donorID"];?></td>
				<td><?PHP echo $data["firstName"];?></td>
				<td><?PHP echo $data["lastName"];?></td>
				<td><?PHP echo $data["participationDate"];?></td>
				<td><?PHP echo $data["bloodSeriesNo"];?></td>
				<td><?PHP echo $data["amount"];?></td>
			</tr>	
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
