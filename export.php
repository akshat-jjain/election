<?php
	$conn = mysqli_connect('localhost','','','database');

// $fields = array('id','vidhanSabha', 'fullName', 'fhName', 'age', 'aadhar', 'boothNumber','voterNumber','address','city','district','caste','subcaste','mobileNumber','occupation','wardNumber','remark1','remark2','remark3','other'); 
  
$query = mysqli_query($conn,"SELECT * FROM registration"); 
$tasks = array();
while( $rows = mysqli_fetch_assoc($query) ) {
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
