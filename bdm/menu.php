<?PHP 
$page 	= (isset($_REQUEST['page'])) ? trim($_REQUEST['page']) : '';	
?>
<!-- Menu top -->
<div class="w3-hide-small w3-top w3-center w3-large w3-padding-32 " >
  <div class="w3-barx w3-card w3-content w3-container w3-white w3-round-xxlarge w3-padding-small" id="myNavbar" style="max-width:1100px">

    <?PHP if(isset($_SESSION["donorID"])) { ?>
	<!-- Right-sided navbar links -->
    <div class=" w3-hide-small">   
		&nbsp;<a href="main.php" class="w3-bar-item1"><img src="images/logo.png" style="height:60px"></a>
		<a href="event.php?page=event" class="w3-bar-item1 w3-button w3-padding-32 w3-hover-text-maroon w3-hover-white <?PHP if($page == "event") echo "w3-text-maroon"; ?>"><div style="width:200px"><b>Events Near You</b></div></a>
		<a href="about-blood.php?page=about-blood" class="w3-bar-item1 w3-button w3-padding-32 w3-hover-text-maroon w3-hover-white <?PHP if($page == "about-blood") echo "w3-text-maroon"; ?>"><div style="width:200px"><b>About Blood Donation</b></div></a>
		<a href="#" onclick="document.getElementById('add01').style.display='block'; " class="w3-bar-item1 w3-button w3-padding-32 w3-hover-text-maroon w3-hover-white <?PHP if($page == "search") echo "w3-text-maroon"; ?>"><div style="width:150px"><b><i class="fa fa-fw fa-search fa-lg"></i> Search</b></div></a>
		<div class="w3-dropdown-hover">
			<button class="w3-button w3-text-maroon"><i class="fa fa-fw fa-user-circle fa-2x"></i> <?PHP echo $_SESSION["username"];?> <i class="fa fa-fw fa-chevron-down w3-small"></i></button>			
			<div class="w3-dropdown-content w3-bar-block w3-center w3-round-xlarge w3-border w3-border-red" style="width:250px">
			<a href="main.php" class="w3-bar-item w3-button w3-hover-maroon w3-round-xlarge w3-text-maroon">My Profile</a>
			<hr style="margin: 0px 0 0px 0;">
			<a href="logout.php" class="w3-bar-item w3-button w3-hover-maroon w3-round-xlarge w3-text-maroon">Sign Out</a>
			</div>
		</div>  
	</div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->
	<?PHP } else { ?>
	<!-- Right-sided navbar links -->
    <div class=" w3-hide-small">   
		&nbsp;<a href="index.php" class="w3-bar-item1"><img src="images/logo.png" style="height:60px"></a>
		<a href="learn.php?page=learn" class="w3-bar-item1 w3-button w3-padding-32 w3-hover-text-maroon w3-hover-white <?PHP if($page == "learn") echo "w3-text-maroon"; ?>"><div style="width:120px"><b>Learn</b></div></a>
		<a href="eligibility.php?page=eligibility" class="w3-bar-item1 w3-button w3-padding-32 w3-hover-text-maroon w3-hover-white <?PHP if($page == "eligibility") echo "w3-text-maroon"; ?>"><div style="width:120px"><b>Eligibility</b></div></a>
		<a href="apply.php?page=apply" class="w3-bar-item1 w3-button w3-padding-32 w3-hover-text-maroon w3-hover-white <?PHP if($page == "apply") echo "w3-text-maroon"; ?>"><div style="width:200px"><b>Host A Blood Drive</b></div></a>
		
		<div class="w3-dropdown-hover">
			<button class="w3-round-xxlarge w3-button w3-maroon w3-padding w3-padding-small"><div style="width:100px"><b>Sign In</b></div></button>
			<div class="w3-dropdown-content w3-bar-block w3-center w3-round-xlarge w3-border w3-border-red" style="width:250px">
			<a href="login.php" class="w3-bar-item w3-button w3-hover-maroon w3-round-xlarge">Donor</a>
			<hr style="margin: 0px 0 0px 0;">
			<a href="m-login.php" class="w3-bar-item w3-button w3-hover-maroon w3-round-xlarge">Medical Professional</a>
			<hr style="margin: 0px 0 0px 0;">
			<a href="a-login.php" class="w3-bar-item w3-button w3-hover-maroon w3-round-xlarge">Admin</a>
			</div>
		</div>
		
		<a href="#" onclick="document.getElementById('add01').style.display='block'; " class="w3-bar-item1 w3-button w3-padding-32 w3-hover-text-maroon w3-hover-white <?PHP if($page == "search") echo "w3-text-maroon"; ?>"><div style="width:150px"><b><i class="fa fa-fw fa-search fa-lg"></i> Search</b></div></a>
	</div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->
	<?PHP } ?>
	
	

  </div>
</div>


