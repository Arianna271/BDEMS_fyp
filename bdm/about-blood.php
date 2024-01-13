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
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large w3-center" style="max-width:1100px">			
			<div class="w3-padding"></div>
			<div class="tajuk w3-center" style="font-size:35px; font-weight:800">Can I Give Blood?</div>
			<div class="w3-padding-16"></div>
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
	<div class="w3-content w3-container w3-beach" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="tajuk w3-center" style="font-size:35px; font-weight:800">What to expect when giving blood?</div>
		<div class="w3-padding-16"></div>
		
		<div class="w3-content w3-container w3-large" style="max-width:1100px">
			<div class="tajuk w3-text-dark-maroon w3-center" style="font-size:35px; font-weight:800"><span class="w3-tag w3-circle w3-xlarge w3-padding-small w3-dark-maroon w3-padding-right">&nbsp; 1 &nbsp;</span> Before you donate</div>
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
			<div class="tajuk w3-text-dark-maroon w3-center" style="font-size:35px; font-weight:800"><span class="w3-tag w3-circle w3-xlarge w3-padding-small w3-dark-maroon w3-padding-right">&nbsp; 2 &nbsp;</span> At the blood event</div>
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
	<div class="w3-content w3-container w3-beach" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large" style="max-width:1100px">
			<div class="tajuk w3-text-dark-maroon w3-center" style="font-size:35px; font-weight:800"><span class="w3-tag w3-circle w3-xlarge w3-padding-small w3-dark-maroon w3-padding-right">&nbsp; 3 &nbsp;</span>  After you donate</div>
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


