<?php
	$conn = mysqli_connect('localhost','','','database');
    $id = $_GET['id'];
    $get = mysqli_query($conn,"Select * from `registration` where id = ".$id." ");
    $result = mysqli_fetch_array($get);

    if (isset($_POST['update'])){
        $vidhanSabha=$_POST['vidhanSabha'];
        $fullName = $_POST['fullName'];
        $fhName = $_POST['fhName'];
        $age = $_POST['age'];
        $aadhar = $_POST['aadhar'];
        $boothNumber = $_POST['boothNumber'];
        $voterNumber = $_POST['voterNumber'];
        // $pNo=$_POST['pNo'];
        $buildingName=$_POST['buildingName'];
        // $area1=$_POST['area1'];
        // $area2=$_POST['area2'];
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
        $address=$buildingName;

        $put = mysqli_query($conn,"Update registration Set 
            vidhanSabha = '".$vidhanSabha."', 
            fullName = '".$fullName."', 
            fhName = '".$fhName."', 
            age = '".$age."', 
            aadhar = '".$aadhar."', 
            boothNumber = '".$boothNumber."',
            voterNumber = '".$voterNumber."',
            address = '".$address."',
            city = '".$city."',
            district = '".$district."',
            caste = '".$caste."',
            subcaste = '".$subcaste."',
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
                <label for="vidhanSabha">VidhanSabha</label>
                <input type="text" class="form-control" id="vidhanSabha" name="vidhanSabha" value="<?php echo $result['vidhanSabha']; ?>"  />
              </div>
              <div class="form-group col">
                <label for="boothNumber">Polling Booth Number</label>
                <input type="text" class="form-control" id="boothNumber" value="<?php echo $result['boothNumber']; ?>"  name="boothNumber" />
              </div>
              <div class="form-group col">
                <label for="voterNumber">Voter Number</label>
                <input type="text" class="form-control" id="voterNumber"  value="<?php echo $result['voterNumber']; ?>" name="voterNumber" />
              </div>
              <div class="form-group col">
                <label for="wardNumber">Ward Number</label>
                <input type="text" class="form-control" id="wardNumber" value="<?php echo $result['wardNumber']; ?>"  name="wardNumber" />
              </div>
              </div>
            <div class="row">
              <div class="form-group col">
                <label for="fullName">Full Name</label>
                <input type="text" class="form-control" id="fullName" value="<?php echo $result['fullName']; ?>"  name="fullName" />
              </div>
              <div class="form-group col">
                <label for="fhName">Father/Husband Name</label>
                <input type="text" class="form-control" id="fhName" value="<?php echo $result['fhName']; ?>"  name="fhName"/>
              </div>
              <div class="form-group col">
                <label for="number">Select your age</label>
              </br>
                <select name="age" id="age" class="form-control">
                  <option value="18-21">18-25</option>
                  <option value="21-30">21-30</option>
                  <option value="30-50">30-50</option>
                  <option value="above 50">above 50</option>
                </select>
              </div>
              <div class="form-group col">
                <label for="aadhar">Aadhar Number</label>
                <input type="text" class="form-control" id="aadhar"  value="<?php echo $result['aadhar']; ?>"  name="aadhar" />
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
                <label for="caste">Caste</label>
                <select name="caste" id="caste" class="form-control">
                  <option value="general">General</option>
                  <option value="OBC">OBC</option>
                  <option value="ST/SC">ST/SC</option>
                </select>
              </div>
              <div class="form-group col">
                <label for="subcaste">Sub Caste</label>
                <input type="text" class="form-control" id="subcaste" value="<?php echo $result['subcaste']; ?>"  name="subcaste"/>
              </div>
              <div class="form-group col">
                <label for="mobileNumber">Mobile Number</label>
                <input type="text" class="form-control" id="phoneNumber" value="<?php echo $result['mobileNumber']; ?>"  name="mobileNumber"/>
              </div>
              <div class="form-group col">
                <label for="occupation">Occupation</label>
                <input type="text" class="form-control" id="occupation" value="<?php echo $result['occupation']; ?>"  name="occupation" />
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
