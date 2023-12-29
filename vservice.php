<?php  
	/*comments, if any */ 
	//session_start(); 
	require_once("pageobj.php");
	class ServicePage extends PageObj{
	
	
		//add if required

		function testObj(){
			echo "This is a test of HomePage.Obj!";
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
			$content=" <big><big><p> We've Got Your Vehicle Servicing and Car Repair Needs Covered</p></big></big>";
			$boxdata[0]=array("boxid"=>1, "boxtype"=>"overviewbox", "stylename"=>"overviewbox", "content"=>"$content");

?>		
			<div style="background-image: url('resources/images/servicegirl.jpg');  background-size: cover; background-repeat:no-repeat;  height: 80vh; width: auto;">
				<?php	$this->drawSection($boxdata, 0, 1); ?>
			</div> <!--end menubar-->
<?php

		}

		function welcome(){

			$boxdata=array(); $noboxes=5;
			$title="<center>WHY AUTOWORLD</center>";
			$boxdata[0]=array("boxid"=>1, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");
			
			$contentl="<center><img src=\"resources\images\SOBK1022010_1560x880_desktop.jpg\" alt=\"WELCOME TO AUTOWORLD\" style=\" object-fit: cover; width:100%; height: 60vh; box-sizing: border-box;\"/></center> ";
			$boxdata[1]=array("boxid"=>2, "boxtype"=>"imageboxmain", "stylename"=>"imageboxmain", "content"=>"$contentl");

			$contentl1="<center><big><big>  <big><big><p style=\"color: #3498db ;\" >Your premier destination for all your automotive needs.</p></big></big>
				</big></big>Whether you're looking for car sales, repairs, or maintenance services, we've got you covered. With our commitment to excellent service, quality products, and customer satisfaction, we strive to be your trusted partner in the automotive industry.</center></br>
			 ";
			$boxdata[2]=array("boxid"=>3, "boxtype"=>"contentboxmain", "stylename"=>"contentboxmain", "content"=>"$contentl1");


?>		
			<div > <!--menubar-->
				<?php	$this->drawSection($boxdata, 0, 3); ?>
			</div> <!--end menubar-->
<?php

		}

		
		function services($productrs=array()) {

			//destinationDetails content


			$boxdata4 = array(); $noboxes = 3;
			$title="<center>PRODUCTS AND SERVICES <hr></center>";
			$boxdata4[0]=array("boxid"=>2, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");

			?>
			<div> <!--title-->
				<?php $this->drawSection($boxdata4, 0, 1);?>
			</div> <!--end title-->
			<div style="padding: 0% 10% 0% 10%;">
			<?php

			while ($row = $productrs->fetch()) {
			
			
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
				

				$boxdata4[1] = array("boxid"=>2, "boxtype"=>"smallboxs", "stylename"=>"smallboxs", "content"=>"<a style=\"text-decoration: none; color: inherit;\" href=\"cbooknow.php?sid=".$row["sid"]."\">$content1</a>");

	?>
				<?php $this->drawSection($boxdata4, 1, 2); ?>
	<?php

					
				
			


	
			}
			
	?>
				</div>
	<?php

			
			


		}

		function about(){

			$boxdata=array(); $noboxes=5;
			$title="<center>AT AUTOWORLD</center>";
			$boxdata[0]=array("boxid"=>1, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");
			
			$contentl="<center><img src=\"resources\images\Carmechanic.jpg\" alt=\"WELCOME TO AUTOWORLD\" style=\" object-fit: cover; width:100%; height: 60vh; box-sizing: border-box;\"/></center> ";
			$boxdata[2]=array("boxid"=>2, "boxtype"=>"imageboxmain", "stylename"=>"imageboxmain", "content"=>"$contentl");

			$contentl1="<center>  <big><big><p style=\"color: #3498db ;\" >We're the New Zealand Car Service and Automotive Mechanics Chain that Kiwis Know and Trust</p></big></big></br>
				At Autoworld, we've got the service and repairing of your ride covered. You know you've come to the right place when you visit your Autoworld. </center></br>
			 ";
			$boxdata[1]=array("boxid"=>3, "boxtype"=>"contentboxmain", "stylename"=>"contentboxmain", "content"=>"$contentl1");


?>		
			<div > <!--menubar-->
				<?php	$this->drawSection($boxdata, 0, 3); ?>
			</div> <!--end menubar-->
<?php

		}

		function pageContent($productrs=array()){ 
			echo "<div style=\"width:101%; max-width:101%; height:auto; background-color:#FDFEFE; margin:-10px 0px 0px -10px; box-sizing:border-box;\">";
				$this-> slider();
				$this-> welcome();
				$this-> services($productrs);
				$this-> about();
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

	
		
	
	}
?>
