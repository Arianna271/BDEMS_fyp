<?PHP
session_start();

include("database.php");
if( !verifyDonor($con) ) 
{
	header( "Location: index.php" );
	return false;
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
	<div class="w3-content w3-container w3-white" style="max-width:1400px">
		<div class="w3-content w3-container w3-large" style="max-width:1100px">	
			<div class="w3-padding-32"></div>
			
			<h2><b>About Badges and Rewards</b></h2>
			<p align="justify">At Blood Donation Event Management, we believe in recognizing and celebrating the selfless acts of our donors. Our badge system is designed to honor your commitment and dedication to saving lives through blood donation. As you continue your journey with us, you'll unlock various badges, each representative of the total number of donations you've made.</p>
			<p align="justify">Furthermore, we're proud to align our badge rewards with the incentives set forth by the Ministry of Health of Malaysia. This ensures that as you progress and earn higher-tier badges, you're also availing of benefits and incentives reflective of your generous impact. Wear your badge with pride, and know that every drop you donate makes a world of difference.</p>
		
		</div>
	</div>
</div>	


<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-white" style="max-width:1400px">
		<div class="w3-content w3-container w3-large" style="max-width:1100px">	
			<div class="w3-padding-16"></div>
			
			<?PHP
			$bil = 0;
			$SQL_list = "SELECT * FROM `badge` ";
			$result = mysqli_query($con, $SQL_list) ;
			while ( $data	= mysqli_fetch_array($result) )
			{
				$bil++;
				$badgeID	= $data["badgeID"];
			?>
			<div class="w3-beach w3-padding w3-round-xxlarge w3-padding-16">
				<div class="w3-row">
					<div class="w3-col m2 w3-center">
						<img src="<?PHP echo $data["imageUrl"];?>" width="120px">
					</div>
					<div class="w3-col m10">
					<div class="w3-xlarge"><b><?PHP echo $data["badgeName"];?></b></div>
					<li><?PHP echo $data["description"];?></li>
					<span class="w3-text-maroon"><b><?PHP echo $data["reward"];?></b></span>
					</div>
				</div>
			</div>
			<div class="w3-padding-16"></div>
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