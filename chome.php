<?php 
				/*Aug 19, 2023 (Sat). Author: YP@C2L3.
					Purpose: Controller file for vhome.php
					Version: 1.0
				*/

				require_once("vhome.php");
				
				//HomePage implementation begins
				  //handling warnings, url data, meesages and input data sanitization
                  $msg=""; $sname=""; $email=""; $b=""; 
     
                  if(isset($_GET['msg'])) $msg=htmlentities($_GET['msg'], ENT_QUOTES); else $msg="";
                  if(isset($_GET['sname'])) $sname=htmlentities($_GET['sname'], ENT_QUOTES); else $sname="";
                  if(isset($_GET['email'])) $email=htmlentities($_GET['email'], ENT_QUOTES); else $email="";
                  if(isset($_GET['submit'])) $b=htmlentities($_GET['submit'], ENT_QUOTES); else $b=""; 
                  
				//handling ends
                //handling server data (for subscribe action)
                $hpobj= new HomePage(); //$hpobj->testObj();
                $title="Welcome to AUTOWORLD"; $titleimg="resources\Logo.png"; $cssfilename="./styles.css"; $cssmobile="./stylesmobile.css";
                $data=array("title"=>"$title", "titleimg"=>"$titleimg", "cssfilename"=>"$cssfilename", "cssmobile"=>"$cssmobile");
                $hpobj->setPList($data);
                $hpobj->htmlHead();
                $link=$hpobj->connect();
                $productrs=$hpobj->selectRecords($fields=array("*"), $tables=array("services"), " LIMIT 0, 3");
                $link=$hpobj->closeLink();
                if(strcmp($b, "Subscribe")==0){ //echo "if Subscribe button is clicked";
                    if( (strcmp($sname, "Your Name")==0) || (strcmp($email, "Your E-mail")==0) ) $msg="Please enter your name and e-mail address";
                    else{
                        $link=$hpobj->connect();
                        $rs=$hpobj->selectRecords($fields=array("*"), $tables=array("subscribe"), " WHERE subscribe.email=\"$email\"");
                        if($row=$rs->fetch()) $msg="This email address is already subscribed!";
                        else{
                            $res=$hpobj->insertRecords("subscribe", $fields=array("sname", "email"), $values=array("$sname", "$email"));
                            if($res==-1) $msg="Error!";
                            else $msg="Your subscription is successful! Thank you!!<a href=\"./chome.php\">CONTINUE</a>";
                        }
                        $link=$hpobj->closeLink();
                    }
                }
				$hpobj->pageBody($msg,$productrs);
			?>