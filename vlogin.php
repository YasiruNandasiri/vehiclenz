<?php  
	/*comments, if any */ 
	//session_start(); 
	require_once("pageobj.php");
	class LoginPage extends PageObj{
	
	
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
		
		function logoBox(){
			$boxdata=array(); $noboxes=1;
			$logobox="<a href=\"chome.php\"><img src=\"resources\Logo.png\" alt=\"Autoworld\" style=\"box-sizing: border-box; height: 250px; width: 250px;\"/></a>";
			  $boxdata[0]=array("boxid"=>1, "boxtype"=>"signinlogo", "stylename"=>"signinlogo", "content"=>"<center>$logobox</center>");
		?>      
			<div>
				  <?php    $this->drawSection($boxdata, 0, 1); ?>
			  </div>
		<?php
		  }
		
		function loginform(){

			
			$boxdata=array(); $noboxes=5;
			//$title = "<center><big><big>JOIN US</big></big></center>";
			$backButton = "<div style=\"text-align: left;\">
							  &emsp; 
              			    <a onclick=\"history.back()\">
              			      <img src=\"resources\back.png\" alt=\"Back\" style=\"width: 40px; height: 40px; cursor: pointer;\">
              			    </a>
              			 </div>";

			$boxdata[12] = array("boxid" => 1, "boxtype" => "title", "stylename" => "title", "content" => "$backButton $title");

						
			$form = "<form name=\"registrationForm\" method=\"POST\" style=\"box-sizing: border-box;\" action=\"#\">

   						<p><input type=\"text\" placeholder=\"Name\" name=\"username\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>

    					<p><input type=\"email\" placeholder=\"Email\" name=\"email\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>

    					<p><input type=\"tel\" placeholder=\"Contact Number\" name=\"contactNumber\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>

    					<p><input type=\"password\" placeholder=\"Password\" name=\"password\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>

    					<p><input type=\"password\" placeholder=\"Confirm Password\" name=\"confirmPassword\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>

    					<p>
    					    <label for=\"birthdate\">Captcha:</label></BR>
    					    <input type=\"date\" id=\"birthdate\" name=\"birthdate\" style=\"width: 65%; box-sizing: border-box; padding: 10px; font-family: sans-serif; font-size: 1em;\">
    					</p>

    					<p>
    					    <input name=\"register\" type=\"submit\" value=\"Register\" size=\"28\" style=\"width: 65%; box-sizing: border-box; border: 1.5px solid black; padding: 10px; background:  #45b39d ; color: white; font-size: 1em; cursor: pointer;\">
    					</p>
					</form>";

			$formbox = "<big><big>User Registration</big></big></BR></BR>$form</BR></BR>";

			$boxdata[1]=array("boxid"=>2, "boxtype"=>"logformbox", "stylename"=>"logformbox", "content"=>"<center>$formbox</center>");

			$form = "<form name=\"loginForm\" method=\"POST\" style=\"box-sizing: border-box;\" action=\"#\">

					
				    <p><input type=\"text\" placeholder=\"Username\" name=\"username\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>

				    <p><input type=\"password\" placeholder=\"Password\" name=\"password\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>

				    <p>
				        <input name=\"login\" type=\"submit\" value=\"Login\" size=\"28\" style=\"width: 65%; box-sizing: border-box; border: 1.5px solid black; padding: 10px; background:  #45b39d ; color: white; font-size: 1em; cursor: pointer;\">
				    </p>

					</BR>
					<p style=\"text-align: Center; color: #2ecc71 ;\">   					    
						Forgot Password?
   					</p>
					<p>						
						<input type=\"email\" placeholder=\"Type your email to recover\" name=\"email\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\">
					</p>
					<p>
				        <input name=\"submit\" type=\"submit\" value=\"Recover Password\" size=\"28\" style=\"width: 65%; box-sizing: border-box; border: 1.5px solid black; padding: 10px; background:  #45b39d ; color: white; font-size: 1em; cursor: pointer;\">
				    </p>
				</form>";

			$formbox = "<big><big>User Login</big></big></BR></BR>$form</BR></BR>";	
			$boxdata[2]=array("boxid"=>3, "boxtype"=>"logformbox", "stylename"=>"logformbox", "content"=>"<center>$formbox</center>");
		
		
?>
			<div style="background-image: linear-gradient(45deg, rgba(9,9,121,1) 0%, rgba(0,0,0,1) 30%, rgba(51,2,44,1) 50%, rgba(0,0,0,1) 70%, rgba(2,125,15,1) 100%); height:100vh; "> <!--page top-->
				<?php $this->drawSection($boxdata, 1, 3);?>
			</div> <!--end page top-->
<?php
		
		}


		function pageContent(){ 
			echo "<div style=\"width:101%; max-width:101%; height:auto; background-color:#FDFEFE; margin:-10px 0px 0px -10px; box-sizing:border-box;\">";
				
				$this-> loginform();
			echo "</div>";     
		}
		
		function pageTop(){
			echo "<div style=\"width:101%; max-width:101%; height:350px; max-height:350px; background-color:#17202a; margin:-10px 0px 0px -10px; box-sizing:border-box;\">";
				
				parent::topBar();
				$this-> logoBox();
			echo "</div>";
		}

		function pageFooter(){ 
			echo "<div style=\"width:101%; max-width:101%; height:auto; background-color:#FDFEFE; margin:-10px 0px 0px -10px; box-sizing:border-box;\">";
				parent::pageFooter();
			echo "</div>";
		}

		function pageBody(){ 
			?>        
					<!--body of the page begins!-->
						<body bgcolor="#FDFEFE">
							<div id="main"> <!--main-->
								<div>
									<strong><big><center><font face="Trebuchet MS" color="#c0392b" size="+2"><?php echo $msg; ?></font></                    center></big></strong>
								</div>
								<?php
									$this->pageTop();  
									$this->pageContent();
									$this->pageFooter();
								?>
							</div> <!--end main-->
						</body>
					</html>
			<?php
				}
		

	}
?>
