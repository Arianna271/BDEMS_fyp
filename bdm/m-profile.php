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
$act 		= (isset($_REQUEST['act'])) ? trim($_REQUEST['act']) : '';	
$firstName	= (isset($_POST['firstName'])) ? trim($_POST['firstName']) : '';
$lastName	= (isset($_POST['lastName'])) ? trim($_POST['lastName']) : '';
$username	= (isset($_POST['username'])) ? trim($_POST['username']) : '';
$email		= (isset($_POST['email'])) ? trim($_POST['email']) : '';
$passwordMD	= (isset($_POST['passwordMD'])) ? trim($_POST['passwordMD']) : '';
$repassword	= (isset($_POST['repassword'])) ? trim($_POST['repassword']) : '';

$firstName	=	mysqli_real_escape_string($con, $firstName);
$lastName	=	mysqli_real_escape_string($con, $lastName);

$error = "";
$success = "";

if($act == "edit")
{
	// Validate password strength
	$uppercase = preg_match('@[A-Z]@', $passwordMD);
	$lowercase = preg_match('@[a-z]@', $passwordMD);
	$number    = preg_match('@[0-9]@', $passwordMD);
	$specialChars = preg_match('@[^\w]@', $passwordMD);

	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($passwordMD) < 8) {
		$error ="Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
	}
	
	if($passwordMD <> $repassword){
		$error ="Passwords not match";
	}
}

if(($act == "edit") && (!$error))
{		
	$SQL_update = " 
	UPDATE
		`medicalprofessional`
	SET
		`firstName` = '$firstName',
		`lastName` = '$lastName',
		`email` = '$email',
		`username` = '$username',
		`passwordMD` = '$passwordMD'
	WHERE
		`username`='$_SESSION[username]' 
		";
	
	$result = mysqli_query($con, $SQL_update);

	
	$success = "Successfully Update";
	//print "<script>self.location='m-profile.php';</script>";
}


$SQL_list = "SELECT * FROM `medicalprofessional` WHERE `username`='$_SESSION[username]' ";
$result = mysqli_query($con, $SQL_list) ;
$data	= mysqli_fetch_array($result);
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

<!--- Toast Notification -->
<?PHP 
if($success) { Notify("success", $success, "m-profile.php"); }
?>	

<!-- Side Navigation -->
<nav class="w3-large w3-sidebar w3-bar-block w3-collapse w3-maroon w3-card" style="z-index:3;width:250px;" id="mySidebar">
	<a href="m-main.php" class="w3-white w3-bar-item w3-large"><img src="images/logo.png" class="w3-padding" style="width:100%;"></a>
	<a href="javascript:void(0)" onclick="w3_close()" title="Close Sidemenu" 
	class="w3-bar-item w3-button w3-hide-large w3-large">Close <i class="fa fa-remove"></i></a>

	<a href="m-main.php" class="w3-padding-16 w3-bar-item w3-button">
	<i class="fa fa-fw fa-home"></i>&nbsp; Home</a>
	
	<a href="m-donor.php" class="w3-padding-16 w3-bar-item w3-button  ">
	<i class="fa fa-fw fa-users"></i>&nbsp; Donor</a>
	
	<a href="m-event.php" class="w3-padding-16 w3-bar-item w3-button  ">
	<i class="fa fa-fw fa-map-marker-alt"></i>&nbsp; Event List</a>
	
	<a href="m-eventorganiser.php" class="w3-padding-16 w3-bar-item w3-button  ">
	<i class="fa fa-fw fa-user"></i>&nbsp; Organiser Request</a>
	
	<a href="m-event-history.php" class="w3-padding-16 w3-bar-item w3-button  ">
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

<div class="w3-container w3-content w3-xxlarge " style="max-width:1000px;"> Profile</div>
	
<div class="w3-container">

	<!-- Page Container -->
	<div class="w3-container w3-white w3-content w3-card w3-padding-16" style="max-width:1000px;">    
	  <!-- The Grid -->
	  <div class="w3-row w3-padding">
		
		<?PHP if($error) { ?>
		<div class="w3-panel w3-center w3-red w3-display-container w3-animate-zoom" >
			<h3>Error!</h3>
			<p><?PHP echo $error;?></p>
		</div>
		<?PHP } ?>
			
		<form action="" method="post" >
			<div class="w3-padding">
			
			

				<div class="w3-row">
					<div class="w3-col m6 w3-padding">
						First Name <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="text" name="firstName" value="<?PHP echo $data["firstName"]; ?>" required>
					</div>
					
					<div class="w3-col m6 w3-padding">
						Last Name <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="text" name="lastName" value="<?PHP echo $data["lastName"]; ?>" required>
					</div>
				</div>
				
				<div class="w3-row">
					<div class="w3-col m6 w3-padding">
						Username <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="text" name="username" value="<?PHP echo $data["username"]; ?>" required>
					</div>
					
					<div class="w3-col m6 w3-padding">
						E-mail <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="email" name="email" value="<?PHP echo $data["email"]; ?>" required>
					</div>
				</div>
				
				<div class="w3-row">	
					<div class="w3-col m6 w3-padding">
						Password <span class="w3-text-maroon">*</span> 
						<input class="w3-input w3-border w3-round-large" type="password" name="passwordMD" value="<?PHP echo $data["passwordMD"]; ?>" required>
						<div class="w3-padding-16"></div>
						Password Must Contains:
						<ul class="w3-text-red">
							<li>Min 8 characters</li>
							<li>At least one capital letter</li>
							<li>At least one lower case letter</li>
							<li>At least one number</li>
							<li>No spaces</li>
							<li>No invalid character : %</li>
							<li>Passwords must match</li>
						</ul>
					</div>
					
					<div class="w3-col m6 w3-padding">
						Confirm Password <span class="w3-text-maroon">*</span> 
						<input class="w3-input w3-border w3-round-large" type="password" name="repassword" value="<?PHP echo $data["passwordMD"]; ?>" >
					</div>
				</div>	
			    
			<hr class="w3-clear">
			<input type="hidden" name="act" value="edit" >
			<button type="submit" class="w3-button w3-red w3-margin-bottom w3-round-large">Update</button>
			
			</div>  
		</form>
	  
		

		
	  <!-- End Grid -->
	  </div>
	  
	<!-- End Page Container -->
	</div>
	
	
	

</div>
<!-- container end -->


<div class="w3-padding-24"></div>

     
</div>

	
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
