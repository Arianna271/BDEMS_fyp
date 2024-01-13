<?PHP
session_start();

include("database.php");
if( !verifyDonor($con) ) 
{
	header( "Location: index.php" );
	return false;
}
?>
<?PHP
$act 		= (isset($_REQUEST['act'])) ? trim($_REQUEST['act']) : '';	
$donorID	= $_SESSION["donorID"];

$firstName	= (isset($_POST['firstName'])) ? trim($_POST['firstName']) : '';
$lastName	= (isset($_POST['lastName'])) ? trim($_POST['lastName']) : '';
$username	= (isset($_POST['username'])) ? trim($_POST['username']) : '';
$email		= (isset($_POST['email'])) ? trim($_POST['email']) : '';
$icNo		= (isset($_POST['icNo'])) ? trim($_POST['icNo']) : '';
$age		= (isset($_POST['age'])) ? trim($_POST['age']) : '';
$dateOfBirth= (isset($_POST['dateOfBirth'])) ? trim($_POST['dateOfBirth']) : '';
$gender		= (isset($_POST['gender'])) ? trim($_POST['gender']) : '';

$race		= (isset($_POST['race'])) ? trim($_POST['race']) : '';
$maritalStatus	= (isset($_POST['maritalStatus'])) ? trim($_POST['maritalStatus']) : '';
$occupation	= (isset($_POST['occupation'])) ? trim($_POST['occupation']) : '';
$address	= (isset($_POST['address'])) ? trim($_POST['address']) : '';
$telNo		= (isset($_POST['telNo'])) ? trim($_POST['telNo']) : '';
$bloodType	= (isset($_POST['bloodType'])) ? trim($_POST['bloodType']) : '';
$passwordDonor	= (isset($_POST['passwordDonor'])) ? trim($_POST['passwordDonor']) : '';
$repassword	= (isset($_POST['repassword'])) ? trim($_POST['repassword']) : '';

$firstName	=	mysqli_real_escape_string($con, $firstName);
$lastName	=	mysqli_real_escape_string($con, $lastName);
$address	=	mysqli_real_escape_string($con, $address);

$error = "";
$success = "";

if($act == "edit")
{
	// Validate password strength
	$uppercase = preg_match('@[A-Z]@', $passwordDonor);
	$lowercase = preg_match('@[a-z]@', $passwordDonor);
	$number    = preg_match('@[0-9]@', $passwordDonor);
	$specialChars = preg_match('@[^\w]@', $passwordDonor);

	if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($passwordDonor) < 8) {
		$error ="Password should be at least 8 characters in length and should include at least one upper case letter, one number, and one special character.";
	}
	
	if($passwordDonor <> $repassword){
		$error ="Passwords not match";
	}
}


if(($act == "edit") && (!$error))
{	
	$SQL_insert = " 
	UPDATE
		`donor`
	SET
		`firstName` = '$firstName',
		`lastName` = '$lastName',
		`username` = '$username',
		`email` = '$email',
		`icNo` = '$icNo',
		`age` = '$age',
		`dateOfBirth` = '$dateOfBirth',
		`gender` = '$gender',
		`race` = '$race',
		`maritalStatus` = '$maritalStatus',
		`occupation` = '$occupation',
		`address` = '$address',
		`telNo` = '$telNo',
		`bloodType` = '$bloodType',
		`passwordDonor` = '$passwordDonor'
	WHERE
		`donorID`='$donorID'
	";
										
	$result = mysqli_query($con, $SQL_insert);
	
	$success = "Successfully Updated";
	
	//print "<script>self.location='a-donor.php';</script>";
	header("refresh:1;url=main.php");
}

$SQL_list = "SELECT * FROM `donor` WHERE `donorID`='$_SESSION[donorID]' ";
$result = mysqli_query($con, $SQL_list) ;
$data	= mysqli_fetch_array($result);

$tot_donor 	= numRows($con, "SELECT * FROM `donoreventhistory` WHERE `donorID` = '$donorID' ");

// cari badge terakhir
$SQL_badge = "SELECT max(badgeID) as currentbadge FROM `donorbadge` WHERE `donorID`='$_SESSION[donorID]' ";
$rst_badge = mysqli_query($con, $SQL_badge);
$dat_badge = mysqli_fetch_array($rst_badge);
$currentbadge = $dat_badge["currentbadge"];

