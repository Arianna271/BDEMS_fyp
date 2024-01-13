<?PHP
session_start();
?>
<?PHP
include("database.php");

$act 		= (isset($_POST['act'])) ? trim($_POST['act']) : '';
$username	= (isset($_POST['username'])) ? trim($_POST['username']) : '';
$passwordMD = (isset($_POST['passwordMD'])) ? trim($_POST['passwordMD']) : '';

$act 		= (isset($_POST['act'])) ? trim($_POST['act']) : '';

$error = "";

if($act == "login")
{	
	$SQL_login 	= " SELECT * FROM `medicalprofessional` WHERE `username` = '$username' AND `passwordMD` = '$passwordMD' ";

	$result = mysqli_query($con, $SQL_login);
	$data	= mysqli_fetch_array($result);

	$valid = mysqli_num_rows($result);

	if($valid > 0)
	{
		$_SESSION["username"] 	= $username;
		$_SESSION["passwordMD"] = $data["passwordMD"];
		$_SESSION["professionalID"] 	= $data["professionalID"];

		header("Location:m-main.php");
			
	}else{
		$error = "Invalid login or password";
		header("refresh:2;url=m-login.php");
	}
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
		<div class="w3-content w3-container w3-large" style="max-width:800px">			
			
			<?PHP if($error) { ?>
			<div class="w3-panel w3-center w3-red w3-display-container w3-animate-zoom">
				<h3>Error!</h3>
				<p><?PHP echo $error;?></p>
			</div>				
			<?PHP } ?>
			
			<div class="w3-center w3-jumbo tajuk">
				<b>Welcome Back!</b>
			</div>
			
			<div class="w3-padding"></div>
			
			<form action="" method="post" class="">
			
				<div class="w3-section" >
					Username <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="username" placeholder="" required>
				</div>
			  
				<div class="w3-section">
					Password <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large cpwdx" type="password" name="passwordMD" id="passwordMD" placeholder="" required>
					<div class="w3-padding "><input type="checkbox" onclick="myFunction()"> Show Password</div>
				</div>
			  
				<script>
				function myFunction() {
				  var x = document.getElementById("passwordMD");
				  if (x.type === "password") {
					x.type = "text";
				  } else {
					x.type = "password";
				  }
				}
				</script>
				
				<div class="w3-padding"></div>
			  
				<div class="w3-center">
					<input name="act" type="hidden" value="login">
					<button type="submit" class="w3-button w3-wide w3-block w3-margin-bottom w3-round-xlarge w3-maroon"><b>Sign In</b></button>
				</div>
				
			</form>
			
			<div class="w3-center">
			Don't have an account? <a href="m-register.php" class="w3-text-maroon">Register</a>
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