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
		<a href="index.php">Home</a> / Learn
		</div>
	</div>
</div>		
<!-- Breadcrumb -->


<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-white" style="max-width:1400px">
		<div class="w3-content w3-container w3-large" style="max-width:1100px">	
			<div class="w3-right"><a href="event.php" class="w3-button w3-xlarge w3-round-xlarge w3-red w3-border w3-border-red  w3-hover-light-grey" >&nbsp;&nbsp; Donate Now &nbsp;&nbsp;</a></div>
			<h2><b>Learn About Blood Donation</b></h2>
			
			<p align="justify">We need blood donors from all backgrounds to give blood to meet the daily demand and ensure we have enough for hospital patients. Just one single blood donation can help up to three patients as it can be split into its different components and used in various ways to help patients recover.</p>
			<p>Whether you're giving blood for the first-time or a veteran blood donor, here, you can find everything you need to know about giving blood.</p>
		</div>
	</div>
</div>	


<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-white" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large" style="max-width:1100px">
			<img src="images/learn-intro.jpg" class="w3-image">			
		</div>
		<div class="w3-padding-32"></div>
	</div>
</div>

<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-beach" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large w3-center" style="max-width:1100px">
			<div class="tajuk" style="font-size:40px; font-weight:800">What's The Process? </div>
			<div class="w3-padding"></div>
			<div class="w3-row">
				<div class="w3-col m4 w3-text-maroon w3-large" style="font-weight:600">
					<div class="w3-tag w3-circle w3-padding-small w3-maroon w3-margin-right">&nbsp; 1 &nbsp;</div> Before you donate
				</div>
				<div class="w3-col m4 w3-text-maroon w3-large" style="font-weight:600">
					<div class="w3-tag w3-circle w3-padding-small w3-maroon w3-margin-right">&nbsp; 2 &nbsp;</div> At the blood event
				</div>
				<div class="w3-col m4 w3-text-maroon w3-large" style="font-weight:600">
					<div class="w3-tag w3-circle w3-padding-small w3-maroon w3-margin-right">&nbsp; 3 &nbsp;</div> After you donate
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
			<div class="tajuk w3-text-dark-maroon w3-center" style="font-size:40px; font-weight:800"><span class="w3-tag w3-circle w3-xlarge w3-padding-small w3-dark-maroon w3-padding-right">&nbsp; 1 &nbsp;</span> Before you donate</div>
			<div class="w3-padding-16"></div>
			<div class="w3-row">
				<div class="w3-col m6 w3-large w3-padding" >
					<div class="w3-xlarge"><i class="fas fa-fw fa-id-card w3-text-dark-maroon"></i>  <b>Get your paperwork together</b></div>

					<p align="justify">You'll need to bring some ID with you. It could be your passport, Identification Card, or your digital donor card in our Blood Donation websites.</p>
					<p align="justify">While you're at it, write down or remember any medications you're taking so you can let the medical professional in charge know.</p>
					<p align="justify">Don't worry if you're feeling a bit nervous - it's completely normal.</p>
				</div>
				<div class="w3-col m6 w3-large  w3-padding">
					<div class="w3-xlarge"><i class="fas fa-hamburger w3-text-dark-maroon"></i><i class="fas fa-fw fa-cocktail w3-text-dark-maroon"></i> <b>Hydrate and Eat</b></div>
					<p align="justify">One of the most important things you can do to look after your own health is to drink lots of fluids and have plenty to eat.</p>
					
					<div class="w3-xlarge"><i class="fas fa-fw fa-history w3-text-dark-maroon"></i> <b>The day before</b></div>
					<p align="justify">
						<ul>
						<li>Drink plenty of fluids 10 glasses for men or 8 glasses for women.</li>
						<li>Try to get a good night's sleep.</li>
						<li>Try to avoid foods that are high in fat or fried. Fatty intake can interfere with plasma collection and laboratory testing.</li>
						</ul>
					</p>
					
					<div class="w3-xlarge"><i class="fas fa-fw fa-history w3-text-dark-maroon"></i> <b>3 hours before</b></div>
					<p align="justify">
						<ul>
						<li>Drink 750 ml (that's 3 good-sized glasses) of fluids.</li>
						<li>Have something savoury to eat.</li>
						<li>Try to avoid foods that are high in fat or fried. Fatty intake can interfere with plasma collection and laboratory testing.</li>
						</ul>
					</p>
				</div>
				

			</div>
		</div>
		<div class="w3-padding-16"></div>
	</div>
</div>	


<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-beach" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large" style="max-width:1100px">
			<div class="tajuk w3-text-dark-maroon w3-center" style="font-size:40px; font-weight:800"><span class="w3-tag w3-circle w3-xlarge w3-padding-small w3-dark-maroon w3-padding-right">&nbsp; 2 &nbsp;</span> At the blood event</div>
			<div class="w3-padding-16"></div>
			<div class="w3-row">
				<div class="w3-col m4 w3-large w3-padding" >
					<div class="w3-xlarge"><b>Welcome</b></div>
					<p align="justify">When you walk in the event, you'll be greeted by the staff member. Then, you'll take a seat and fill out the confidential donor questionnaire they give you.</p>
				</div>
				<div class="w3-col m4 w3-large  w3-padding">
					<div class="w3-xlarge"><b>Interview</b></div>
					<p align="justify">In a private area, a trained staff member will go over your questionnaire answers with you and ask some questions to check that you're fine to donate.</p>
					<p align="justify">They'll give you a quick 'finger test to check your haemoglobin (a protein which contains iron) and test your blood pressure.</p>
				</div>
				<div class="w3-col m4 w3-large  w3-padding">
					<div class="w3-xlarge"><b>Donate</b></div>
					<p align="justify">Sit back and relax on a comfy couch. You can read, chat with other donors, or enjoy some quiet time.</p>
					<p align="justify">The staff members will keep a close eye on you the whole time to make sure you're OK.</p>
					<p align="justify">Congratulations! Your donation is done. Now it's time to celebrate.</p>
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
			<div class="tajuk w3-text-dark-maroon w3-center" style="font-size:40px; font-weight:800"><span class="w3-tag w3-circle w3-xlarge w3-padding-small w3-dark-maroon w3-padding-right">&nbsp; 3 &nbsp;</span>  After you donate</div>
			<div class="w3-padding-16"></div>
			<div class="w3-row">
				<div class="w3-col m4 w3-large w3-padding" >
					<div class="w3-xlarge"><i class="fas fa-fw fa-history w3-text-dark-maroon"></i> <b>Right After</b></div>
					<p align="justify">It's important that you rest for around 5 minutes in the donor chair.</p>
					<p align="justify">When you're ready, you can take the snacks given from the staff members and enjoy.</p>
					<p align="justify">Make sure you grab a juice or water on your way out.</p>
				</div>
				<div class="w3-col m4 w3-large  w3-padding">
					<div class="w3-xlarge"><i class="fas fa-fw fa-history w3-text-dark-maroon"></i> <b>In the next 8 hours</b></div>
					<p align="justify">Drink plenty more fluids. Aim for 3 glasses of fluids in the first 3 hours.</p>
					<p align="justify">Take a seat when you can. Your body needs a bit of time to recover, so try to avoid spending too much time on your feet.</p>
					<p align="justify">Try not to overheat. Some days it's tricky, but do your best to avoid hot showers, rushing around, standing in direct sun and hot drinks.</p>
				</div>
				<div class="w3-col m4 w3-large  w3-padding">
					<div class="w3-xlarge"><i class="fas fa-fw fa-history w3-text-dark-maroon"></i> <b>For at least 12 hours</b></div>
					<p align="justify">Avoid strenuous exercise (like cycling, jogging or going to the gym) or hazardous activities, including activities or jobs where public safety may be affected. Check any employment or safety requirements you have. If unsure, please discuss at your interview.</p>
					<p align="justify">Most people feel great after they donate. In fact, you're probably feeling pretty good about yourself.</p>
				</div>				
			</div>
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