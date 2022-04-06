<?php
    $conn = mysqli_connect('localhost','','','database');
    $id = $_GET['id'];
    $get = mysqli_query($conn,"Select * from `registration` where id = ".$id." ");
    $result = mysqli_fetch_array($get);

    if (isset($_POST['update'])){
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
        // $pNo=$_POST['pNo'];
        $buildingName=$_POST['buildingName'];
        // $area1=$_POST['area1'];
        // $area2=$_POST['area2'];
        $city=$_POST['city'];
        $district=$_POST['district'];
        $mobileNumber=$_POST['mobileNumber'];
        $occupation=$_POST['occupation'];
        $remark1=$_POST['remark1'];
        $remark2=$_POST['remark2'];
        $remark3=$_POST['remark3'];
        $other=$_POST['other'];
        $address=$buildingName;

        $put = mysqli_query($conn,"Update registration Set 
            vidhanSabha = '".$vidhanSabha."',
            wardNumber  = '".$wardNumber."',
            nagarPalika  = '".$nagarPalika."',
            boothNumber = '".$boothNumber."',
            boothName = '".$boothName."',
            religion = '".$religion."',
            name = '".$name."', 
            surname = '".$surname."', 
            caste = '".$caste."',
            subcaste = '".$subcaste."',
            fhName = '".$fhName."', 
            gender = '".$gender."', 
            age = '".$age."', 
            aadhar = '".$aadhar."', 
            voterNumber = '".$voterNumber."',
            address = '".$address."',
            city = '".$city."',
            district = '".$district."',
            mobileNumber = '".$mobileNumber."',
            occupation = '".$occupation."',
            wardNumber = '".$wardNumber."',
            remark1 = '".$remark1."',remark2 = '".$remark2."',remark3 = '".$remark3."',other = '".$other."'
            where id = '".$id."' ");
        header("Location: ./view-data.php");
        $update = "Update successfully...";
    }
?>
<!DOCTYPE html>
<html>
   <head>
      <title>Update Page</title>
      <!--<link rel="stylesheet" type="text/css" href="./css/bootstrap.css" /> -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
         crossorigin="anonymous">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="container">
         <div class="col form-group-md-6 form-group-md-offset-3 ">
            <div class="panel panel-primary">
               <div class="panel-heading text-center">
                  <h1>Data Update Form</h1>
               </div>
               <div class="panel-body">
                  <form action="" method="post">
                     <div class="row">
                        <div class="form-group col">
                           <label for="vidhanSabha">Vidhan Sabha</label>
                           <input type="text" class="form-control" id="vidhanSabha" name="vidhanSabha" value="<?php echo $result['vidhanSabha']; ?>" placeholder="" />
                        </div>
                        <div class="form-group col">
                           <label for="wardNumber">Ward Number</label>
                           <input type="text" class="form-control" id="wardNumber" value="<?php echo $result['wardNumber']; ?>"  name="wardNumber"  placeholder=""  />
                        </div>
                        <div class="form-group col">
                           <label for="nagarPalika">Nagar Palika / Nagar Nigam</label>
                           <input type="text" class="form-control" id="nagarPalika" value="<?php echo $result['nagarPalika']; ?>"  name="nagarPalika" placeholder=""  />
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col">
                           <label for="boothNumber">Polling Booth Number</label>
                           <input type="text" class="form-control" id="boothNumber" value="<?php echo $result['boothNumber']; ?>"  name="boothNumber" placeholder=""  />
                        </div>
                        <div class="form-group col">
                           <label for="boothName">Polling Booth Name</label>
                           <input type="text" class="form-control" id="boothName" value="<?php echo $result['boothName']; ?>"  name="boothName" placeholder=""  />
                        </div>
                        <div class="col form-group">
                           <label for="religion">Religion</label>
                           </br>
                           <select name="religion" id="religion" class="form-select" >
                              <option value="">Select Religion</option>
                              <option value="Hindu">Hindu</option>
                              <option value="Islam">Islam</option>
                              <option value="Sikh">Sikh</option>
                              <option value="Christian">Christian</option>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col">
                           <label for="name">Name</label>
                           <input type="text" class="form-control" id="name" value="<?php echo $result['name']; ?>"  name="name" placeholder="" />
                        </div>
                        <div class="form-group col">
                           <label for="surname">Surname</label>
                           <input type="text" class="form-control" id="surname" value="<?php echo $result['surname']; ?>"  name="surname" placeholder="" />
                        </div>
                        <div class="form-group col">
                           <label for="caste">Caste</label>
                           <select name="caste" id="caste" class="form-control">
                              <option value="General">General</option>
                              <option value="OBC">OBC</option>
                              <option value="ST/SC">ST/SC</option>
                           </select>
                        </div>
                        <div class="form-group col">
                           <label for="subcaste">Sub Caste</label>
                           <input type="text" class="form-control" id="subcaste" value="<?php echo $result['subcaste']; ?>"  name="subcaste" placeholder="" />
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col">
                           <label for="fhName">Father/Husband Name</label>
                           <input type="text" class="form-control" id="fhName" value="<?php echo $result['fhName']; ?>"  name="fhName" placeholder="" />
                        </div>
                        <div class="col form-group">
                           <label for="gender">Gender</label>
                           </br>
                           <select name="gender" id="gender" class="form-select" >
                              <option value="">Select Gender</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Other">Other</option>
                           </select>
                        </div>
                        <div class="col form-group">
                           <label for="age">Age</label>
                           </br>
                           <select name="age" id="age" class="form-select" >
                              <option value="">Select Age</option>
                              <option value="18-21">18-21</option>
                              <option value="22-30">22-30</option>
                              <option value="31-50">31-50</option>
                              <option value="51-65">51-65</option>
                              <option value="Above 65">Above 65</option>
                           </select>
                        </div>
                        <div class="form-group col">
                           <label for="aadhar">Aadhar Number</label>
                           <input type="text" class="form-control" id="aadhar"  value="<?php echo $result['aadhar']; ?>"  name="aadhar" placeholder="" />
                        </div>
                        <div class="form-group col">
                           <label for="voterNumber">Voter Number</label>
                           <input type="text" class="form-control" id="voterNumber"  value="<?php echo $result['voterNumber']; ?>" name="voterNumber" placeholder=""  />
                        </div>
                     </div>
                     <div class="row">
                        <label for="Address">Address</label>
                        <div class="form-group col">
                           <input type="text" class="form-control" id="buildingName"  name="buildingName" value="<?php echo $result['address']; ?>"  placeholder="Address"/>
                        </div>
                        <div class="form-group col">
                           <input type="text" class="form-control" id="city"  value="<?php echo $result['city']; ?>"  name="city" placeholder="City"/>
                        </div>
                        <div class="form-group col">
                           <input type="text" class="form-control" id="district"  value="<?php echo $result['district']; ?>"  name="district" placeholder="District"/>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col">
                           <label for="mobileNumber">Mobile Number</label>
                           <input type="text" class="form-control" id="phoneNumber" value="<?php echo $result['mobileNumber']; ?>"  name="mobileNumber" placeholder=""/>
                        </div>
                        <div class="col form-group">
                           <label for="occupation">Occupation</label>
                           <select name="occupation" id="occupation" class="form-select" >
                              <option value="">Select Occupation</option>
                              <option value="Student">Student</option>
                              <option value="Self-Employed">Self-Employed</option>
                              <option value="Govt Employee">Govt. Employee</option>
                              <option value="Private Service">Private Service</option>
                              <option value="Business Man">Business Man</option>
                           </select>
                        </div>
                     </div>
                     <div class="row">
                        <div class="form-group col">
                           <label for="Remark">Remark</label>
                           <input type="text" class="form-control" id="remark1" value="<?php echo $result['remark1']; ?>"   name="remark1" placeholder="Remark 1"/>
                        </div>
                        <div class="form-group col">
                           <label for="Remark">Remark</label>
                           <input type="text" class="form-control" id="remark2" value="<?php echo $result['remark2']; ?>"   name="remark2" placeholder="Remark 2"/>
                        </div>
                        <div class="form-group col">
                           <label for="Remark">Remark</label>
                           <input type="text" class="form-control" id="remark3" value="<?php echo $result['remark3']; ?>"   name="remark3" placeholder="Remark 3"/>
                        </div>
                        <div class="form-group col">
                           <label for="other">Others</label>
                           <input type="text" class="form-control" id="other" value="<?php echo $result['other']; ?>"  name="other" />
                        </div>
                     </div>
                     <input type="submit" name="update" class="btn btn-primary" value="Update" />
                  </form>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