function GetBadgeName($con, $badgeID)
{
	$SQL_list = "SELECT `badgeName` FROM `badge` WHERE `badgeID`= '$badgeID' ";
	$result = mysqli_query($con, $SQL_list) ;
	if(mysqli_num_rows($result) > 0) {
		$data	= mysqli_fetch_array($result);
		return $data["badgeName"];
	} else {
		return "-";
	}
}

function GetBadgeImage($con, $badgeID)
{
	$SQL_list = "SELECT `imageUrl` FROM `badge` WHERE `badgeID`= '$badgeID' ";
	$result = mysqli_query($con, $SQL_list) ;
	if(mysqli_num_rows($result) > 0) {
		$data	= mysqli_fetch_array($result);
		return $data["imageUrl"];
	} else {
		return "";
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
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large " style="max-width:1110px">			
			<div class="w3-padding"></div>
			
			
			<div class="w3-row" style="line-height: 1.5;">
				<div class="w3-col m6 w3-padding-small">
					<div class="w3-white w3-border w3-round-xxlarge " style="height:250px">
						<div class="w3-row w3-padding w3-padding-16">
							<div class="w3-col m4 w3-padding-16 w3-hide-small">
								<i class="fa fa-user-circle fa-8x w3-text-light-grey"></i>
							</div>
							<div class="w3-col m8">
								<div class="w3-xlarge"><b><?PHP echo $data["firstName"];?> <?PHP echo $data["lastName"];?></b><img src="<?PHP echo GetBadgeImage($con, $currentbadge);?>" width="60px"></div>
								<b>Username:</b> <?PHP echo $data["username"];?><br>
								<b>Donor ID:</b> <?PHP echo $data["donorID"];?><br>
								<b>Current Badge:</b> <?PHP echo GetBadgeName($con, $currentbadge); ?><br>
								<b>Total Donation:</b> <?PHP echo $tot_donor;?>
							</div>
						</div>
					</div>
				</div>
				
				<div class="w3-col m6 w3-padding-small">
					<div class="w3-white w3-border w3-round-xxlarge w3-display-container" style="height:250px">
						<h4 class="w3-text-dark-maroon w3-center"><b>Achievements</b></h4>
						
							<div class="w3-margin w3-responsive" style="height:150px">
							<table class="w3-padding w3-table w3-bordered" width="100%" cellspacing="0">
								<?PHP
								$SQL_list = "SELECT * FROM `donorbadge`,`donor`,`badge` WHERE donorbadge.donorID = donor.donorID AND donorbadge.badgeID = badge.badgeID AND donorbadge.donorID = '$donorID' ";
								$rst_donor = mysqli_query($con, $SQL_list) ;
								while ( $dat_donor	= mysqli_fetch_array($rst_donor) )
								{
								?>			
								<tr>
									<td ><img src="<?PHP echo $dat_donor["imageUrl"];?>" width="60px"></td>
									<td ><?PHP echo $dat_donor["badgeName"];?><br>
									<span class="w3-medium w3-text-maroon"><?PHP echo $dat_donor["description"];?></span>
									</td>
									<td class="w3-medium"><?PHP echo $dat_donor["awardedDate"];?></td>					
								</tr>	
								<?PHP } ?>
							</table>
							</div>
												
						<div class="w3-padding-small w3-display-bottommiddle"><a href="reward.php" class="w3-button w3-medium w3-round-xxlarge w3-maroon ">See Rewards</a></div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>		

<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-beach" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large" style="max-width:1100px">			

			
			<div class="w3-row">
				<div class="w3-white w3-border w3-round-xxlarge ">
					<h4 class="w3-text-dark-maroon w3-center"><b>Donation History</b></h4>
					
						<div class="w3-margin w3-responsive" style="height:200px">
						<table class="w3-padding w3-table w3-bordered" width="100%" cellspacing="0">
							<thead>
							<tr class="w3-text-grey" >
								<th >Date</th>
								<th >Blood Series No.</th>
								<th style="text-align: center">Amount</th>
								<th style="text-align: center">Event</th>
							</tr>
							</thead>
							<?PHP
							$SQL_list = "SELECT * FROM `donoreventhistory`,`event` WHERE  donoreventhistory.eventID = event.eventID AND donoreventhistory.donorID = '$donorID' ";
							$rst_donor = mysqli_query($con, $SQL_list) ;
							while ( $dat_donor	= mysqli_fetch_array($rst_donor) )
							{
							?>			
							<tr>
								<td ><?PHP echo $dat_donor["participationDate"];?></td>
								<td ><?PHP echo $dat_donor["bloodSeriesNo"];?></td>
								<td style="text-align: center"><?PHP echo $dat_donor["amount"];?> mL</td>
								<td><?PHP echo $dat_donor["eventName"];?></td>
							</tr>	
							<?PHP } ?>
						</table>
						</div>
					
				</div>
			</div>
			

		</div>
	</div>
</div>	


<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-beach" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large" style="max-width:1100px">			

			
			<div class="w3-row">
				<div class="w3-white w3-border w3-round-xxlarge ">
				<h4 class="w3-text-dark-maroon w3-center"><b>My Profile</b></h4>
				
		<div class="w3-container w3-padding w3-margin">
			<?PHP if($error) { ?>
			<div class="w3-panel w3-center w3-red w3-display-container w3-animate-zoom" >
				<h3>Error!</h3>
				<p><?PHP echo $error;?></p>
			</div>
			<?PHP } ?>
			
			<div class="w3-padding"></div>
			
			<?PHP if($success) { ?>
			<div class="w3-panel w3-center w3-green w3-display-container w3-animate-zoom" >
			  <h3>Congratulation!</h3>
			  <p>Your registration has been successful! </p>
			</div>
			<?PHP } ?>
		<form action="" method="post" >
			<div class="w3-row">
				<div class="w3-col m6 w3-padding">
					First Name <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="firstName" value="<?PHP echo $data["firstName"];?>" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
					Last Name <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="lastName" value="<?PHP echo $data["lastName"];?>" required>
				</div>
					
				<div class="w3-col m6 w3-padding">
					Username <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="username" value="<?PHP echo $data["username"];?>" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
					E-mail <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="email" name="email" value="<?PHP echo $data["email"];?>" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
					IC No <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="icNo" value="<?PHP echo $data["icNo"];?>" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
					Age <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="number" name="age" value="<?PHP echo $data["age"];?>" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
						Date of Birth <span class="w3-text-maroon">*</span> 
						<input class="w3-input w3-border w3-round-large" type="date" name="dateOfBirth" value="<?PHP echo $data["dateOfBirth"];?>" >
					</div>
					
					<div class="w3-col m6 w3-padding">
						Gender <span class="w3-text-maroon">*</span>
						<select class="w3-input w3-select w3-border w3-round-large" name="gender" required>
							<option value="">Select One</option>
							<option value="Female" <?PHP if($data["gender"] == "Female") echo "selected";?>>Female</option>
							<option value="Male" <?PHP if($data["gender"] == "Male") echo "selected";?>>Male</option>						
						</select>
					</div>
				</div>
				
				<div class="w3-col m6 w3-padding">
					Race <span class="w3-text-maroon">*</span>
					<select class="w3-input w3-select w3-border w3-round-large" name="race" required>
						<option value="">Select One</option>
						<option value="Bajau" <?PHP if($data["race"] == "Bajau") echo "selected";?>>Bajau</option>
						<option value="Bidayuh" <?PHP if($data["race"] == "Bidayuh") echo "selected";?>>Bidayuh</option>
						<option value="Bisaya" <?PHP if($data["race"] == "Bisaya") echo "selected";?>>Bisaya</option>
						<option value="Brunei" <?PHP if($data["race"] == "Brunei") echo "selected";?>>Brunei</option>
						<option value="Bugis" <?PHP if($data["race"] == "Bugis") echo "selected";?>>Bugis</option>
						<option value="Dayak Laut" <?PHP if($data["race"] == "Dayak Laut") echo "selected";?>>Dayak Laut</option>
						<option value="India" <?PHP if($data["race"] == "India") echo "selected";?>>India</option>
						<option value="Jawa" <?PHP if($data["race"] == "Jawa") echo "selected";?>>Jawa</option>
						<option value="Kadazan/Dusun" <?PHP if($data["race"] == "Kadazan/Dusun") echo "selected";?>>Kadazan/Dusun</option>
						<option value="Melanau" <?PHP if($data["race"] == "Melanau") echo "selected";?>>Melanau</option>
						<option value="Melayu" <?PHP if($data["race"] == "Melayu") echo "selected";?>>Melayu</option>
						<option value="Murut" <?PHP if($data["race"] == "Murut") echo "selected";?>>Murut</option>
						<option value="Orang Sungai" <?PHP if($data["race"] == "Orang Sungai") echo "selected";?>>Orang Sungai</option>
						<option value="Rungus" <?PHP if($data["race"] == "Rungus") echo "selected";?>>Rungus</option>
						<option value="Sino" <?PHP if($data["race"] == "Sino") echo "selected";?>>Sino</option>
						<option value="Suluk" <?PHP if($data["race"] == "Suluk") echo "selected";?>>Suluk</option>
					</select>
				</div>
				
				<div class="w3-col m6 w3-padding">
					Marital Status <span class="w3-text-maroon">*</span>
					<select class="w3-input w3-select w3-border w3-round-large" name="maritalStatus" required>
						<option value="">Select One</option>
						<option value="Single" <?PHP if($data["maritalStatus"] == "Single") echo "selected";?>>Single</option>						
						<option value="Married" <?PHP if($data["maritalStatus"] == "Married") echo "selected";?>>Married</option>						
						<option value="Widowed" <?PHP if($data["maritalStatus"] == "Widowed") echo "selected";?>>Widowed</option>						
						<option value="Divorced" <?PHP if($data["maritalStatus"] == "Divorced") echo "selected";?>>Divorced</option>						
						<option value="Separated" <?PHP if($data["maritalStatus"] == "Separated") echo "selected";?>>Separated</option>						
					</select>
				</div>
				
				<div class="w3-row">
					<div class="w3-col m6 w3-padding">
						Occupation <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="text" name="occupation" value="<?PHP echo $data["occupation"];?>" required>
					</div>
					
					<div class="w3-col m6 w3-padding">
						Address <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="text" name="address" value="<?PHP echo $data["address"];?>" required>
					</div>
				</div>
				<div class="w3-row">
					<div class="w3-col m6 w3-padding">
						Tel No <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="text" name="telNo" value="<?PHP echo $data["telNo"];?>" required>
					</div>
					
					<div class="w3-col m6 w3-padding">
						Blood Type <span class="w3-text-maroon">*</span>
						<select class="w3-input w3-select w3-border w3-round-large" name="bloodType" required>
							<option value="">Select One</option>
							<option value="O+" <?PHP if($data["bloodType"] == "O+") echo "selected";?>>O+</option>
							<option value="O-" <?PHP if($data["bloodType"] == "O-") echo "selected";?>>O-</option>
							<option value="A+" <?PHP if($data["bloodType"] == "A+") echo "selected";?>>A+</option>
							<option value="A-" <?PHP if($data["bloodType"] == "A-") echo "selected";?>>A-</option>
							<option value="B+" <?PHP if($data["bloodType"] == "B+") echo "selected";?>>B+</option>
							<option value="B-" <?PHP if($data["bloodType"] == "B-") echo "selected";?>>B-</option>
							<option value="AB+" <?PHP if($data["bloodType"] == "AB+") echo "selected";?>>AB+</option>
							<option value="AB-" <?PHP if($data["bloodType"] == "AB-") echo "selected";?>>AB-</option>
						</select>
					</div>
				</div>
				
				<div class="w3-row">	
					<div class="w3-col m6 w3-padding">
						Password <span class="w3-text-maroon">*</span> 
						<input class="w3-input w3-border w3-round-large" type="password" name="passwordDonor" value="<?PHP echo $data["passwordDonor"];?>" required>
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
						<input class="w3-input w3-border w3-round-large" type="password" name="repassword" value="<?PHP echo $data["passwordDonor"];?>" required>
					</div>
				</div>
				
				<hr class="w3-clear">
				<input type="hidden" name="donorID" value="<?PHP echo $data["donorID"];?>" >
				<input type="hidden" name="act" value="edit" >
				<div class="w3-center">
					<button type="submit" class="w3-button w3-maroon w3-margin-bottom w3-round-xxlarge">Save Changes</button>					
				</div>
		</form>
		</div>
		
				
				
				</div>
			</div>
			
			<div class="w3-padding-64"></div>
		</div>

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