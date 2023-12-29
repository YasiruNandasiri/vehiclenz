<?php
/*This is a simple factory pattern application for generating CSS (and other necessary, when required) file/s using PHP+MySQL on Apache (Ubuntu Linux).
	Author: YP@C2L3.
  Created on August 10, 2023 (Wed) @ C2L3.
  Version: 1.1
*/

require_once("genobj.php");

class FacObj extends GenObj{
	//property list
  
  function testObj(){
	  echo "This is a test of FactoryObj!";
	}
	
	function writeData($filename, $mode, $data){
		//echo $filename. "</br>". $data; 
		$wdata=fopen($filename, $mode);		
		if($wdata==false){ 
			echo "Error opening file". $filename;
		}else{ // if(flock($filename, LOCK_EX)){ //exculsive lock
			//echo "writing data";
			fwrite($wdata, $data);
			//flock($filename, LOCK_UN); //release the exclusive lock
		}/*else{
			echo "File exclusive locking error!";
		}*/
		fclose($wdata);
	}
	
	function cssFactory(){
		//generating styles.css
		$link=$this->connect();
		$rs1=$this->selectRecords($fields=array("*"), $tables=array("styles"), " ");
		
		$filename="./styles.css"; 
		$this->writeData($filename, "w", ""); //open the file cleaning all its content
		
		while($row1=$rs1->fetch()){
			$styleid=$row1["styleid"]; $boxtype=$row1["boxtype"];
			$stylename=$row1["stylename"]; $margin=$row1["margin"];
			$border=$row1["border"]; $padding=$row1["padding"];
			$width=$row1["width"]; $maxwidth=$row1["max-width"];
			$height=$row1["height"]; $maxheight=$row1["max-height"];
			$backgroundcolor=$row1["background-color"]; $float1=$row1["float1"];
			$color=$row1["color"]; $fontfamily=$row1["font-family"];
			$fontsize=$row1["font-size"]; $boxsizing=$row1["box-sizing"];
			
			$data=".". $stylename. "{";
			$data=$data. "margin: ". $margin. ";";
			$data=$data. "border: ". $border. ";";
			$data=$data. "padding: ". $padding. ";";
			$data=$data. "width: ". $width. ";";
			$data=$data. "max-width: ". $maxwidth. ";";
			$data=$data. "height: ". $height. ";";
			$data=$data. "max-height: ". $maxheight. ";";
			$data=$data. "background-color: ". $backgroundcolor. ";";
			$data=$data. "float: ". $float1. ";";
			$data=$data. "color: ". $color. ";";
			$data=$data. "font-family: ". $fontfamily. ";";
			$data=$data. "font-size: ". $fontsize. ";";
			$data=$data. "box-sizing: ". $boxsizing. ";";
			$data=$data. "}";
			
			$this->writeData($filename, "a+", $data); //a+ = append data
		}
		
		//generating stylesmobile.css
		$rs2=$this->selectRecords($fields=array("*"), $tables=array("stylesmobile"), " ");
		
		$filename1="./stylesmobile.css"; 
		$this->writeData($filename1, "w", ""); //open the file cleaning all its content
		
		while($row2=$rs2->fetch()){
			$styleid=$row2["styleid"]; $boxtype=$row2["boxtype"];
			$stylename=$row2["stylename"]; $margin=$row2["margin"];
			$border=$row2["border"]; $padding=$row2["padding"];
			$width=$row2["width"]; $maxwidth=$row2["max-width"];
			$height=$row2["height"]; $maxheight=$row2["max-height"];
			$backgroundcolor=$row2["background-color"]; $float1=$row2["float1"];
			$color=$row2["color"]; $fontfamily=$row2["font-family"];
			$fontsize=$row2["font-size"]; $boxsizing=$row2["box-sizing"];
						
			$data=".". $stylename. "{";
			$data=$data. "margin: ". $margin. ";";
			$data=$data. "border: ". $border. ";";
			$data=$data. "padding: ". $padding. ";";
			$data=$data. "width: ". $width. ";";
			$data=$data. "max-width: ". $maxwidth. ";";
			$data=$data. "height: ". $height. ";";
			$data=$data. "max-height: ". $maxheight. ";";
			$data=$data. "background-color: ". $backgroundcolor. ";";
			$data=$data. "float: ". $float1. ";";
			$data=$data. "color: ". $color. ";";
			$data=$data. "font-family: ". $fontfamily. ";";
			$data=$data. "font-size: ". $fontsize. ";";
			$data=$data. "box-sizing: ". $boxsizing. ";";
			$data=$data. "}";
			
			$this->writeData($filename1, "a+", $data); //a+ = append data
		}		
		
		$link=$this->closeLink();
	}//end of css factory
	
