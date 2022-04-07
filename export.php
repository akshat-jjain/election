<?php
	$conn = mysqli_connect('localhost','','','database');

// $fields = array('id','vidhanSabha', 'fullName', 'fhName', 'age', 'aadhar', 'boothNumber','voterNumber','address','city','district','caste','subcaste','mobileNumber','occupation','wardNumber','remark1','remark2','remark3','other'); 
$type = array_pop($_GET);
if ($type == "basic"){
    $query = "";
    $filters = array("vidhanSabha", "wardNumber", "nagarPalika", "boothNumber", "boothName", "religion", "name", "surname", "caste", "subcaste", "fhName", "gender", "age", "aadhar", "voterNumber", "city", "district", "mobileNumber", "occupation");
    $q = $_GET['q'];
    $query = implode(" = '$q' Or ",$filters);
    $query .= "= '$q'";
    $result = mysqli_query($conn,"Select * from `registration` where $query");
}else if($type == "advanced" ){
    $query = [];
    foreach ($_GET as $key => $val){
        if(!empty($val)){
            $query[] = " $key = '$val' ";
        }
    }
    if (!empty($query)){
        $query = implode(" And ",$query);
        $result = mysqli_query($conn,"Select * from `registration` where $query");
    }else{
        $result = mysqli_query($conn,"Select * from `registration`");
    }
}else{
    $result = mysqli_query($conn,"SELECT * FROM registration"); 
}
$tasks = array();
while( $rows = mysqli_fetch_assoc($result) ) {
$tasks[] = $rows;
}

$filename = "data_export_".date('Ymd') . ".xls";		 
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$filename\"");
ExportFile($tasks);
exit();

function ExportFile($records) {
	$heading = false;
		if(!empty($records))
		  foreach($records as $row) {
			if(!$heading) {
			  // display field/column names as a first row
			  echo implode("\t", array_keys($row)) . "\n";
			  $heading = true;
			}
			echo implode("\t", array_values($row)) . "\n";
		  }
		exit;
}
