<?php
	$vidhanSabha=$_POST['vidhanSabha'];
	$wardNumber=$_POST['wardNumber'];
	$nagarPalika=$_POST['nagarPalika'];
	$boothNumber = $_POST['boothNumber'];
	$boothName = $_POST['boothName'];
	$religion = $_POST['religion'];
	$name = $_POST['name'];
	$surname = $_POST['surname'];
	$caste=$_POST['caste'];
	$subcaste=$_POST['subcaste'];
	$fhName = $_POST['fhName'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$aadhar = $_POST['aadhar'];
	$voterNumber = $_POST['voterNumber'];
	$pNo=$_POST['pNo'];
	$buildingName=$_POST['buildingName'];
	$area1=$_POST['area1'];
	$area2=$_POST['area2'];
	$city=$_POST['city'];
	$district=$_POST['district'];
	$mobileNumber=$_POST['mobileNumber'];
	$occupation=$_POST['occupation'];
	$remark1=$_POST['remark1'];
	$remark2=$_POST['remark2'];
	$remark3=$_POST['remark3'];
	$other=$_POST['other'];
	$address=$pNo.' '.$buildingName.' '.$area1.' '.$area2;

	$conn = new mysqli('localhost','','','database');
	if($conn->connect_error){
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration 
            (vidhanSabha, wardNumber, nagarPalika, boothNumber, boothName, religion, name, surname, caste, subcaste, fhName, gender, age, aadhar, voterNumber, address, city, district, mobileNumber, occupation, remark1, remark2, remark3, other) 
        values
        (
            ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? , ? ,? , ? , ? , ? , ? 
        )");
		$stmt->bind_param("sisissssssssssssssssssss", 
        $vidhanSabha,$wardNumber,$nagarPalika,$boothNumber,$boothName,$religion,$name,$surname,$caste,$subcaste,$fhName,$gender,$age,$aadhar,$voterNumber,$address,$city,$district,$mobileNumber,$occupation,$remark1,$remark2,$remark3,$other);
		$execval = $stmt->execute();
		$stmt->close();
		$conn->close();
        	header("Location: ./backend.html");
		$result = "Registration successfully...";
	}
?>
