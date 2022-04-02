<?php
	$vidhanSabha=$_POST['vidhanSabha'];
	$fullName = $_POST['fullName'];
	$fhName = $_POST['fhName'];
	$age = $_POST['age'];
	$aadhar = $_POST['aadhar'];
	$boothNumber = $_POST['boothNumber'];
	$voterNumber = $_POST['voterNumber'];
	$pNo=$_POST['pNo'];
	$buildingName=$_POST['buildingName'];
	$area1=$_POST['area1'];
	$area2=$_POST['area2'];
	$city=$_POST['city'];
	$district=$_POST['district'];
	$caste=$_POST['caste'];
	$subcaste=$_POST['subcaste'];
	$mobileNumber=$_POST['mobileNumber'];
	$occupation=$_POST['occupation'];
	$wardNumber=$_POST['wardNumber'];
	$remark1=$_POST['remark1'];
	$remark2=$_POST['remark2'];
	$remark3=$_POST['remark3'];
	$other=$_POST['other'];
	$address=$pNo.' '.$buildingName.' '.$area1.' '.$area2;

	$conn = new mysqli('localhost','','','database');
	if($conn->connect_error){
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(vidhanSabha, fullName, fhName, age, aadhar, boothNumber,voterNumber,address,city,district,caste,subcaste,mobileNumber,occupation,wardNumber,remark1,remark2,remark3,other) values(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)");
		$stmt->bind_param("sssssiisssssssissss", $vidhanSabha,$fullName,$fhName,$age,$aadhar,$boothNumber,$voterNumber,$address,$city,$district,$caste,$subcaste,$mobileNumber,$occupation,$wardNumber,$remark1,$remark2,$remark3,$other);
		$execval = $stmt->execute();
		$stmt->close();
		$conn->close();
        header("Location: ./backend.html");
		$result = "Registration successfully...";
	}
?>
