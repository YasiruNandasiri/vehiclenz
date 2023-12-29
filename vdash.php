<?php  
	/*comments, if any */ 
	//session_start(); 
	require_once("pageobj.php");
	class Dashboard extends PageObj{
	
	
		//add if required

		function testObj(){
			echo "This is a test of Dashboard.Obj!";
		}
		
		function htmlHead(){ //HTML head content. This is common to all UI pages. Can override as appropriate! param=$title, $titleimg, 						$cssfilename
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
			$content=" <big><big><p>Keep You Safe </BR> On The Road</p></big></big>";
			$boxdata[0]=array("boxid"=>1, "boxtype"=>"overviewbox", "stylename"=>"overviewbox", "content"=>"$content");

?>		
			<div style="background-image: url('resources/images/1.png'); background-repeat:no-repeat;  background-size: cover; background-repeat:no-repeat;  height: 80vh; width: auto;">
				<?php	$this->drawSection($boxdata, 0, 1); ?>
			</div> <!--end menubar-->
<?php

		}

		function welcome(){

			$boxdata=array(); $noboxes=5;
			$title="<center><big><big>WELCOME TO AUTOWORLD</big></big></center>";
			$boxdata[0]=array("boxid"=>1, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");
			
			$contentl="<center><img src=\"resources\images\SOBK1022010_1560x880_desktop.jpg\" alt=\"WELCOME TO AUTOWORLD\" style=\" object-fit: cover; width:100%; height: 60vh; box-sizing: border-box;\"/></center> ";
			$boxdata[1]=array("boxid"=>2, "boxtype"=>"imageboxmain", "stylename"=>"imageboxmain", "content"=>"$contentl");

			$contentl1="<center><big><big>  <big><big><p style=\"color: #3498db ;\" >We Help You and Your Family to Travel Safely</p></big></big>
				</big></big>We will take care of your car. </br></br> 
			and together we will have a positive impact on our community and envitonment.. </center></br>
			 ";
			$boxdata[2]=array("boxid"=>3, "boxtype"=>"contentboxmain", "stylename"=>"contentboxmain", "content"=>"$contentl1");


?>		
			<div > <!--menubar-->
				<?php	$this->drawSection($boxdata, 0, 3); ?>
			</div> <!--end menubar-->
<?php

		}

	

		function services() {

			//destinationDetails content


			$boxdata4 = array(); $noboxes = 3;
			$title="<center><big><big> PRODUCTS AND SERVICES </big></big></center>";
			$boxdata4[0]=array("boxid"=>2, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");

			?>
			<div> <!--title-->
				<?php $this->drawSection($boxdata4, 0, 1);?>
			</div> <!--end title-->
			<?php

			$link = $this->connect();
			$i=0;

			$rs = $this->selectRecords($fields = array("*"), $tables = array("services"), "");
			while ($row = $rs->fetch()) {
				$i=$row["sid"];
				$name = $row["name"];
				$image = $row["image"];
				$intro = $row["intro"];




				//echo $age=$row["age"]; echo "</BR>";
				//echo $attraction[0]["name"];

				
				$content1="<center><img src=\"resources\images\\".$row["image"]." \" alt=\"" . $row["name"] . "\" style=\" box-sizing: border-box;  width:100%; height:35vh;\"/></center>
					<center><big><big><p style=\"color:  #2ecc71  ;\">". $row["name"]." </p></big></big>
					<p>" . $row["intro"] . "</p></center>
				";
		
	
				
				if($i<4){

					$boxdata4[1] = array("boxid"=>2, "boxtype"=>"smallbox", "stylename"=>"smallbox", "content"=>"$content1");

	?>
				<?php $this->drawSection($boxdata4, 1, 2); ?>
	<?php

					
				}
			


	
			}

			$content1="<center><big><a style=\"text-decoration: none; color: inherit;\" href=\"cservice.php\">See More</a></big></center>";
			$boxdata4[2]=array("boxid"=>3, "boxtype"=>"whitebar", "stylename"=>"whitebar", "content"=>"$content1");

	?>
			<div> <!--title-->
				<?php $this->drawSection($boxdata4, 2, 3);?>
			</div> <!--end title-->
	<?php

			$link = $this->closeLink(ex);


		}

		function about(){

			$boxdata=array(); $noboxes=5;
			$title="<center><big><big>AT AUTOWORLD</big></big></center>";
			$boxdata[0]=array("boxid"=>1, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");
			
			$contentl="<center><img src=\"resources\images\Carmechanic.jpg\" alt=\"WELCOME TO AUTOWORLD\" style=\" object-fit: cover; width:100%; height: 60vh; box-sizing: border-box;\"/></center> ";
			$boxdata[2]=array("boxid"=>2, "boxtype"=>"imageboxmain", "stylename"=>"imageboxmain", "content"=>"$contentl");

			$contentl1="<center>  <big><big><p style=\"color: #3498db ;\" >We're the New Zealand Car Service and Automotive Mechanics Chain that Kiwis Know and Trust</p></big></big>
				At Autoworld, we've got the service and repairing of your ride covered. You know you've come to the right place when you visit your Autoworld. </center></br>
			 ";
			$boxdata[1]=array("boxid"=>3, "boxtype"=>"contentboxmain", "stylename"=>"contentboxmain", "content"=>"$contentl1");


?>		
			<div > <!--menubar-->
				<?php	$this->drawSection($boxdata, 0, 3); ?>
			</div> <!--end menubar-->
<?php

		}

		function pageContent(){
			$this-> slider();
			$this-> welcome();
			$this-> services();
			$this-> about();
		}
		
		function pageBody($msg){
			echo "<strong><big><center><font face=\"Trebuchet MS\" color=\"#c0392b\" size=\"+3\">$msg</font></center></big></strong>";
	
			echo "<!--body of the page begins!-->
			<body bgcolor=\" #fdfefe \">
				<div> <!--main-->";
					$this->pageTop(); 
					$this->pageContent();
					$this->pageFooter();			
				echo "</div> <!--end main-->
		</body>
	</html>";
		}
	}
?>