<div class="w3-hide-large w3-top w3-center w3-large w3-padding-32 " >
  <div class="w3-barx w3-card w3-content w3-container w3-white w3-round-xxlarge w3-padding-small" id="myNavbar" style="max-width:1100px">
	<div class="w3-hide-large w3-hide-medium" style="width:100%">
		<a href="index.php" class="w3-bar-item1"><img src="images/logo.png" style="height:40px"></a>
		<a href="javascript:void(0)" class="w3-bar-item1 w3-button w3-right w3-hide-large w3-hide-medium" onclick="w3_open()">
		  <i class="fa fa-bars"></i>
		</a>
	</div>
  </div>
</div>

	
<?PHP if(isset($_SESSION["donorID"])) { ?>
<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-maroon w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
	<a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>

	<a href="event.php" onclick="w3_close()" class="w3-bar-item w3-button">Events Near You</a>
	<a href="about-blood.php" onclick="w3_close()" class="w3-bar-item w3-button">About Blood Donation</a>
	<a href="main.php" onclick="w3_close()" class="w3-bar-item w3-button">MY PROFILE</a>	
	<a href="#" onclick="document.getElementById('add01').style.display='block'; " class="w3-bar-item w3-button">SEARCH</a>
	<a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button">SIGN OUT</a>
</nav>
<!-- Menu top -->
<?PHP } else { ?>
<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="w3-sidebar w3-bar-block w3-maroon w3-card w3-animate-left w3-hide-medium w3-hide-large" style="display:none" id="mySidebar">
	<a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-large w3-padding-16">Close ×</a>

	<a href="learn.php" onclick="w3_close()" class="w3-bar-item w3-button">LEARN</a>
	<a href="eligibility.php" onclick="w3_close()" class="w3-bar-item w3-button">ELIGIBILITY</a>
	<a href="apply.php" onclick="w3_close()" class="w3-bar-item w3-button">HOST A BLOOD DRIVE</a>	
	<a href="#" onclick="document.getElementById('add01').style.display='block'; " class="w3-bar-item w3-button">SEARCH</a>
	<a href="login.php" onclick="w3_close()" class="w3-bar-item w3-button">SIGN IN (DONOR)</a>
	<a href="m-login.php" onclick="w3_close()" class="w3-bar-item w3-button">SIGN IN (MD)</a>
	<a href="a-login.php" onclick="w3_close()" class="w3-bar-item w3-button">SIGN IN (ADMIN)</a>
</nav>
<!-- Menu top -->
<?PHP } ?>


<div id="add01" class="w3-modal" >
    <div class="w3-modal-content w3-round-large w3-card-4 w3-animate-zoom" style="max-width:500px">
      <header class="w3-container "> 
        <span onclick="document.getElementById('add01').style.display='none'" 
        class="w3-button w3-large w3-circle w3-display-topright "><i class="fa fa-fw fa-times"></i></span>
      </header>
	  
      <div class="w3-container w3-padding">
		
		<form action="" method="post">
			<div class="w3-padding"></div>
			<b class="w3-large">SiteMap</b>
			<hr>
			  
			<div class="w3-row">
				<div class="w3-padding w3-center">
					<a href="learn.php?page=learn" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">What's The Process?</a>
					<a href="learn.php?page=learn" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">Learn</a>
					<a href="eligibility.php?page=eligibility" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">What requirements to donate blood</a>
					<a href="eligibility.php?page=eligibility" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">Eligibility</a>
					<a href="apply.php?page=apply" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">Host A Blood Drive</a>
					<a href="contact.php" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">Contact Us</a>
					<a href="about.php" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">About Us</a>
					<a href="learn.php?page=learn" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">Before you donate</a>
					<a href="learn.php?page=learn" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">At the blood event</a>
					<a href="learn.php?page=learn" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">After you donate</a>
					<a href="about.php" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">Our Mission</a>
					<a href="about.php" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">Our Vision</a>
					<a href="register.php" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">Register New Account</a>
					<a href="login.php" class="w3-tag w3-round-large w3-maroon w3-margin-bottom">Login Account</a>
				</div>
				<div class="w3-padding w3-center">
					<?PHP if(isset($_SESSION["donorID"])) { ?>
					<a href="main.php" class="w3-tag w3-round-large w3-dark-maroon w3-margin-bottom">My Profile</a>
					<a href="main.php" class="w3-tag w3-round-large w3-dark-maroon w3-margin-bottom">Donation History</a>
					<a href="reward.php" class="w3-tag w3-round-large w3-dark-maroon w3-margin-bottom">See Rewards</a>
					<a href="about-blood.php?page=about-blood" class="w3-tag w3-round-large w3-dark-maroon w3-margin-bottom">About Badges and Rewards</a>
					<a href="logout.php" class="w3-tag w3-round-large w3-dark-maroon w3-margin-bottom">Log Out</a>
					<?PHP } ?>
				</div>
			</div>
			  
			  <hr class="w3-clear">
			  
			  <div class="w3-sectionx" >
				<div class="w3-center">
					<button onclick="document.getElementById('add01').style.display='none'"  class="w3-button w3-border w3-border-red w3-text-red w3-margin-bottom w3-round-large">Close</button>
				</div>
			  </div>
			</div>  
		</form> 
         
      </div>

</div>