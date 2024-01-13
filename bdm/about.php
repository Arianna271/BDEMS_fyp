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
		<a href="index.php">Home</a> / About Us
		</div>
	</div>
</div>		
<!-- Breadcrumb -->


<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-white" style="max-width:1400px">
		<div class="w3-content w3-container w3-large" style="max-width:1100px">	
			<h2><b>About Us</b></h2>
			<p align="justify">We are the connection between donors and healthcare professionals. We are responsible for a secure system of life essentials for transfusion that is reliable, accessible and sustainable. Every day we work diligently to help save lives and restore health.</p>
			
			<h2 class="w3-text-dark-maroon"><b>Our Mission and Vision</b></h2>
			<div class="w3-padding"></div>
			
			<div class="w3-row">
				<div class="w3-col m6">
					<div class="w3-round-xlarge w3-red w3-padding w3-padding-16 w3-margin-right">
						<div class="w3-padding">
						<b class="w3-xlarge">Who we are, what we do</b>

						<h2><b>OUR MISSION</b></h2>

						To streamline the process of organizing and attending blood donation events, ensuring easy access, engagement, and transparency for all participants.
						</div>
					</div>
					<div class="w3-padding-16"></div>
					<div class="w3-round-xlarge w3-red w3-padding w3-padding-16 w3-margin-right">
						<div class="w3-padding">
						<b class="w3-xlarge">What we aspire to be</b>

						<h2><b>OUR VISION</b></h2>
						
						To create a world where every potential blodd donor ca effortlessly contribute to savine lives throught efficiently managed and accessible donation events.			
						</div>
					</div>
				</div>
				<div class="w3-col m6">
					<img src="images/about_us.jpg" class="w3-round-xlarge">
				</div>
			</div>
			
			<div class="w3-padding-16"></div>
			
		</div>
	</div>
</div>	


<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-beach" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large" style="max-width:1100px">			
			<div class="w3-padding"></div>
			<h2 class="w3-text-dark-maroon"><b>Who we are?</b></h2>
			<p align="justify">The Blood Donation Event Management System is a testament to the fusion of technology and humanitarian service. Born from the need to simplify the intricate process of organizing and participating in blood donation drives, our platform is designed to bridge the gap between donors and organizers. We're not just another digital tool; we're a catalyst for change in the realm of life-saving blood donations.</p>
			<p align="justify">Our system ensures that everyone involved from first-time donors to experienced organizers - has a seamless, intuitive experience. Through our platform, organizing a blood donation event is no longer a cumbersome task, but a straightforward, efficient process. For donors, the journey from registering interest to actually donating becomes less daunting and more engaging.</p>
			
			<div class="w3-padding"></div>
			<h2 class="w3-text-dark-maroon"><b>What we do?</b></h2>
			<p align="justify">At the core of the Blood Donation Event Management System, we facilitate and revolutionize the process of blood donation event planning and participation. Our comprehensive platform offers a suite of features tailored to meet the needs of both organizers and donors, ensuring a streamlined experience from start to finish.</p>
			<p align="justify">For organizers, we provide a robust toolkit for planning, promoting, and managing blood donation events. Whether you're hosting a local community drive or a larger-scale operation, our system helps you handle registrations, schedule appointments, and coordinate with donors effortlessly. By integrating features like geo-location-based search, we connect organizers with potential donors in their vicinity, maximizing turnout and effectiveness.</p>
			<p align="justify">For donors, our platform simplifies the donation process. From user registration to accessing educational resources, donors have everything they need at their fingertips. Our system also introduces innovative elements like gamification, not just to enhance the user experience but to inspire and motivate continued participation in this noble cause.</p>
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