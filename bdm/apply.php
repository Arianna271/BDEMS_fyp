<?PHP
session_start();
?>
<?PHP
include("database.php");

$act 		= (isset($_POST['act'])) ? trim($_POST['act']) : '';
$firstName	= (isset($_POST['firstName'])) ? trim($_POST['firstName']) : '';
$lastName	= (isset($_POST['lastName'])) ? trim($_POST['lastName']) : '';
$organiserName	= (isset($_POST['organiserName'])) ? trim($_POST['organiserName']) : '';
$organiserType	= (isset($_POST['organiserType'])) ? trim($_POST['organiserType']) : '';
$email		= (isset($_POST['email'])) ? trim($_POST['email']) : '';
$telNo		= (isset($_POST['telNo'])) ? trim($_POST['telNo']) : '';
$address	= (isset($_POST['address'])) ? trim($_POST['address']) : '';
$city		= (isset($_POST['city'])) ? trim($_POST['city']) : '';
$state		= (isset($_POST['state'])) ? trim($_POST['state']) : '';
$zip		= (isset($_POST['zip'])) ? trim($_POST['zip']) : '';
$hasHostedBefore	= (isset($_POST['hasHostedBefore'])) ? trim($_POST['hasHostedBefore']) : '';

$firstName		=	mysqli_real_escape_string($con, $firstName);
$lastName		=	mysqli_real_escape_string($con, $lastName);
$organiserName=	mysqli_real_escape_string($con, $organiserName);

$error = "";
$success = false;

if($act == "register")
{
	$found 	= numRows($con, "SELECT * FROM `eventorganiser` WHERE `email` = '$email' ");
	if($found) $error ="Email already registered";
}

if(($act == "register") && (!$error))
{	
	$max = numRows($con, "SELECT * FROM `eventorganiser` ") + 1;
	$organiserID = "O" . str_pad($max,4,"0",STR_PAD_LEFT);
	
	$SQL_insert = " 	
	INSERT INTO `eventorganiser`(`organiserID`, `firstName`, `lastName`, `organiserName`, `organiserType`, `email`, `telNo`, `address`, `city`, `state`, `zip`, `hasHostedBefore`, `status`) 
				VALUES ('$organiserID','$firstName', '$lastName', '$organiserName', '$organiserType', '$email', '$telNo', '$address', '$city', '$state', '$zip', '$hasHostedBefore', 'Pending')";
										
	$result = mysqli_query($con, $SQL_insert);
	$success = true;
}
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

<!-- Breadcrumb -->
<div class="w3-containerx w3-black" id="contact">
	<div class="w3-content w3-container w3-white" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large w3-text-maroon w3-padding" style="max-width:1100px">
		<a href="index.php">Home</a> / Host A Blood Drive
		</div>
	</div>
</div>		
<!-- Breadcrumb -->


<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-white" style="max-width:1400px">
		<div class="w3-content w3-container w3-large" style="max-width:1100px">	
			<h2><b>Apply To Host A Blood Drive</b></h2>
			<h3 class="w3-text-dark-maroon"><b>Do you want to save lives? You're at the right place!</b></h3>
			<p align="justify">We can help you get started on your lifesaving journey as a blood drive eventorganiser, also called a blood drive coordinator. Blood drive eventorganisers help save multiples lives by encouraging others to donate blood and enabling people to donate blood where they live, work and worship, at times that are convenient for them.</p>
			<p><b>Please submit the Host a Blood Drive form below, and you will be contacted by a medical professional.</b></p>
		</div>
	</div>
</div>	


<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-beach" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large" style="max-width:1100px">			
			
			<?PHP if($error) { ?>
			<div class="w3-panel w3-center w3-red w3-display-container w3-animate-zoom">
			  <h3>Error!</h3>
			  <p><?PHP echo $error;?></p>
			</div>
			<?PHP } ?>
			
			<div class="w3-padding"></div>
			
			<?PHP if($success) { ?>
			<div class="w3-panel w3-center w3-green w3-display-container w3-animate-zoom">
			  <h3>Congratulation!</h3>
			  <p>Your registration has been successful! </p>
			</div>
			<?PHP  } else { ?>

			<form action="" method="post" class="">
			Note: <span class="w3-text-maroon">*</span> indicates a required field
			<div class="w3-padding-16"></div>
			<div class="w3-row">
				<div class="w3-col m6 w3-padding">
					First Name <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="firstName" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
					Last Name <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="lastName" required>
				</div>
			</div>
			<div class="w3-row">
				<div class="w3-col m6 w3-padding">
					Organization Name <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="organiserName" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
					Organization Type <span class="w3-text-maroon">*</span>
					<select class="w3-input w3-select w3-border w3-round-large" name="organiserType" required>
						<option value="">Select One</option>
						<option value="Business">Business</option>
						<option value="Community">Community</option>
						<option value="Education">Education</option>
						<option value="Healthcare">Healthcare</option>
						<option value="Government/NGO">Government/NGO</option>
						<option value="Other">Other</option>
					</select>
				</div>
			</div>
			<div class="w3-row">
				<div class="w3-col m6 w3-padding">
					E-mail <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="email" name="email" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
					Tel No <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="telNo" required>
				</div>
			</div>
			<div class="w3-row">
				<div class="w3-col m6 w3-padding">
					Address <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="address" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
					City <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="city" required>
				</div>
			</div>
			<div class="w3-row">	
				<div class="w3-col m6 w3-padding">
					State <span class="w3-text-maroon">*</span>
					<select class="w3-input w3-select w3-border w3-round-large" name="state" required>
						<option value="">Select One</option>
						<option value="Sabah">Sabah</option>
						<option value="Kedah">Kedah</option>
						<option value="Kelantan">Kelantan</option>
						<option value="Melaka">Melaka</option>
						<option value="Negeri Sembilan">Negeri Sembilan</option>
						<option value="Pahang">Pahang</option>
						<option value="Perak">Perak</option>
						<option value="Perlis">Perlis</option>
						<option value="Pulau Pinang">Pulau Pinang</option>
						<option value="Sarawak">Sarawak</option>
						<option value="Selangor">Selangor</option>
						<option value="Terengganu">Terengganu</option>
						<option value="Labuan">Labuan</option>
						<option value="Lain-lain">Lain-lain</option>
					</select>
				</div>
				
				<div class="w3-col m6 w3-padding">
					Zip 
					<input class="w3-input w3-border w3-round-large" type="text" name="zip" >
				</div>
			</div>
			<div class="w3-row">	
				<div class="w3-col m6 w3-padding">
					Have you or your instutition eventorganisered a blood drive with us before? <span class="w3-text-maroon">*</span>
					<select class="w3-input w3-select w3-border w3-round-large" name="hasHostedBefore" required>
						<option value="">Select One</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
			</div>
			
			<div class="w3-padding-16"></div>

			<div class="w3-center">
				<input name="act" type="hidden" value="register">
				<button type="submit" class="w3-button w3-wide w3-margin-bottom w3-round-xlarge w3-maroon">&nbsp;<b>Submit</b>&nbsp;</button>
			</div>
			
			</form>
			
			<?PHP } ?>
		</div>
		<div class="w3-padding-16"></div>
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