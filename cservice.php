<?php 
				/*Aug 19, 2023 (Sat). Author: YP@C2L3.
					Purpose: Controller file for vhome.php
					Version: 1.0
				*/

				require_once("vservice.php");
				
				//HomePage implementation begins
				//handling warnings, url data, meesages and input data sanitization
			 	$b=""; 
				$msg=""; //$flag=""; 
			 	
				if(isset($_GET['submit'])) $b=htmlentities($_GET['submit'], ENT_QUOTES); else $b="";
				if(isset($_GET['sname'])) $sname=htmlentities($_GET['sname'], ENT_QUOTES); else $sname="";
				if(isset($_GET['email'])) $email=htmlentities($_GET['email'], ENT_QUOTES); else $email="";
				//echo $b;
				//if(isset($_GET['flag'])) $flag=htmlentities($_GET['flag'], ENT_QUOTES); else $flag="";
				//if(isset($_GET['msg'])) $msg=htmlentities($_GET['msg'], ENT_QUOTES); else $msg=""; 
				//handling ends
                //handling server data (for subscribe action)
                $spobj= new ServicePage(); //$spobj->testObj();
                $title="Welcome to AUTOWORLD"; $titleimg=""; $cssfilename="./styles.css"; $cssmobile="stylesmobile.css";
                $data=array("title"=>"$title", "titleimg"=>"$titleimg", "cssfilename"=>"$cssfilename", "cssmobile"=>"$cssmobile");
                $spobj->setPList($data);
                $spobj->htmlHead();
                $link=$spobj->connect();
                $productrs=$spobj->selectRecords($fields=array("*"), $tables=array("services"), " ");
                $link=$spobj->closeLink();
                if(strcmp($b, "Subscribe")==0){ //echo "if Subscribe button is clicked";
                    if( (strcmp($sname, "Your Name")==0) || (strcmp($email, "Your E-mail")==0) ) $msg="Please enter your name and e-mail address";
                    else{
                        $link=$spobj->connect();
                        $rs=$spobj->selectRecords($fields=array("*"), $tables=array("subscribe"), " WHERE subscribe.email=\"$email\"");
                        if($row=$rs->fetch()) $msg="This email address is already subscribed!";
                        else{
                            $res=$spobj->insertRecords("subscribe", $fields=array("sname", "email"), $values=array("$sname", "$email"));
                            if($res==-1) $msg="Error!";
                            else $msg="Your subscription is successful! Thank you!!<a href=\"./chome.php\">CONTINUE</a>";
                        }
                        $link=$spobj->closeLink();
                    }
                }
				$spobj->pageBody($msg,$productrs);
			?>
