<?php  
	/*comments, if any */ 
	//session_start(); 
	require_once("pageobj.php");
	class BookNowPage extends PageObj{
	
	
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
			$content=" <big><big><p>Book a Service Now</p></big></big>";
			$boxdata[0]=array("boxid"=>1, "boxtype"=>"overviewbox", "stylename"=>"overviewbox", "content"=>"$content");

?>		
			<div style="background-image: url('resources/images/booknow.png'); background-size: cover; background-repeat:no-repeat; height: 80vh; width: auto;">
				<?php	$this->drawSection($boxdata, 0, 1); ?>
			</div> <!--end menubar-->
<?php

		}

		function welcome(){

			$boxdata=array(); $noboxes=5;
			$title="<center>WHY AUTOWORLD<hr></center>";
			$boxdata[0]=array("boxid"=>1, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");
			
			$contentl="<center><img src=\"resources\images\\nicedriverwoman.jpg\" alt=\"WELCOME TO AUTOWORLD\" style=\" object-fit: cover; width:100%; height: 60vh; box-sizing: border-box;\"/></center> ";
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

		
		function service($productrss=array()) {

			//destinationDetails content


			$boxdata4 = array(); $noboxes = 3;

			while ($row = $productrss->fetch()) {
				
				$name = $row["name"];
				$image = $row["image"];
				$intro = $row["content"];




				//echo $row["content"]; echo "</BR>";
				//echo $attraction[0]["name"];

				$content=" <center><big style=\" color:#3498db; \" > " . $row["name"] . " </big></center>";
				$boxdata4[0]=array("boxid"=>1, "boxtype"=>"overviewboxs", "stylename"=>"overviewboxs", "content"=>"$content");

	
				echo "<div style=\"background-image: url('resources/images/" . $row["image1"] . "'); background-size: cover; background-repeat: no-repeat; height: 60vh; width: 101%; max-width: 101%; margin: -10px 0px 0px -10px; box-sizing: border-box;\">";
?>		
				<div  style="opacity:0.8;"> <!--menubar-->

				<?php $this->drawSection($boxdata4, 0, 1); ?>
				</div></div> <!--end menubar-->
<?php

			
				$content1= $row["content"];	
				$boxdata4[1] = array("boxid"=>2, "boxtype"=>"servicecontentbox", "stylename"=>"servicecontentbox", "content"=>"$content1");

				$content1="<center><a style=\"text-decoration: none; background-color:  #e74c3c ; padding: 15px; color:  #fdfefe ;\" href=\"cservice.php\">Back To Services</a></center>";
				$boxdata4[2]=array("boxid"=>3, "boxtype"=>"whitebar", "stylename"=>"whitebar", "content"=>"$content1");

?>		
				<div> <!--menubar-->
				<?php $this->drawSection($boxdata4, 1, 3); ?>
				</div> <!--end menubar-->
<?php
	
			}

			
		}

		function booknow($productrs=array(),$sid){


			$serviceOptions = "<option value=\"0\">Other Service</option>";

			while ($row = $productrs->fetch()) {
				$selected = ($row["sid"] == $sid) ? "selected" : "";
        		$serviceOptions .= "<option value=\"" . $row["sid"] . "\" $selected>" . $row["name"] . "</option>";
			}
			


			$boxdata=array(); $noboxes=5;
			$title="<center>BOOK YOUR SERVICE NOW <hr></center>";
			$boxdata[0]=array("boxid"=>1, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");
			$contentl="<center><img src=\"resources\images\image3.jpg\" alt=\"WELCOME TO AUTOWORLD\" style=\" object-fit: cover; width:100%; height: 160vh; box-sizing: border-box;\"/></center> ";
			$boxdata[1]=array("boxid"=>2, "boxtype"=>"formimagebox", "stylename"=>"formimagebox", "content"=>"$contentl");
		
			$form = "<form name=\"bookingForm\" method=\"POST\" style=\"box-sizing: border-box;\" action=\"#\">

    				<p><input type=\"text\" placeholder=\"Name *\" name=\"sname\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>	

    				<p><input type=\"email\" required placeholder=\"Email *\" name=\"email\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>

    				<p><input type=\"tel\" required placeholder=\"Contact Number *\" name=\"contact\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>

					<p><input type=\"text\" required placeholder=\"Vehicle Registration *\" name=\"Vehicle Registration\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>
    
    
					<p><input type=\"text\" placeholder=\"Vehicle Make\" name=\"Vehicle Make\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>
					
					
					<p><input type=\"text\" required placeholder=\"Vehicle Model *\" name=\"Vehicle Model\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>
					
					<p><input type=\"text\" placeholder=\"Vehicle Year\" name=\"Vehicle Year\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>

   					
    				<p>
    				    <label for=\"serviceType\">Select Service:</label> </BR>
    				    <select id=\"serviceType\" required name=\"serviceType\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\">
							$serviceOptions
    				    </select>
   					 </p>

					<p>
						<label for=\"bookingDate\">Select Date of Service:</label></BR>
						<input type=\"date\" id=\"bookingDate\" required name=\"bookingDate\" style=\" width: 65%; box-sizing: border-box; padding: 10px; font-family: sans-serif; font-size: 1em;\">
					</p>

					<p>
    				    <label for=\"serviceTime\">Select Time:</label> </BR>
    				    <select id=\"serviceTime\" name=\"serviceTime\" required style=\" width: 65%; box-sizing: border-box; padding: 10px; font-family: sans-serif; font-size: 1em;\">
						<option value=''>Please Select</option>
						<option value=\"8:00am\">
						8:00am</option>
						<option value=\"8:30am\">
						8:30am</option>
						<option value=\"9:00am\">
						9:00am</option>
						<option value=\"9:30am\">
						9:30am</option>
						<option value=\"10:00am\">
						10:00am</option>
						<option value=\"10:30am\">
						10:30am</option>
						<option value=\"11:00am\">
						11:00am</option>
						<option value=\"11:30am\">
						11:30am</option>
						<option value=\"12:00pm\">
						12:00pm</option>
						<option value=\"12:30pm\">
						12:30pm</option>
						<option value=\"1:00pm\">
						1:00pm</option>
						<option value=\"1:30pm\">
						1:30pm</option>
						<option value=\"2:00pm\">
						2:00pm</option>
						<option value=\"2:30pm\">
						2:30pm</option>
						<option value=\"3:00pm\">
						3:00pm</option>
						<option value=\"3:30pm\">
						3:30pm</option>
						<option value=\"4:00pm\">
						4:00pm</option>
    				    </select>
   					 </p>

    				<p><textarea id=\"message\" name=\"msg1\" rows=\"10\" cols=\"40\" placeholder=\"Additional Comments...\" size=\"28\" style=\"width: 65%; box-sizing: border-box; padding: 10px; font-family: sans-serif; font-size: 1em;\"></textarea></p>

    				<p>
    				    <input name=\"bookService\" type=\"submit\" value=\"Book Service\" size=\"28\" style=\"width: 65%; box-sizing: border-box; border: 1.5px solid black; padding: 10px; background:  #45b39d ; color: white; font-size: 16px; cursor: pointer;\">
    				</p>
					</form>";
			$formbox = "<big><big style=\" color: #e74c3c;\">Book Your Service</big></big></BR></BR>$form</BR></BR>";

			$boxdata[2]=array("boxid"=>3, "boxtype"=>"bookformbox", "stylename"=>"bookformbox", "content"=>"<center>$formbox</center>");
		
		
?>
			<div> <!--page top-->
				<?php $this->drawSection($boxdata, 1, 3);?>
			</div> <!--end page top-->
<?php
		
		}

		function about(){

			$boxdata=array(); $noboxes=5;
			$title="<center>AT AUTOWORLD<hr></center>";
			$boxdata[0]=array("boxid"=>1, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");
			
			$contentl="<center><img src=\"resources\images\SOBK1022010_1560x880_desktop.jpg\" alt=\"WELCOME TO AUTOWORLD\" style=\" object-fit: cover; width:100%; height: 60vh; box-sizing: border-box;\"/></center> ";
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

		function pageContent($productrs=array(),$productrss=array(),$sid){ 
			echo "<div style=\"width:101%; max-width:101%; height:auto; background-color:#FDFEFE; margin:-10px 0px 0px -10px; box-sizing:border-box;\">";
				
				$this-> service($productrss);
				$this-> booknow($productrs,$sid);
				
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

		function pageBody($msg,$productrs=array(),$sid,$productrss=array()){ 
			?>        
					<!--body of the page begins!-->
						<body bgcolor="#FDFEFE">
							<div id="main"> <!--main-->
								<div>
									<strong><big><center><font face="Trebuchet MS" color="#c0392b" size="+2"><?php echo $msg; ?></font></                    center></big></strong>
								</div>
								<?php
									$this->pageTop();  
									$this->pageContent($productrs,$productrss,$sid);
									$this->pageFooter();
								?>
							</div> <!--end main-->
						</body>
					</html>
			<?php
				}

		
	}
?>
