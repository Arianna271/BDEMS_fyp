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

<!-- Breadcrumb -->
<div class="w3-containerx w3-black" id="contact">
	<div class="w3-content w3-container w3-white" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large w3-text-maroon w3-padding" style="max-width:1100px">
		<a href="index.php">Home</a> / Eligibility
		</div>
	</div>
</div>		
<!-- Breadcrumb -->


<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-white" style="max-width:1400px">
		<div class="w3-content w3-container w3-large" style="max-width:1100px">	
			<div class="w3-right"><a href="event.php" class="w3-button w3-xlarge w3-round-xlarge w3-red w3-border w3-border-red  w3-hover-light-grey" >&nbsp;&nbsp; Donate Now &nbsp;&nbsp;</a></div>
			<h2><b>Basic Eligibility Requirements for Blood Donation</b></h2>
			<p align="justify">You may be wondering if you can donate blood. Donating blood is safe and easy to do, but there are a few basic requirements to donate blood. If you're in good health and meet the general eligibility blood donation requirements, then you are likely able to give blood.</p>
		</div>
	</div>
</div>	


<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-beach" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large w3-center" style="max-width:1100px">			
			<div class="w3-padding"></div>
			<div class="w3-row">
				<div class="w3-col m3 w3-padding" >
					<img src="images/eligbility1.png" class="w3-image" width="120">
					<p><b>Must be at least 18 years old</b></p>
				</div>
				<div class="w3-col m3 w3-padding" >
					<img src="images/eligbility2.png" class="w3-image" width="120">
					<p><b>Weight at least 45 kg</b></p>
				</div>
				<div class="w3-col m3 w3-padding" >
					<img src="images/eligbility3.png" class="w3-image" width="120">
					<p><b>Be in good general health</b></p>
				</div>
				<div class="w3-col m3 w3-padding" >
					<img src="images/eligbility4.png" class="w3-image" width="120">
					<p><b>Minimum sleep of 5 hours</b></p>
				</div>
			</div>
			<div class="w3-row">
				<div class="w3-col m4 w3-padding" >
					<img src="images/eligbility5.png" class="w3-image" width="120">
					<p><b>Eat within 2 hours ahead of your donation</b></p>
				</div>
				<div class="w3-col m4 w3-padding" >
					<img src="images/eligbility6.png" class="w3-image" width="120">
					<p><b>Drink plenty of non-alcoholic liquids</b></p>
				</div>
				<div class="w3-col m4 w3-padding" >
					<img src="images/eligbility7.png" class="w3-image" width="120">
					<p><b>Wait twelve weeks between blood donations</b></p>
				</div>
			</div>
		</div>
		<div class="w3-padding-16"></div>
	</div>
</div>		

<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-white" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large" style="max-width:1100px">			
			<div class="w3-padding-16"></div>
			<h3 class="w3-text-dark-maroon"><b>Why are there requirements to donate blood?</b></h3>
			<p align="justify">Eligibility requirements are important to help ensure the safety of both the blood donor and blood recipient. The Health Informatics Standards of Health, Malaysia has established blood donation requirements to keep the blood supply safe from bloodborne diseases and also keep patients safe from anything in a donor's blood that could harm them. These blood donation requirements also protect donors by making sure they are physically able to safely done.</p>
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