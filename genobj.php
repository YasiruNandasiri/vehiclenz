<?php
/*Feb 21, 2019 (Thu). Author: YP@C2L3.
  Purpose: Generic Object class of yFramework 
  Version: 1.1
*/

class GenObj{
	private $conndet = array("host"=>"localhost", "db"=>"vehiclenz", "charset"=>"utf8", "u"=>"root", "p"=>"raheyanaleen");
	private $conn=NULL; 
	
	private $plist=array();
	
	function testObj(){
	  echo "This is a test of GenObj!</BR>";
	}
	
	function setPList($data=array()){
	  $this->plist=$data;
	}
	
	function setData($key, $val){
	  $this->plist["$key"]=$val;
	}
	
	function getAllData(){
	  return $this->plist;
	}
	
	function getData($key){
	  return $this->plist["$key"];
	}
				  
	function connect(){	//echo "connecting to database!";
		try{
			$this->conn = new PDO("mysql:host=". $this->conndet['host']. 
			";dbname=". $this->conndet['db']. ";charset=". $this->conndet['charset'], $this->conndet['u'], $this->conndet['p']);
			//new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
		}
		catch (PDOException $e){
			echo "Connection failed: ". $e->getMessage();
		}
		return $this->conn;
	}
	
	function closeLink(){ //echo "Closing DB connection";
	  $this->conn=NULL;
	}
	
	function selectRecords($fields=array(), $tables=array(), $whr){
		$nofields=count($fields); $notables=count($tables);
		$fieldStr=""; $tableStr="";
		$i=0; 
		while($i<$nofields){
			if($i>0) $fieldStr=$fieldStr.","; //x=x+1
			$fieldStr=$fieldStr.$fields[$i];
			$i++;
		}
		$j=0; 
		while($j<$notables){
			if($j>0) $tableStr=$tableStr.",";
			$tableStr=$tableStr.$tables[$j];
			$j++;
		}
		$sql="SELECT $fieldStr FROM $tableStr $whr"; //echo "</br>". $sql;
		if($rs=$this->conn->query($sql)) return $rs;
		return -1;
	}
	
	function insertRecords($table, $fields=array(), $values=array()){
		$nofields=count($fields); $novalues=count($values);
		$fieldStr=""; $valueStr="";
		$i=0; 
		while($i<$nofields){
			if($i>0) $fieldStr=$fieldStr.",";
			$fieldStr=$fieldStr. $fields[$i];
			$i++;
		}
		$j=0; 
		while($j<$novalues){
			if($j==$novalues-1) $valueStr=$valueStr. "'$values[$j]'";
			else $valueStr=$valueStr. "'$values[$j]',";
			$j++;
		}
		$sql="INSERT INTO $table ($fieldStr) VALUES($valueStr)"; //echo "</br>". $sql;
			if($rs=$this->conn->query($sql)) return $rs;
			else return -1;
	}

	function updateRecords($table, $fields=array(), $values=array(), $whr){
        $nofields=count($fields); $novalues=count($values);
        $setStr=""; 
        $i=0; $j=0; 
        while($i<$nofields){
            $j=$i;
            while($j<$novalues){
              if($j==$novalues-1) $setStr="$setStr". "$fields[$i]='$values[$j]'";
              else $setStr="$setStr". "$fields[$i]='$values[$j]'". ",";
              $j=$nofields;
            }
            $i++;
        }
        $sql="UPDATE $table SET $setStr $whr"; //echo "</br>". $sql;
        if($rs=$this->conn->query($sql)) return $rs;
        else return -1;
    }
    
    function deleteRecords($table, $whr){
        $sql="DELETE FROM $table $whr"; //echo "</br>". $sql;
        if($rs=$this->conn->query($sql)) return $rs;
        else return -1;
    }
}
?>

<?php //echo "Testing of the Generic class"; ?>