	function pageFactory(){
		//generating vpage.php
		$link=$this->connect();
		$rs1=$this->selectRecords($fields=array("*"), $tables=array("page"), " ");
		while($row=$rs1->fetch()){
			$pid=$row["pid"];
			$vpage=$row["vpage"]; 
			$cpage=$row["cpage"];
			$pclassname=$row["pclassname"]; 
			$pcontent=$row["pcontent"]; 
			//echo $age=$row["age"]; echo "</BR>";
		
			$filename="./$vpage"; 
			$this->writeData($filename, "w", ""); //open the file cleaning all its content
			
			$phptags=htmlentities("<", ENT_HTML5); //converts characters to HTML entities. //echo $phptags;
			$phptags=html_entity_decode($phptags, ENT_HTML5); //the opposite of htmlentities() //echo $phptags;
			$this->writeData($filename, "a+", $phptags); //a+ = append data
			$data="?php "; $this->writeData($filename, "a+", $data);
			$data=" 
				/*comments, if any */ 
				//session_start(); 
				require_once(\"pageobj.php\");
				class $pclassname extends PageObj{
				
				
					//add if required

					function testObj(){
						echo \"This is a test of $pclassname.Obj!\";
					}
					
					function htmlHead(){ //HTML head content. This is common to all UI pages. Can override as appropriate! param=\$title, \$titleimg, 						\$cssfilename
						\$this->setMetaOnHtmlHead();
					 	
					 	echo \"<!--setting required internal styles for the -->
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
					 	
					</head>\"; 
				
					}
					
					function pageBody(\$msg){
						echo \"<strong><big><center><font face=\\\"Trebuchet MS\\\" color=\\\"#c0392b\\\" size=\\\"+3\\\">\$msg</font></center></big></strong>\";
				
						echo \"<!--body of the page begins!-->
						<body bgcolor=\\\" #fdfefe \\\">
							<div> <!--main-->\";
								\$this->pageTop(); 
								\$this->pageContent($pid);
								\$this->pageFooter();			
							echo \"</div> <!--end main-->
					</body>
				</html>\";
					}
				}
				?";
			$this->writeData($filename, "a+", $data);
			$phptags=htmlentities(">", ENT_HTML5); //echo $phptags;
			$phptags=html_entity_decode($phptags, ENT_HTML5); //echo $phptags;
			$this->writeData($filename, "a+", $phptags);
			
			//generating cpage.php
			$filename1="./$cpage"; 
			$this->writeData($filename1, "w", ""); //open the file cleaning all its content
			$phptags=htmlentities("<", ENT_HTML5); //converts characters to HTML entities. //echo $phptags;
			$phptags=html_entity_decode($phptags, ENT_HTML5); //the opposite of htmlentities() //echo $phptags;
			$this->writeData($filename1, "a+", $phptags); //a+ = append data
			$data1="?php "; $this->writeData($filename1, "a+", $data1);
			$data1="
				/*Aug 19, 2023 (Sat). Author: YP@C2L3.
					Purpose: Controller file for vhome.php
					Version: 1.0
				*/

				require_once(\"$vpage\");
				
				//HomePage implementation begins
				//handling warnings, url data, meesages and input data sanitization
			 	\$b=\"\"; 
				\$msg=\"\"; //\$flag=\"\"; 
			 	
				if(isset(\$_GET['submit'])) \$b=htmlentities(\$_GET['submit'], ENT_QUOTES); else \$b=\"\";
				if(isset(\$_GET['sname'])) \$sname=htmlentities(\$_GET['sname'], ENT_QUOTES); else \$sname=\"\";
				if(isset(\$_GET['email'])) \$email=htmlentities(\$_GET['email'], ENT_QUOTES); else \$email=\"\";
				//echo \$b;
				//if(isset(\$_GET['flag'])) \$flag=htmlentities(\$_GET['flag'], ENT_QUOTES); else \$flag=\"\";
				//if(isset(\$_GET['msg'])) \$msg=htmlentities(\$_GET['msg'], ENT_QUOTES); else \$msg=\"\"; 
				//handling ends
		
				\$hpobj= new $pclassname(); //\$hpobj->testObj();
				\$title=\"Welcome to Sri Lanka Gems!\"; \$titleimg=\"\"; \$cssfilename=\"./styles.css\"; \$cssmobile=\"stylesmobile.css\";
				\$data=array(\"title\"=>\"\$title\", \"titleimg\"=>\"\$titleimg\", \"cssfilename\"=>\"\$cssfilename\", \"cssmobile\"=>\"\$cssmobile\");
				\$hpobj->setPList(\$data);
				\$hpobj->htmlHead();
				\$hpobj->pageBody(\$msg);
			?";
			
			$this->writeData($filename1, "a+", $data1);
			$phptags=htmlentities(">", ENT_HTML5); //echo $phptags;
			$phptags=html_entity_decode($phptags, ENT_HTML5); //echo $phptags;
			$this->writeData($filename1, "a+", $phptags);
		}
		$link=$this->closeLink();
	}// end of pageFactory
	
	function feedData(){
		$dirPath="C:/AppServ/www/slgems/thesrilankagems/pages/mainpages/";
		$files=scandir($dirPath); echo $N=count($files); //var_dump($files);
		
		for($i=0; $i<$N; $i++){ echo "</BR>". $filepath1="C:/AppServ/www/slgems/thesrilankagems/pages/mainpages/". $files[$i];
			$data="";
			$wdata=fopen($filepath1, "r");		
			if($wdata==false){ 
				echo "Error opening file";
			}else{ // if(flock($filename, LOCK_EX)){ //exculsive lock
				echo "</BR>inserting data to the db";
				echo $data=fread($wdata, filesize($filepath1)); 
				$link=$this->connect();
				$res=$this->insertRecords("page", $fields=array("vpage", "cpage", "pclassname", "picon", "pgroup", "pcontent"), $values=array("", "", "", "$files[$i]", 0, "$data")); 
				if($res==-1) echo $msg="Error!";
				else echo $msg="File data inserted to db successfully!!<a href=\"http:./chome.php\">CONTINUE</a>";
				$link=$this->closeLink(); 
				//flock($filename, LOCK_UN); //release the exclusive lock
			}/*else{
				echo "File exclusive locking error!";
			}*/
			fclose($wdata);
		}		
	}
	
	/*function extractHTML($filename, $mode){
		//echo $filename. "</br>". $data; 
		$tokens=array(); $tokens1=array();
		$htmlCont="";
		$wdata=fopen($filename, $mode);		
		if($wdata==false){ 
			echo "Error opening file";
		}else{ // if(flock($filename, LOCK_EX)){ //exculsive lock
			//echo "reading data";
			$htmlCont=fread($wdata,filesize($filename)); //echo $htmlCont;
			//echo $htmlCont=file_get_contents($filename);
			//flock($filename, LOCK_UN); //release the exclusive lock
		}/*else{
			echo "File exclusive locking error!";
		}*/
		/*fclose($wdata); //echo "end!";
		//$pattern="img"; $res=array();
		//preg_match($pattern, $htmlCont1, $res, PREG_OFFSET_CAPTURE); var_dump($res);
		$tokens=explode("<body>", $htmlCont); $tokens=$tokens[1]; $tokens=explode(" ", $tokens);//var_dump($tokens);
		$i=1; echo $tokenLength=count($tokens);
		$this->writeData("./pages/mainpages/0About us.html", "w", ""); //open the file cleaning all its content
		while($i<$tokenLength){ //echo "</BR>". $tokens[$i];
			$this->writeData("./pages/mainpages/0About us.html", "a+", $tokens[$i]. "\n");
			/*$tokens1=explode("=", $tokens[$i]); var_dump($tokens1);
			$j=0;
			while($j<count($tokens1)){
				if(strcmp("src=", $tokens[$j])==0){ echo "\nin if";
				}
				$j++;
			}
			
				do{
					$this->writeData("./pages/mainpages/0About us.html", "a+", $tokens[$i]);
					$i++;
				}while(strcmp("/>", $tokens[$i])==0);
			
			//$this->writeData("./pages/mainpages/0About us.html", "a+", $tokens[$i]);
			$i++;
		}
	}// end of extractHTML*/
	
}//end of class
?>

<?php //echo "Testing of the FactoryObj class"; ?>

<?php	
	echo "</BR>Generating styles (CSS) from table styles and stylesmobile!";	
	$facobj=new FacObj(); $facobj->cssFactory();
	echo "</BR>CSS Generating done!!";
	echo "</BR>Generating vfiles and cfiles from table page!";	
	$facobj->pageFactory();
	//echo "</BR>Page Generating done!!";
	//echo "</BR>Feed data begins!";
	//$facobj->feedData();
	//echo "</BR>Feed data done!!";
	/*echo "</BR>Extracting HTML from the page";	
	$htmlCont1=$facobj->extractHTML("./pages/mainpages/About us.html", "r");
	echo "</BR>HTML extraction done!!";*/
		
	//var_dump($obj->getAllData());   
?>

