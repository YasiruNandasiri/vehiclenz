<?php
/*comments, if any
*/

//session_start();
require_once("pageobj.php");

class ContactPage extends PageObj{
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


function bodycontent(){

	$boxdata=array(); $noboxes=5;
	$title="<center>CONTACT US<hr></center>";
	$boxdata[7]=array("boxid"=>1, "boxtype"=>"title", "stylename"=>"title", "content"=>"$title");
	$contentl="<center><big><strong><p style=\"color: #2874a6;\" >Autoworld (Pvt.) Ltd.</p></strong></big></BR></BR><img src=\"resources\Logo.png\" alt=\"Autoworld\" style=\"width:30%; height:auto; box-sizing: border-box;\"/></center></BR></BR>
				<div style=\"display: flex; align-items: center; margin-bottom: 10px;\">
					<div style=\"flex: 0 0 25%;\">
						<img src=\"resources\iconcall.png\" alt=\"Phone\" width=\"50\" height=\"50\">
					</div>
					<div style=\"flex: 0 0 65%;\">
						+94 112 948 533 <br> +94 711 397 922
					</div>
				</div>

				<div style=\"display: flex; align-items: center; margin-bottom: 10px;\">
					<div style=\"flex: 0 0 25%;\">
						<img src=\"resources\iconemail.png\" alt=\"Email\" width=\"50\" height=\"50\">
					</div>
					<div style=\"flex: 0 0 65%;\">
					info.Autoworld@gmail.com
					</div>
				</div>

				<div style=\"display: flex; align-items: center; margin-bottom: 10px;\">
					<div style=\"flex: 0 0 25%;\">
						<img src=\"resources\iconaddress.png\" alt=\"Address\" width=\"50\" height=\"50\">
					</div>
					<div style=\"flex: 0 0 65%;\">
						1/41, Cardinal Cooray Mw, Dikowita, Hendala, 11300, Wattala, Sri Lanka.
					</div>
				</div>

				<div style=\"display: flex; align-items: center; margin-bottom: 10px;\">
					<div style=\"flex: 0 0 25%;\">
						<img src=\"resources\iconweb.png\" alt=\"Web\" width=\"50\" height=\"50\">
					</div>
					<div style=\"flex: 0 0 65%;\">
						www.Autoworld.com
					</div>
				</div>

			";
	$boxdata[1]=array("boxid"=>2, "boxtype"=>"contentboxtconact", "stylename"=>"contentboxcontact", "content"=>"$contentl");

	$form="<form name=\"formlog\" method=\"GET\" style=\" box-sizing: border-box;\" action=\"#\">

				<p><input type=\"text\" placeholder=\"Name\" name=\"sname\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>	
					
				<p><input type=\"email\" placeholder=\"Email\" name=\"email\" size=\"28\" style=\" width: 65%; box-sizing: border-box; padding: 10px;  font-size: 1em;\"></p>

							
				<p><textarea id=\"message\" name=\"msg1\" rows=\"4\" cols=\"40\" placeholder=\"Type your message here...\"  size=\"28\" style=\"width: 65%; box-sizing: border-box; padding: 10px; font-family: sans-serif; font-size: 1em;\"></textarea></p>

				<p><input name=\"send\" type=\"submit\" value=\"Send\"  size=\"28\" style=\"width: 65%; box-sizing: border-box; border: 1.5px solid black; padding: 10px; background:  #45b39d ; color: white; font-size: 16px; cursor: pointer;\"></p>
			</form>";
	$formbox="<h2 ><big>Drop Us Your Thoughts</big></h2></BR></BR>$form</BR></BR>";
	$boxdata[2]=array("boxid"=>3, "boxtype"=>"logbox", "stylename"=>"logbox", "content"=>"<center>$formbox</center>");


	?>
	<div> <!--page top-->
		<?php $this->drawSection($boxdata, 0, 3);?>
	</div> <!--end page top-->
<?php

}

function pageContent(){ 
	echo "<div style=\"width:101%; max-width:101%; height:auto; background-color:#FDFEFE; margin:-10px 0px 0px -10px; box-sizing:border-box;\">";
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

function pageBody($msg){ 
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


