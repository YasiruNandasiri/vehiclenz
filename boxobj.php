<?php
/*August 09, 2023 (Wed). Author: YP@C2L3. 
  Purpose: Box class of yFramework 2.0. 
  Version: 2.0
*/

require_once("genobj.php");

class BoxObj extends GenObj{
  //private static $i=0;
  
  function testObj(){
	  echo "This is a test of BoxObj!";
	}
	
	function draw(){ //echo "Testing the draw function!";
		$stylename=$this->getData("stylename"); $content=$this->getData("content");
?>
			<div class="<?php echo $stylename; ?>">
				<?php echo $content; ?>
			</div>
<?php
	}
	
	function draw1($stylename, $content){ //echo "Testing the draw1 function!";
?>
			<div class="<?php echo $stylename; ?>">
				<?php echo $content; ?>
			</div>
<?php
	}
}
?>

<?php //echo "Testing of the Box class"; ?>

