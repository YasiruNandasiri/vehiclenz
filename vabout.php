<?php
/*comments, if any
*/

//session_start();
require_once("pageobj.php");

class AboutPage extends PageObj{
	//add if required
	
	function testObj(){
	  echo "This is a test of HomePageObj!";
	}
	
	function htmlHead(){ //HTML head content. This is common to all UI pages. Can override as appropriate! param=$title, $titleimg, $cssfilename
		$this->setMetaOnHtmlHead();
		echo "<!--setting required internal styles for the -->
		<style>
			/*.about{ background-color:#ecf0f1; width: 100%; height:500px; }	 		
			@media only screen and (max-width: 450px){
				.about{ background-color:#ecf0f1; width: 100%; height:510px; }
			}*/
			
			.fa{ padding: 10px; font-size: 20px; width: 30px; text-align: center; text-decoration: none; margin: 3px 1px; }			
		   .fa:hover{ opacity: 0.7; }

		   .fa-facebook{ background: #3B5998; color: white; }
		   .fa-youtube{ background: #bb0000; color: white; }
		   .fa-instagram{ background: #125688; color: white; }
		</style>
		
   </head>"; 
  }
  
  function slider(){

	$boxdata=array(); $noboxes=1;
	$content=" <big><big><p>Most Trusted Automotive Service Stores Specialising in General Vehicle Repairs</p></big></big>";
	$boxdata[0]=array("boxid"=>1, "boxtype"=>"overviewbox", "stylename"=>"overviewbox", "content"=>"$content");

?>		
	<div style="background-image: url('resources/images/auto-shop-expectations.jpg'); background-size: cover; background-repeat:no-repeat; height: 80vh; width: auto;">
		<?php	$this->drawSection($boxdata, 0, 1); ?>
	</div> <!--end menubar-->
<?php

}


function aboutCompany(){

	$boxdata=array(); $noboxes=5;
	$title="<center>ABOUT US</center>";
	$boxdata[0]=array("boxid"=>1, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");
	
	$contentl="<center><img src=\"resources\images\auto-mechanic-examining-the-car-engine-free-video.jpg\" alt=\"Visit Japan\" style=\" object-fit: cover; width:100%; height: 60vh; box-sizing: border-box;\"/></center> ";
	$boxdata[1]=array("boxid"=>2, "boxtype"=>"imageboxmain", "stylename"=>"imageboxmain", "content"=>"$contentl");

	$contentl1="<center><big><big><p style=\"color: #3498db  ;\" >Company Overview:</p></big></big></center> </BR> 
				</br><center><big>Welcome to AUTOWORLD, </big></BR></BR><p align='justify'>
				At Autoworld Repair Shop, you can rely on their team of dedicated professionals who take pride in delivering the highest level of service to their customers. The introduction of their \"while you wait\" service has transformed the automotive industry, allowing you to have your vehicle serviced or repaired promptly, saving you time and minimizing any inconvenience.</p></center></br>
	 ";
	$boxdata[2]=array("boxid"=>3, "boxtype"=>"contentboxmain", "stylename"=>"contentboxmain", "content"=>"$contentl1");


?>		
	<div > <!--menubar-->
		<?php	$this->drawSection($boxdata, 0, 3); ?>
	</div> <!--end menubar-->
<?php

}

function smallBox(){
	$boxdata=array(); $noboxes=4;
	$title="<center>COMPANY STATEMENTS<hr></center>";
	$boxdata[0]=array("boxid"=>1, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");
	$content1="<center><big><big><p style=\"color:   #3498db    ;\" >Vision:</p></big></big></center> </BR> 
				<center><p align='justify'>Our vision at Autoworld Repair Shop is to be the leading automotive service provider in New Zealand, recognized for our unwavering commitment to excellence. We strive to continuously innovate and improve our services, embracing the latest technologies and industry standards to meet the evolving needs of our customers.</p></center>";
	$boxdata[1]=array("boxid"=>2, "boxtype"=>"smallboxab", "stylename"=>"smallboxab", "content"=>"$content1");

	$content2="<center><big><big><p style=\"color:   #3498db   ;\" >Mission:</p></big></big></center> </BR> 
				<center><p align='justify'>Our mission at Autoworld Repair Shop is to provide exceptional automotive services and products, exceeding our customers' expectations. Through our skilled team and dedication to quality, we aim to ensure the safety, reliability, and longevity of every vehicle that comes through our doors.</p></center>";
	$boxdata[2]=array("boxid"=>3, "boxtype"=>"smallboxab", "stylename"=>"smallboxab", "content"=>"$content2");


	$content3="<center><big><big><p style=\"color:  #3498db    ;\" >Standards:</p></big></big></center> </BR> 
				<center><p align='justify'>We are committed to providing high-quality automotive products and services, using top-of-the-line equipment and genuine parts. Our skilled technicians undergo continuous training to ensure they deliver the best results. We prioritize customer satisfaction by delivering exceptional service, building trust, and maintaining open communication.
				</p></center>";
	$boxdata[3]=array("boxid"=>4, "boxtype"=>"smallboxab", "stylename"=>"smallboxab", "content"=>"$content3");
?>
		<div> <!--page top-->
			<?php $this->drawSection($boxdata, 0, 1);?>
		</div> <!--end page top-->

		<div style="padding: 0% 4% 0% 4%"> <!--page top-->
			<?php $this->drawSection($boxdata, 1, 4);?>
		</div> <!--end page top-->
<?php
}

function bodycontent(){

	$boxdata=array(); $noboxes=6;
	$title="<center>THE FOUNDERS<hr></center>";
	$boxdata[0]=array("boxid"=>1, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");
	$contentl="<center><img src=\"resources\images\pfounder1.jpg\" alt=\"Founder\" style=\" width:Auto; height:550px; box-sizing: border-box \"/></center> ";
	$boxdata[1]=array("boxid"=>2, "boxtype"=>"imagebox", "stylename"=>"imagebox", "content"=>"$contentl");

	$contentl1="<center><big><big><p style=\"color:   #3498db    ;\" >Person One</p></big></big></center> </BR>
				<center><h3 style=\"color: #566573 ;\" >Co-Founder</h3></center> </BR>
				<center><p align='justify'>Individuals have been professionals in their respective fields, with expertise in diverse roles. They have served as specialists in various domains, contributing to the success of organizations. Whether in legal, corporate, or other sectors, they have been instrumental in the growth and development of their respective companies.</p></center>
				 ";
	$boxdata[2]=array("boxid"=>3, "boxtype"=>"contentbox", "stylename"=>"contentbox", "content"=>"$contentl1");

	//lowercontent
	
	$contentl="<center><img src=\"resources\images\pfounder2.jpg\" alt=\"Founder\" style=\"  width:Auto; height:550px; box-sizing: border-box \"/></center> ";
	$boxdata[3]=array("boxid"=>4, "boxtype"=>"imagebox1", "stylename"=>"imagebox1", "content"=>"$contentl");

	$contentl1="<center><big><big><p style=\"color:  #3498db    ;\" >Person Two</p></big></big></center> </BR>
				<center><h3 style=\"color: #566573 ;\" >Co-Founder</h3></center> </BR>
				<center><p align='justify'>Individuals have been professionals in their respective fields, with expertise in diverse roles. They have served as specialists in various domains, contributing to the success of organizations. Whether in legal, corporate, or other sectors, they have been instrumental in the growth and development of their respective companies.</p></center>
				 ";
	$boxdata[4]=array("boxid"=>5, "boxtype"=>"contentbox1", "stylename"=>"contentbox1", "content"=>"$contentl1");

	$title="<center></center>";
	$boxdata[5]=array("boxid"=>6, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");

	?>
	<div> <!--page top-->
		<?php $this->drawSection($boxdata, 0, 6);?>
	</div> <!--end page top-->
<?php

}

function pageContent($productrs=array()){ 
	echo "<div style=\"width:101%; max-width:101%; height:auto; background-color:#FDFEFE; margin:-10px 0px 0px -10px; box-sizing:border-box;\">";
		$this-> slider();
		$this-> aboutCompany();
		$this-> smallBox();
		$this-> bodycontent();
	echo "</div>";     
}

function pageTop(){
	echo "<div style=\"width:101%; max-width:101%; height:200px; max-height:200px; background-color:#F1948A; margin:-10px 0px 0px -10px; box-sizing:border-box;\">";
		parent::pageTop();
	echo "</div>";
}

function pageFooter(){ 
	echo "<div style=\"width:101%; max-width:101%; height:auto; background-color:#FDFEFE; margin:-10px 0px 0px -10px; box-sizing:border-box;\">";
		parent::pageFooter();
	echo "</div>";
}

function pageBody($msg,$productrs=array()){ 
	?>        
			<!--body of the page begins!-->
				<body bgcolor="#FDFEFE">
					<div id="main"> <!--main-->
						<div>
							<strong><big><center><font face="Trebuchet MS" color="#c0392b" size="+2"><?php echo $msg; ?></font></                    center></big></strong>
						</div>
						<?php
							$this->pageTop();  
							$this->pageContent($productrs);
							$this->pageFooter();
						?>
					</div> <!--end main-->
				</body>
			</html>
	<?php
		}
  
function pageContent1($newItems=array()){ 
  	
	$this-> slider();
	$this-> aboutCompany();
	$this-> smallBox();
	$this-> bodycontent();
	//$this->slide($newItems=array(), $backbtnstyling, $contentstyling, $nextbtnstyling);
}
  
function pageBody1($msg){ 
?>		
		<!--body of the page begins!-->
			<body bgcolor="#FDFEFE">
				<div id="main"> <!--main-->
					<div>
						<big><big><center><font face="Trebuchet MS" color="#c0392b" size="+3"><?php echo $msg; ?></font></center></big></big>
					</div>
					<?php
						$this->pageTop();  
						$this->pageContent(/*$newItems=array()*/);
						$this->pageFooter();
					?>
				</div> <!--end main-->
			</body>
		</html>
<?php
	}
}
?>


