<?php 
				/*Aug 19, 2023 (Sat). Author: YP@C2L3.
					Purpose: Controller file for vcontact.php
					Version: 1.0
				*/

				require_once("vcontact.php");
				
				//HomePage implementation begins
				//handling warnings, url data, meesages and input data sanitization
			 	$b=""; 
				$msg=""; //$flag=""; 
				$sname="";
				$msg1="";
			 	
				if(isset($_GET['send'])) $b=htmlentities($_GET['send'], ENT_QUOTES); else $b="";
				if(isset($_GET['sname'])) $sname=htmlentities($_GET['sname'], ENT_QUOTES); else $sname="";
				if(isset($_GET['email'])) $email=htmlentities($_GET['email'], ENT_QUOTES); else $email="";
				if(isset($_GET['msg1'])) $msg1=htmlentities($_GET['msg1'], ENT_QUOTES); else $msg1="";
				//echo $b;
				//if(isset($_GET['flag'])) $flag=htmlentities($_GET['flag'], ENT_QUOTES); else $flag="";
				//if(isset($_GET['msg'])) $msg=htmlentities($_GET['msg'], ENT_QUOTES); else $msg=""; 
				//handling ends
		
				$cpobj= new ContactPage(); //$hpobj->testObj();
				$title="Welcome to AUTOWORLD"; $titleimg=""; $cssfilename="./styles.css"; $cssmobile="stylesmobile.css";
				$data=array("title"=>"$title", "titleimg"=>"$titleimg", "cssfilename"=>"$cssfilename", "cssmobile"=>"$cssmobile");
				$cpobj->setPList($data);
				$cpobj->htmlHead();

				if(strcmp($b, "Send")==0){ //echo "if Send button is clicked";
					
						$link=$cpobj->connect(); 
						
							$res=$cpobj->insertRecords("message", $fields=array("sname", "email","msg"), $values=array("$sname", "$email", "$msg1")); 
							if($res==-1) $msg="Error!";
							else $msg="Your message is sent! Thank you!!<a href=\"./ccontact.php\">CONTINUE</a>";
							
						$link=$cpobj->closeLink();	
					
				}

				$cpobj->pageBody($msg);
			?> 