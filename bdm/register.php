<?PHP
session_start();
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

<script>
function validateForm() {
  let x = document.forms["myForm"]["firstName"].value;
  if (x == "") {
    alert("First Name must be filled out");
    return false;
  }
}
</script>

<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-beach" style="max-width:1400px">
		<div class="w3-padding-32"></div>
		<div class="w3-content w3-container w3-large" style="max-width:1100px">			
			
			<div class="w3-center w3-jumbo tajuk">
				<b>Create Your Account</b>
			</div>
			
			<div class="w3-padding"></div>

			<form  name="myForm" action="register2.php" method="post" class="" onsubmit="return validateForm()">
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
						IC No <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="text" name="icNo" required>
					</div>
					
					<div class="w3-col m6 w3-padding">
						Age <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="number" name="age" required>
					</div>
				</div>
				<div class="w3-row">	
					<div class="w3-col m6 w3-padding">
						Date of Birth <span class="w3-text-maroon">*</span> 
						<input class="w3-input w3-border w3-round-large" type="date" name="dateOfBirth" >
					</div>
					
					<div class="w3-col m6 w3-padding">
						Gender <span class="w3-text-maroon">*</span>
						<select class="w3-input w3-select w3-border w3-round-large" name="gender" required>
							<option value="">Select One</option>
							<option value="Female">Female</option>
							<option value="Male">Male</option>						
						</select>
					</div>
				</div>
				
				<div class="w3-padding-16"></div>

				<div class="w3-center">
					<button type="submit" class="w3-button w3-wide w3-margin-bottom w3-round-xlarge w3-maroon">&nbsp;<b>Next</b>&nbsp;</button>
				</div>
			
			</form>
			
			<div class="w3-center">
			Already registered. <a href="login.php" class="w3-text-maroon">Sign In Instead</a>
			</div>
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