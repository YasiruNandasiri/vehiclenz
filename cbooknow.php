<?php 
				/*Aug 19, 2023 (Sat). Author: YP@C2L3.
					pobjPurpose: Controller file for vhome.php
					Version: 1.0
				*/

				require_once("vbooknow.php");
				
				//HomePage implementation begins
				//handling warnings, url data, meesages and input data sanitization
			 	$b=""; 
				$msg=""; //$flag=""; 
                $sid=0;
			 	
				if(isset($_GET['submit'])) $b=htmlentities($_GET['submit'], ENT_QUOTES); else $b="";
				if(isset($_GET['sname'])) $sname=htmlentities($_GET['sname'], ENT_QUOTES); else $sname="";
				if(isset($_GET['email'])) $email=htmlentities($_GET['email'], ENT_QUOTES); else $email="";
				if(isset($_GET['sid'])) $sid=htmlentities($_GET['sid'], ENT_QUOTES); else $sid=0;
				
                //echo $b;
				//if(isset($_GET['flag'])) $flag=htmlentities($_GET['flag'], ENT_QUOTES); else $flag="";
				//if(isset($_GET['msg'])) $msg=htmlentities($_GET['msg'], ENT_QUOTES); else $msg=""; 
				//handling ends
                //handling server data (for subscribe action)
                $bnpobj= new BookNowPage(); //$bnpobj->testObj();
                $title="Welcome to AUTOWORLD"; $titleimg=""; $cssfilename="./styles.css"; $cssmobile="stylesmobile.css";
                $data=array("title"=>"$title", "titleimg"=>"$titleimg", "cssfilename"=>"$cssfilename", "cssmobile"=>"$cssmobile");
                $bnpobj->setPList($data);
                $bnpobj->htmlHead();
                $link=$bnpobj->connect();
                $productrss=$bnpobj->selectRecords($fields=array("*"), $tables=array("services"), "WHERE `sid`= ".$sid);
                $link=$bnpobj->closeLink();
                $link=$bnpobj->connect();
                $productrs=$bnpobj->selectRecords($fields=array("*"), $tables=array("services"), "");
                $link=$bnpobj->closeLink();
                if(strcmp($b, "Subscribe")==0){ //echo "if Subscribe button is clicked";
                    if( (strcmp($sname, "Your Name")==0) || (strcmp($email, "Your E-mail")==0) ) $msg="Please enter your name and e-mail address";
                    else{
                        $link=$bnpobj->connect();
                        $rs=$bnpobj->selectRecords($fields=array("*"), $tables=array("subscribe"), " WHERE subscribe.email=\"$email\"");
                        if($row=$rs->fetch()) $msg="This email address is already subscribed!";
                        else{
                            $res=$bnpobj->insertRecords("subscribe", $fields=array("sname", "email"), $values=array("$sname", "$email"));
                            if($res==-1) $msg="Error!";
                            else $msg="Your subscription is successful! Thank you!!<a href=\"./chome.php\">CONTINUE</a>";
                        }
                        $link=$bnpobj->closeLink();
                    }
                }
                
				$bnpobj->pageBody($msg,$productrs,$sid,$productrss);
			?>
			
			
