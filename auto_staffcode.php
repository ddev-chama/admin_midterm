<?php 
require 'inc_db.php';
$searchTerm = $_POST["name"];
    
    //get matched data from skills table
    $query = "SELECT * FROM staffs WHERE StaffName = '".$searchTerm."' ";
    //print($query);
   $result = mysql_query($query);
   if($result){
    while ($row = mysql_fetch_array($result)) {
        $data = $row['StaffCode'];
    	}
        if (!isset($data)) {
        print("");
    }
    else{
        print($data);
    }
	}
    if (!$result) {
    		$data = "";
            print($data);
    	}	
    
    
    //return json data
    
?>