<div class="w3-black" id="contact">
	<div class="w3-content w3-container w3-white" style="max-width:1400px">
		<div class="w3-padding-16"></div>
		<div class="w3-content w3-container w3-large" style="max-width:1100px">
			<div class="tajuk w3-center" style="font-size:35px; font-weight:800">Donation Factor</div>
			<div class="w3-padding-16"></div>
			<div class="w3-row">
				<div class="w3-col m4 w3-padding" >
					<div class="w3-medium w3-padding w3-margin w3-beach w3-round-xxlarge" >
						<div class="w3-xlarge w3-center tajuk w3-text-dark-maroon" style="font-weight:800"><img src="images/age.png" width="60px"> <b>Age</b></div>
						<p align="justify">
						<b>Under 18 years of age</b>
						<li>You can become a donor as soon as you reach your 18th birthday.</li>
						</p>
						<p align="justify">
						<b>Under 66 years of age</b>
						<li>You can start giving blood anytime up to and including your 66th birthday.</li>
						</p>
						<p align="justify">
						<b>Aged between 66 - 70 years</b>
						<li>If you have given at least one complete blood donation before, even if it was some time ago or outside of Malaysia, you can donate up until your 70th birthday.</li>
						</p>
					</div>
				</div>
				
				<div class="w3-col m4 w3-padding" >
					<div class="w3-medium w3-padding w3-margin w3-beach w3-round-xxlarge" >
						<div class="w3-xlarge w3-center tajuk w3-text-dark-maroon" style="font-weight:800"><img src="images/calender.png" width="60px"> <b>Frequency</b></div>
						<p align="justify">
						How often you can donate depends on which type of donation you give.
						</P>
						<p align="justify">
						<b>Blood Donations</b>
						<li>(Male Donor) must wait a minimum of 12 full weeks between each blood donation and can give up to 4 donations in a calendar year. </li>
						<li>(Female Donor) must wait a minimum of 12 full weeks between each blood donation and can give up to 4 donations in a calendar year. </li>
						</p>	
					</div>
				</div>
				
				<div class="w3-col m4 w3-padding" >
					<div class="w3-medium w3-padding w3-margin w3-beach w3-round-xxlarge" >
						<div class="w3-xlarge w3-center tajuk w3-text-dark-maroon" style="font-weight:800"><img src="images/colds.png" width="60px"> <b>Colds</b></div>
						<p align="justify">
						<b>Cold Sores</b>
						<li>You can donate once the cold core is dry and healing. </li>
						</p>
						<p align="justify">
						<b>Colds, coughs, sore throats</b>
						<li>You may be able to donate once you are getting better.</li>
						</p>
						<p align="justify">
						<b>Hay Fever and allergies</b>
						<li>You can donate provided that you have no symptoms, even if taking antihistamines. </li>
						</p>
						<p align="justify">
						<b>Other infections</b>
						<li>Please wait 2 weeks from recovery and at least 7 days from completing a course of antibiotics. </li>
						</p>
					</div>
				</div>
			</div>
			
			<div class="w3-row">
				<div class="w3-col m4 w3-padding" >
					<div class="w3-medium w3-padding w3-margin w3-beach w3-round-xxlarge" >
						<div class="w3-xlarge w3-center tajuk w3-text-dark-maroon" style="font-weight:800"><img src="images/vaccine.png" width="60px"> <b>Vaccinations</b></div>
						<p align="justify">
						<b>Flu vaccination</b>
						<li>(By injection) No impact on donation eligibility.</li>
						<li>(By nasal spray) You must wait 4 weeks before donating.</li>
						</p>
						<p align="justify">
						<b>Covid-19 vaccine and booster</b>
						<li>You will need to wait 2 days after receiving a Covid-19 vaccination or booster before making a donation. </li>
						<li>There is no time deferral on receiving a Covid-19 vaccination or booster after donating blood.</li>
						</p>

					</div>
				</div>
				
				<div class="w3-col m4 w3-padding" >
					<div class="w3-medium w3-padding w3-margin w3-beach w3-round-xxlarge" >
						<div class="w3-xlarge w3-center tajuk w3-text-dark-maroon" style="font-weight:800"><img src="images/medication.png" width="60px"> <b>Medication</b></div>
						<p align="justify">
						<b>Antibiotics</b>
						<li>Please wait 2 weeks from recovery and at least 7 days after completing a course of antibiotics before giving blood. </li>
						</p>
						<p align="justify">
						<b>High blood pressure </b>
						<li>You can donate while taking high blood pressure medication. If your dose changes, you have to wait at least 4 weeks before donating. </li>
						</p>
						<p align="justify">
						<b>Antihistamines</b>
						<li>You can donate provided that you are symptom-free on the day. </li>
						</p>
					</div>
				</div>
				
				<div class="w3-col m4 w3-padding" >
					<div class="w3-medium w3-padding w3-margin w3-beach w3-round-xxlarge" >
						<div class="w3-xlarge w3-center tajuk w3-text-dark-maroon" style="font-weight:800"><img src="images/pregnancy.png" width="60px"> <b>Pregnancy</b></div>
						<p align="justify">
						<b>Pregnant</b>
						<li>You cannot give blood if you are pregnant. </li>
						</p>
						<p align="justify">
						<b>Trying to concieve</b>
						<li>It is not recommended that these individuals to donate, as they will need all of their iron stores when they do become pregnant.</li>
						</p>
						<p align="justify">
						<b>Breastfeeding</b>
						<li>You can donate if you are breastfeeding, however, you will need to wait until 6 months have passed from the end of your pregnancy before giving blood. </li>
						</p>
					</div>
				</div>
			</div>
			
			<div class="w3-row">
				<div class="w3-col m5 w3-padding" >
					<div class="w3-medium w3-padding w3-margin w3-beach w3-round-xxlarge" >
						<div class="w3-xlarge w3-center tajuk w3-text-dark-maroon" style="font-weight:800"><img src="images/relationship.png" width="60px"> <b>Sexual Relationship</b></div>
						<p align="justify">
						<b>You must never donate if :</b><br>
						a) You are HIV positive or receiving treatments for HIV.<br>
						b) You are HTLV positive.<br>
						c) You are a hepatitis B carrier. <br>
						d) You are a hepatitis C carrier.<br>
						e) You have ever been diagnosed with syphilis, even if treated. <br>
						f) You have ever injected or been injected with drugs. 
						</p>
						<p align="justify">
						<b>You must not donate for 3 months if:</b>
						<li>You are working as a sex worker.</li>
						</p>
					</div>
				</div>
				
				<div class="w3-col m5 w3-padding" >
					<div class="w3-medium w3-padding w3-margin w3-beach w3-round-xxlarge" >
						<div class="w3-xlarge w3-center tajuk w3-text-dark-maroon" style="font-weight:800"><img src="images/piercing.png" width="60px"> <b>Tatoos and Piercing</b></div>
						<p align="justify">
						<b>Tattoos, piercing and semi-permanent make-up</b>
						<li>You have to wait at least 120 days before donating blood. </li>
						</p>
					</div>
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