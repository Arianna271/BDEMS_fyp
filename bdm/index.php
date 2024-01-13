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
		<div class="w3-padding-48"></div>

		<div class="w3-center">
			<div class="tajuk w3-hide-small" style="font-size:80px;font-weight:700;">Save Life. Donate Blood.</div>
			<div class="tajuk w3-hide-large w3-hide-medium" style="font-size:30px;font-weight:700;">Save Life. Donate Blood.</div>

			<div class="w3-padding-32">
			  <a href="event.php" class="w3-btn w3-xlarge w3-round-xlarge w3-border w3-border-white  w3-hover-light-grey" >&nbsp;&nbsp; Donate Now &nbsp;&nbsp;</a>
			</div>
		</div>
		
		<div class="w3-padding-48"></div>

	</div>
</div>

<div class="" >

	<div class="w3-containerx w3-black" id="contact">
		<div class="w3-content w3-container w3-white" style="max-width:1400px">

			<div class="w3-content w3-container" style="max-width:1200px">
			<div class="w3-row w3-padding-64" >
				
				<div class="w3-col w3-padding m4">
					<div class="w3-round-xxlarge w3-red w3-padding w3-center menu_top">
						<div class="w3-padding-48"></div>
						<div class="w3-padding-32"></div>
						<div class="tajuk" style="font-size:30px; font-weight:500"><b>See Events</b></div>
						<div class="w3-padding-32">
						  <a href="event.php" class="w3-btn w3-xlarge w3-round-xlarge w3-border w3-border-white  w3-hover-light-grey" >&nbsp;&nbsp; Donate Now &nbsp;&nbsp;</a>
						</div>	
					</div>
				</div>
				
				<div class="w3-col w3-padding m4">
					<div class="w3-round-xxlarge w3-red w3-padding w3-center menu_top">
						<div class="w3-padding-48"></div>
						<div class="w3-padding-32"></div>
						<div class="tajuk" style="font-size:30px; font-weight:500"><b>Donation Blood</b></div>
						<div class="w3-padding-32">
						  <button onclick="window.location.href='learn.php?page=learn';" class="w3-btn w3-xlarge w3-round-xlarge w3-border w3-border-white  w3-hover-light-grey" >&nbsp;&nbsp; Learn More &nbsp;&nbsp;</button>
						</div>	
					</div>
				</div>
				
				<div class="w3-col w3-padding m4">
					<div class="w3-round-xxlarge w3-red w3-padding w3-center menu_top">
						<div class="w3-padding-48"></div>
						<div class="w3-padding-32"></div>
						<div class="tajuk" style="font-size:30px; font-weight:500"><b>Are You Eligible?</b></div>
						<div class="w3-padding-32">
						  <button onclick="window.location.href='eligibility.php?page=eligibility';" class="w3-btn w3-xlarge w3-round-xlarge w3-border w3-border-white  w3-hover-light-grey" >&nbsp;&nbsp; Learn More &nbsp;&nbsp;</button>
						</div>	
					</div>
				</div>
				
			</div>
			</div>
		  
		</div>
	</div>
	
</div>

<div class="" >

	<div class="w3-black w3-container" id="contact">
		<div class="w3-content w3-container w3-beach" style="max-width:1400px">
			
			<div class="w3-padding-16"></div>
			
			<div class="w3-content w3-container" style="max-width:1200px">
			<div class="w3-row">
				
				<div class="w3-col m6">
					<div class="w3-margin">
						<div class="tajuk" style="font-size:40px; font-weight:500"><b>Find Blood Donation Event Near You</b></div>
						
						<div class="w3-padding-16"></div>
						
						<form method="post" action="event-search.php" >
							<input class="w3-border w3-center w3-border-red w3-round-xxlarge w3-padding w3-padding-16x" type="text" name="postcode" value="" placeholder="Enter Postcode"  required> 
							<button type="submit" class="w3-border w3-border-white"><i class="fa fa-fw fa-search fa-lg w3-text-red"></i></button>
						</form>
					</div>
				</div>
				
				<div class="w3-col m6">				
					<div class="w3-round-large">
						<img src="images/3rd_section.jpg" class="w3-image w3-round-xxlarge">
					</div>
				</div>
				
				
			</div>
			</div>
			
			<div class="w3-padding-16"></div>
		  
		</div>
	</div>
	
</div>


<div class="" >

	<div class=" w3-black w3-container" id="contact">
		<div class="w3-content w3-container w3-white" style="max-width:1400px">
			
			<div class="w3-padding-16"></div>
			<div class="w3-content w3-container" style="max-width:1200px">
			<div class="w3-row">
				
				<div class="w3-col m6">				
					<div class="w3-round-large">
						<img src="images/4th_section.png" class="w3-image w3-round-xxlarge">
					</div>
				</div>
				
				<div class="w3-col m6">
					<div class="w3-margin w3-medium">
						<div class="tajuk" style="font-size:30px; font-weight:700">How You Can Make A Difference?</div>
						
						<p >
						<img src="images/icon1.png" class="w3-circle w3-left w3-margin-right" width="80px">
						<div class="w3-xlarge">Give Blood</div>
						<div style="line-height: 1.3;">Regularly donate blood if you are eligible. Each donation can save up to three lives.</div>
						</p>
						
						<p class="w3-margin-left">
						<img src="images/icon2.png" class="w3-circle w3-left w3-margin-right" width="80px">
						<div class="w3-xlarge">Host A Blood Drive</div>
						<div style="line-height: 1.3;">Save even more lives by hosting a blood drive and inviting other people to donate blood.</div>
						</p>
						
						<p >
						<img src="images/icon3.png" class="w3-circle w3-left w3-margin-right" width="80px">
						<div class="w3-xlarge">Educate & Encourage Others</div>
						<div style="line-height: 1.3;">Share facts about how donated blood saves lives and improves health for many people.</div>
						</p>
						
						<div class="w3-padding-16"></div>
					</div>
				</div>
								
			</div>
			</div>
			<div class="w3-padding-16"></div>
		  
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