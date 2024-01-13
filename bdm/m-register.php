<?PHP
session_start();
?>
<?PHP
include("database.php");

$act 		= (isset($_POST['act'])) ? trim($_POST['act']) : '';
$firstName	= (isset($_POST['firstName'])) ? trim($_POST['firstName']) : '';
$lastName	= (isset($_POST['lastName'])) ? trim($_POST['lastName']) : '';
$username	= (isset($_POST['username'])) ? trim($_POST['username']) : '';
$email		= (isset($_POST['email'])) ? trim($_POST['email']) : '';
$passwordMD	= (isset($_POST['passwordMD'])) ? trim($_POST['passwordMD']) : '';
$repassword	= (isset($_POST['repassword'])) ? trim($_POST['repassword']) : '';

$firstName	=	mysqli_real_escape_string($con, $firstName);
$lastName	=	mysqli_real_escape_string($con, $lastName);

$error = "";
$success = false;

if($act == "register")
{
	$found 	= numRows($con, "SELECT * FROM `medicalprofessional` WHERE `email` = '$email' ");
	if($found) $error ="Email already registered";
	
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

if(($act == "register") && (!$error))
{	
	$max = numRows($con, "SELECT * FROM `medicalprofessional` ") + 1;
	$professionalID = "MD" . str_pad($max,4,"0",STR_PAD_LEFT);
	
	$SQL_insert = " 	
	INSERT INTO `medicalprofessional`(`professionalID`, `firstName`, `lastName`, `username`, `passwordMD`, `email`) 
							VALUES ('$professionalID','$firstName','$lastName','$username','$passwordMD','$email')
	";
										
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



<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-beach" style="max-width:1400px">
		<div class="w3-padding-32"></div>
		<div class="w3-content w3-container w3-large" style="max-width:1100px">			
			
			<div class="w3-center w3-jumbo tajuk">
				<b>Create Your Account</b>
			</div>
			
			<?PHP if($error) { ?>
			<div class="w3-panel w3-center w3-red w3-display-container w3-animate-zoom" >
				<h3>Error!</h3>
				<p><?PHP echo $error;?></p>
			</div>
			<?PHP } ?>
			
			<div class="w3-padding"></div>
			
			<?PHP if($success) { ?>
			<div class="w3-padding-64"></div>
			<div class="w3-panel w3-center w3-green w3-display-container w3-animate-zoom" >
			  <h3>Congratulation!</h3>
			  <p>Your registration has been successful! </p>
			</div>
			<div class="w3-padding-64"></div>
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
						Username <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="text" name="username" required>
					</div>
					
					<div class="w3-col m6 w3-padding">
						E-mail <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="email" name="email" required>
					</div>
				</div>
				
				<div class="w3-row">	
					<div class="w3-col m6 w3-padding">
						Password <span class="w3-text-maroon">*</span> 
						<input class="w3-input w3-border w3-round-large" type="password" name="passwordMD" required>
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
						<input class="w3-input w3-border w3-round-large" type="password" name="repassword" >
					</div>
					
				</div>

				
				<div class="w3-padding-16"></div>

				<div class="w3-center">
					<input name="act" type="hidden" value="register">
					<button type="submit" class="w3-button w3-wide w3-margin-bottom w3-round-xlarge w3-maroon">&nbsp;<b>Register</b>&nbsp;</button>
				</div>
			
			</form>
			
			<?PHP } ?>
			
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