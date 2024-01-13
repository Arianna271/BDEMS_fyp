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
$act 		= (isset($_REQUEST['act'])) ? trim($_REQUEST['act']) : '';	
$donorID	= (isset($_REQUEST['donorID'])) ? trim($_REQUEST['donorID']) : '';

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

$success = "";

if($act == "register")
{
	$found 	= numRows($con, "SELECT * FROM `donor` WHERE `email` = '$email' ");
	if($found) $error ="Email already registered";
	
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

if(($act == "register") && (!$error))
{	
	$max = numRows($con, "SELECT * FROM `donor` ") + 1;
	$donorID = "D" . str_pad($max,4,"0",STR_PAD_LEFT);
	
	$SQL_insert = " 	
	INSERT INTO `donor`(`donorID`, `firstName`, `lastName`, `username`, `email`, `icNo`, `age`, `dateOfBirth`, `gender`, `race`, `maritalStatus`, `occupation`, `address`, `telNo`, `bloodType`, `passwordDonor`) 
				VALUES ('$donorID','$firstName', '$lastName', '$username', '$email', '$icNo', '$age', '$dateOfBirth', '$gender', '$race', '$maritalStatus', '$occupation', '$address', '$telNo', '$bloodType', '$passwordDonor')
	";
										
	$result = mysqli_query($con, $SQL_insert);
	$success = true;
}

if($act == "edit")
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
		`donorID` = '$donorID'
	";
										
	$result = mysqli_query($con, $SQL_insert);
	
	$success = "Successfully Updated";
	
	//print "<script>self.location='a-donor.php';</script>";
}

