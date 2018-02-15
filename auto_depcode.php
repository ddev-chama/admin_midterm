<?php 
require 'inc_db.php';
$searchTerm = $_POST["name"];
    
    //get matched data from skills table
    $query = "SELECT * FROM departments WHERE DepName = '".$searchTerm."' ";
   // print($query);
   $result = mysql_query($query);
   if($result){
    while ($row = mysql_fetch_array($result)) {
        $data = $row['DepCode'];
    	}
        if (!isset($data)) {
        print("Data not found");
    }
    else{
        print($data);
    }
	}
    if (!$result) {
    		$data = "Data not found";
            print($data);
    	}	
    
    
    //return json data
    
?>