if($act == "del")
{
	$SQL_delete = " DELETE FROM `donor` WHERE `donorID` =  '$donorID' ";
	$result = mysqli_query($con, $SQL_delete);
	
	print "<script>self.location='a-donor.php';</script>";
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

	<a href="a-donor.php" class="w3-padding-16 w3-bar-item w3-button w3-dark-maroon">
	<i class="fa fa-fw fa-users"></i>&nbsp; Donor</a>

	<a href="a-med-pro.php" class="w3-padding-16 w3-bar-item w3-button ">
	<i class="fa fa-fw fa-user-md"></i>&nbsp; Medical Professional</a>
	
	<a href="a-eventorganiser.php" class="w3-padding-16 w3-bar-item w3-button ">
	<i class="fa fa-fw fa-user"></i>&nbsp; Event Organiser</a>
	
	<a href="a-event.php" class="w3-padding-16 w3-bar-item w3-button  ">
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

<div class="w3-container w3-content w3-xxlarge " style="max-width:1600px;"> List of Donors</div>

	
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
				<th>Donor ID</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Username</th>
				<th>Password</th>
				<th>Email</th>
				<th>IC No.</th>
				<th>Age</th>
				<th>Date of Birth</th>
				<th>Gender</th>
				<th>Race</th>
				<th>Marital Status</th>
				<th>Blood Type</th>
				<th>Action</th>
			</tr>
			</thead>
			<?PHP
			$bil = 0;
			$SQL_list = "SELECT * FROM `donor` ";
			$result = mysqli_query($con, $SQL_list) ;
			while ( $data	= mysqli_fetch_array($result) )
			{
				$bil++;
				$donorID	= $data["donorID"];
			?>			
			<tr>
				<td><?PHP echo $bil ;?></td>
				<td><?PHP echo $data["donorID"];?></td>
				<td><?PHP echo $data["firstName"];?></td>
				<td><?PHP echo $data["lastName"];?></td>
				<td><?PHP echo $data["username"];?></td>
				<td><?PHP echo $data["passwordDonor"];?></td>
				<td><?PHP echo $data["email"];?></td>
				<td><?PHP echo $data["icNo"];?></td>
				<td><?PHP echo $data["age"];?></td>
				<td><?PHP echo $data["dateOfBirth"];?></td>
				<td><?PHP echo $data["gender"];?></td>
				<td><?PHP echo $data["race"];?></td>
				<td><?PHP echo $data["maritalStatus"];?></td>
				<td><?PHP echo $data["bloodType"];?></td>
				<td>
				<a href="#" onclick="document.getElementById('idEdit<?PHP echo $bil;?>').style.display='block'" class="w3-hover-text-indigo"><i class="fas fa-edit"></i></a>			
				<a href="#" onclick="document.getElementById('idDelete<?PHP echo $bil;?>').style.display='block'" class="w3-padding w3-text-red w3-hover-text-indigo"><i class="fas fa-trash-alt"></i></a>
				</td>
			</tr>	
<div id="idEdit<?PHP echo $bil; ?>" class="w3-modal" style="z-index:10;">
	<div class="w3-modal-content w3-round-large w3-card-4 w3-animate-zoom" style="max-width:800px">
		<header class="w3-container "> 
			<span onclick="document.getElementById('idEdit<?PHP echo $bil; ?>').style.display='none'" 
			class="w3-button w3-large w3-circle w3-display-topright "><i class="fa fa-fw fa-times"></i></span>
		</header>

		<div class="w3-container w3-padding w3-margin">
		
		<form action="" method="post" >
			<div class="w3-padding"></div>
			<b class="w3-large">Update </b>
			<hr>
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
					</div>
				</div>
				
				<hr class="w3-clear">
				<input type="hidden" name="donorID" value="<?PHP echo $data["donorID"];?>" >
				<input type="hidden" name="act" value="edit" >
				<div class="w3-center">
					<button type="submit" class="w3-button w3-maroon w3-margin-bottom w3-round-large">Update</button>
					<button onclick="document.getElementById('idEdit<?PHP echo $bil; ?>').style.display='none'"  class="w3-button w3-border w3-border-red w3-text-red w3-margin-bottom w3-round-large">Cancel</button>
				</div>
		</form>
		</div>
	</div>
	<div class="w3-padding-64"></div>
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
			
			<input type="hidden" name="donorID" value="<?PHP echo $data["donorID"];?>" >
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
	

<div class="w3-padding-64"></div>

     
</div>

<div id="add01" class="w3-modal" >
    <div class="w3-modal-content w3-round-large w3-card-4 w3-animate-zoom" style="max-width:800px">
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
				<div class="w3-col m6 w3-padding">
					First Name <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="firstName" value="" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
					Last Name <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="lastName" value="" required>
				</div>
					
				<div class="w3-col m6 w3-padding">
					Username <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="username" value="" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
					E-mail <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="email" name="email" value="" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
					IC No <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="text" name="icNo" value="" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
					Age <span class="w3-text-maroon">*</span>
					<input class="w3-input w3-border w3-round-large" type="number" name="age" value="" required>
				</div>
				
				<div class="w3-col m6 w3-padding">
						Date of Birth <span class="w3-text-maroon">*</span> 
						<input class="w3-input w3-border w3-round-large" type="date" name="dateOfBirth" value="" >
					</div>
					
					<div class="w3-col m6 w3-padding">
						Gender <span class="w3-text-maroon">*</span>
						<select class="w3-input w3-select w3-border w3-round-large" name="gender" required>
							<option value="">Select One</option>
							<option value="Female" >Female</option>
							<option value="Male" >Male</option>						
						</select>
					</div>
				</div>
				
				<div class="w3-col m6 w3-padding">
					Race <span class="w3-text-maroon">*</span>
					<select class="w3-input w3-select w3-border w3-round-large" name="race" required>
						<option value="">Select One</option>
						<option value="Bajau">Bajau</option>
						<option value="Bidayuh">Bidayuh</option>
						<option value="Bisaya">Bisaya</option>
						<option value="Brunei">Brunei</option>
						<option value="Bugis">Bugis</option>
						<option value="Dayak Laut">Dayak Laut</option>
						<option value="India">India</option>
						<option value="Jawa">Jawa</option>
						<option value="Kadazan/Dusun">Kadazan/Dusun</option>
						<option value="Melanau">Melanau</option>
						<option value="Melayu">Melayu</option>
						<option value="Murut">Murut</option>
						<option value="Orang Sungai">Orang Sungai</option>
						<option value="Rungus">Rungus</option>
						<option value="Sino">Sino</option>
						<option value="Suluk">Suluk</option>
					</select>
				</div>
				
				<div class="w3-col m6 w3-padding">
					Marital Status <span class="w3-text-maroon">*</span>
					<select class="w3-input w3-select w3-border w3-round-large" name="maritalStatus" required>
						<option value="">Select One</option>
						<option value="">Select One</option>
						<option value="Single">Single</option>						
						<option value="Married">Married</option>						
						<option value="Widowed">Widowed</option>						
						<option value="Divorced">Divorced</option>						
						<option value="Separated">Separated</option>
					</select>
				</div>
				
				<div class="w3-row">
					<div class="w3-col m6 w3-padding">
						Occupation <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="text" name="occupation" value="" required>
					</div>
					
					<div class="w3-col m6 w3-padding">
						Address <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="text" name="address" value="" required>
					</div>
				</div>
				<div class="w3-row">
					<div class="w3-col m6 w3-padding">
						Tel No <span class="w3-text-maroon">*</span>
						<input class="w3-input w3-border w3-round-large" type="text" name="telNo" value="" required>
					</div>
					
					<div class="w3-col m6 w3-padding">
						Blood Type <span class="w3-text-maroon">*</span>
						<select class="w3-input w3-select w3-border w3-round-large" name="bloodType" required>
							<option value="">Select One</option>
							<option value="O+">O+</option>
							<option value="O-">O-</option>
							<option value="A+">A+</option>
							<option value="A-">A-</option>
							<option value="B+">B+</option>
							<option value="B-">B-</option>
							<option value="AB+">AB+</option>
							<option value="AB-">AB-</option>
						</select>
					</div>
				</div>
				
				<div class="w3-row">	
					<div class="w3-col m6 w3-padding">
						Password <span class="w3-text-maroon">*</span> 
						<input class="w3-input w3-border w3-round-large" type="password" name="passwordDonor" value="" required>
					</div>
					
					<div class="w3-col m6 w3-padding">
						Confirm Password <span class="w3-text-maroon">*</span> 
						<input class="w3-input w3-border w3-round-large" type="password" name="repassword" >
					</div>
				</div>
			  
			  <hr class="w3-clear">
			  
			  <div class="w3-section" >
				<input name="act" type="hidden" value="register">
				<div class="w3-center">
					<button type="submit" class="w3-button w3-maroon w3-margin-bottom w3-round-large">Submit</button>
					<button onclick="document.getElementById('add01').style.display='none'"  class="w3-button w3-border w3-border-red w3-text-red w3-margin-bottom w3-round-large">Cancel</button>
				</div>
			  </div>
			</div>  
		</form> 
         
      </div>
<div class="w3-padding-64"></div>
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
