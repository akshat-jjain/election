<!DOCTYPE html>
<html>
   <head>
      <title>Advance Search</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
         crossorigin="anonymous">
      <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
      <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
      <style>
        body {
            color: #566787;
            background: #f7f5f2;
            font-family: 'Roboto', sans-serif;
        }
        .table-responsive {
            margin: 30px 0;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            color: #fff;
            background: #40b2cd;		
            padding: 16px 25px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        table.table {
            margin-top: 15px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
      a.material-icons{text-decoration:inherit;color:inherit}
      </style>
   </head>
   <body>
   <?php 
	$conn = mysqli_connect('localhost','','','database');
    $params = end(explode("?",$_SERVER['REQUEST_URI'])) ;
    $type = array_pop($_GET);
    if ($type == "basic"){
        $query = "";
        $filters = array("vidhanSabha", "wardNumber", "nagarPalika", "boothNumber", "boothName", "religion", "name", "surname", "caste", "subcaste", "fhName", "gender", "age", "aadhar", "voterNumber", "city", "district", "mobileNumber", "occupation");
        $q = $_GET['q'];
        $query = implode(" = '$q' Or ",$filters);
        $query .= "= '$q'";
        echo $query;
        $result = mysqli_query($conn,"Select * from `registration` where $query"); ?>
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col"><h2><a href="./advance-search.php" class="material-icons">arrow_back</a> Search <b>Results</b></h2></div>
                            <div class="col"><a href="./export.php" target="_top" ><button type="button" class="btn btn-success">Export All</button></a></div>
                            <div class="col"><a href="./export.php?<?php echo $params ;?>" target="_top" ><button type="button" class="btn btn-success">Export Selected</button></a></div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class='text '>#</th>
                            <th class='text '>Vidhan Sabha</th>
                            <th class='number '>Ward Number</th>
                            <th class='text '>Nagar Palika /Nagar Nigam</th>
                            <th class='number '>Booth Number</th>
                            <th class='text '>Booth Name</th>
                            <th class='text '>Religion</th>
                            <th class='text '>Name</th>
                            <th class='text '>Surname</th>
                            <th class='text '>Caste</th>
                            <th class='text '>Sub Caste</th>
                            <th class='text '>Father / Husband Name</th>
                            <th class='text '>Gender</th>
                            <th class='number '>Age</th>
                            <th class='number '>Aadhar</th>
                            <th class='number '>Voter Number</th>
                            <th class='text '>Address</th>
                            <th class='text '>City</th>
                            <th class='text '>District</th>
                            <th class='number '>Mobile Number</th>
                            <th class='text '>Occupation</th>
                            <th class='text '>Remark 1</th>
                            <th class='text '>Remark 2</th>
                            <th class='text '>Remark 3</th>
                            <th class='text '>Other</th>
                            <th class='text '>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cnt = 1; 
                    If (mysqli_num_rows($result) > 0) { while ($row = mysqli_fetch_array($result)) { ?>
                        <tr data-filter="active">
                            <td class='text ' data-title='id'><?php echo $cnt; ?></td>
                            <td class='text ' data-title='vidhanSabha'><?php echo $row['vidhanSabha'] ; ?></td>
                            <td class='number ' data-title='wardNumber'><?php echo $row['wardNumber'] ; ?></td>
                            <td class='number ' data-title='nagarPalika'><?php echo $row['nagarPalika'] ; ?></td>
                            <td class='number ' data-title='boothNumber'><?php echo $row['boothNumber'] ; ?></td>
                            <td class='number ' data-title='boothName'><?php echo $row['boothName'] ; ?></td>
                            <td class='number ' data-title='religion'><?php echo $row['religion'] ; ?></td>
                            <td class='text ' data-title='name'><?php echo $row['name'] ; ?></td>
                            <td class='text ' data-title='surname'><?php echo $row['surname'] ; ?></td>
                            <td class='text ' data-title='caste'><?php echo $row['caste'] ; ?></td>
                            <td class='text ' data-title='subcaste'><?php echo $row['subcaste'] ; ?></td>
                            <td class='text ' data-title='fhName'><?php echo $row['fhName'] ; ?></td>
                            <td class='text ' data-title='gender'><?php echo $row['gender'] ; ?></td>
                            <td class='number ' data-title='age'><?php echo $row['age'] ; ?></td>
                            <td class='number ' data-title='aadhar'><?php echo $row['aadhar'] ; ?></td>
                            <td class='number ' data-title='voterNumber'><?php echo $row['voterNumber'] ; ?></td>
                            <td class='text ' data-title='address'><?php echo $row['address'] ; ?></td>
                            <td class='text ' data-title='city'><?php echo $row['city'] ; ?></td>
                            <td class='text ' data-title='district'><?php echo $row['district'] ; ?></td>
                            <td class='number ' data-title='mobileNumber'><?php echo $row['mobileNumber'] ; ?></td>
                            <td class='text ' data-title='occupation'><?php echo $row['occupation'] ; ?></td>
                            <td class='text ' data-title='remark1'><?php echo $row['remark1'] ; ?></td>
                            <td class='text ' data-title='remark2'><?php echo $row['remark2'] ; ?></td>
                            <td class='text ' data-title='remark3'><?php echo $row['remark3'] ; ?></td>
                            <td class='text ' data-title='other'><?php echo $row['other'] ; ?></td>
                            <td class='text ' data-title='action'><button class="btn btn primary"><a href="./update.php?id=<?php echo $row['ID'] ; ?>">Update</a></button></td>
                        </tr>
                        <?php 
                        $cnt += 1;
                        }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php }else if($type == "advanced" ){
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
        ?>
        <div class="container-xl">
            <div class="table-responsive">
                <div class="table-wrapper">
                    <div class="table-title">
                        <div class="row">
                            <div class="col"><h2><a href="./advance-search.php" class="material-icons">arrow_back</a> Search <b>Results</b></h2></div>
                            <div class="col"><a href="./export.php" target="_top" ><button type="button" class="btn btn-success">Export All</button></a></div>
                            <div class="col"><a href="./export.php?<?php echo $params ;?>" target="_top" ><button type="button" class="btn btn-success">Export Selected</button></a></div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class='text '>#</th>
                            <th class='text '>Vidhan Sabha</th>
                            <th class='number '>Ward Number</th>
                            <th class='text '>Nagar Palika /Nagar Nigam</th>
                            <th class='number '>Booth Number</th>
                            <th class='text '>Booth Name</th>
                            <th class='text '>Religion</th>
                            <th class='text '>Name</th>
                            <th class='text '>Surname</th>
                            <th class='text '>Caste</th>
                            <th class='text '>Sub Caste</th>
                            <th class='text '>Father / Husband Name</th>
                            <th class='text '>Gender</th>
                            <th class='number '>Age</th>
                            <th class='number '>Aadhar</th>
                            <th class='number '>Voter Number</th>
                            <th class='text '>Address</th>
                            <th class='text '>City</th>
                            <th class='text '>District</th>
                            <th class='number '>Mobile Number</th>
                            <th class='text '>Occupation</th>
                            <th class='text '>Remark 1</th>
                            <th class='text '>Remark 2</th>
                            <th class='text '>Remark 3</th>
                            <th class='text '>Other</th>
                            <th class='text '>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $cnt = 1; 
                    If (mysqli_num_rows($result) > 0) { while ($row = mysqli_fetch_array($result)) { ?>
                        <tr data-filter="active">
                            <td class='text ' data-title='id'><?php echo $cnt; ?></td>
                            <td class='text ' data-title='vidhanSabha'><?php echo $row['vidhanSabha'] ; ?></td>
                            <td class='number ' data-title='wardNumber'><?php echo $row['wardNumber'] ; ?></td>
                            <td class='number ' data-title='nagarPalika'><?php echo $row['nagarPalika'] ; ?></td>
                            <td class='number ' data-title='boothNumber'><?php echo $row['boothNumber'] ; ?></td>
                            <td class='number ' data-title='boothName'><?php echo $row['boothName'] ; ?></td>
                            <td class='number ' data-title='religion'><?php echo $row['religion'] ; ?></td>
                            <td class='text ' data-title='name'><?php echo $row['name'] ; ?></td>
                            <td class='text ' data-title='surname'><?php echo $row['surname'] ; ?></td>
                            <td class='text ' data-title='caste'><?php echo $row['caste'] ; ?></td>
                            <td class='text ' data-title='subcaste'><?php echo $row['subcaste'] ; ?></td>
                            <td class='text ' data-title='fhName'><?php echo $row['fhName'] ; ?></td>
                            <td class='text ' data-title='gender'><?php echo $row['gender'] ; ?></td>
                            <td class='number ' data-title='age'><?php echo $row['age'] ; ?></td>
                            <td class='number ' data-title='aadhar'><?php echo $row['aadhar'] ; ?></td>
                            <td class='number ' data-title='voterNumber'><?php echo $row['voterNumber'] ; ?></td>
                            <td class='text ' data-title='address'><?php echo $row['address'] ; ?></td>
                            <td class='text ' data-title='city'><?php echo $row['city'] ; ?></td>
                            <td class='text ' data-title='district'><?php echo $row['district'] ; ?></td>
                            <td class='number ' data-title='mobileNumber'><?php echo $row['mobileNumber'] ; ?></td>
                            <td class='text ' data-title='occupation'><?php echo $row['occupation'] ; ?></td>
                            <td class='text ' data-title='remark1'><?php echo $row['remark1'] ; ?></td>
                            <td class='text ' data-title='remark2'><?php echo $row['remark2'] ; ?></td>
                            <td class='text ' data-title='remark3'><?php echo $row['remark3'] ; ?></td>
                            <td class='text ' data-title='other'><?php echo $row['other'] ; ?></td>
                            <td class='text ' data-title='action'><button class="btn btn primary"><a href="./update.php?id=<?php echo $row['id'] ; ?>">Update</a></button></td>
                        </tr>
                        <?php 
                        $cnt += 1;
                        }} ?>
                    </tbody>
                </table>
            </div>
        </div>
    <?php }else{
?>
      <div class="container">
         <div class="col form-group-md-6 form-group-md-offset-3 ">
            <div id="error_text" style="color:red"></div>
            <!--
            <div class="row heading">
                <h3>Basic Search</h3>
            </div>
            <form action="" id="search" name="search" method="get">
                <div class="row">
                    <div class="form-group">
                        <input type="search" name="q" placeholder="Search ... " class="form-control" />
                        <input type="hidden" name="select" value="basic" />
                    </div>
                </div>
            </form>-->
            <div class="row heading">
                <h3>Advanced Search Options</h3>
            </div>
            <form action="" id="form" class="has-validation" method="get">
               <div class="row">
                  <div class="col form-group">
                     <label for="vidhanSabha">Vidhan Sabha</label>
                     <input type="text" class="form-control" id="vidhanSabha" name="vidhanSabha" placeholder="" minlength="3"/>
                  </div>
                  <div class="col form-group">
                     <label for="wardNumber">Ward Number</label>
                     <input type="number" class="form-control" id="wardNumber" name="wardNumber" placeholder="" minlength="1" maxlength="3" />
                  </div>
                  <div class="col form-group">
                     <label for="nagarPalika">Nagar Palika/ Nagar Nigam</label>
                     <input type="text" class="form-control" id="nagarPalika" name="nagarPalika" placeholder="" minlength="5" maxlength="14" />
                  </div>
               </div>
               <div class="row">
                  <div class="col form-group">
                     <label for="boothNumber">Polling Booth Number</label>
                     <input type="number" class="form-control" id="boothNumber" name="boothNumber" placeholder="" minlength="1" maxlength="5"  />
                  </div>
                  <div class="col form-group">
                     <label for="boothName">Polling Booth Name</label>
                     <input type="text" class="form-control" id="boothName" name="boothName" placeholder="" minlength="5" maxlength="14" />
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
                  <div class="col form-group">
                     <label for="name">Name</label>
                     <input type="text" class="form-control" id="name" placeholder="" minlength="2" name="name" />
                  </div>
                  <div class="col form-group">
                     <label for="surname">Surname</label>
                     <input type="text" class="form-control" id="surname" placeholder="" minlength="2" name="surname" />
                  </div>
                  <div class="col form-group">
                     <label for="caste">Caste</label>
                     <select name="caste" id="caste" class="form-select" >
                        <option value="">Select Caste</option>
                        <option value="General">General</option>
                        <option value="OBC">OBC</option>
                        <option value="ST/SC">ST/SC</option>
                     </select>
                  </div>
                  <div class="col form-group">
                     <label for="subcaste">Sub Caste</label>
                     <input type="text" class="form-control" id="subcaste" placeholder="" name="subcaste" minlength="3" />
                  </div>
               </div>
               <div class="row">
                  <div class="col form-group">
                     <label for="fhName">Father/Husband Name</label>
                     <input type="text" class="form-control" id="fhName" placeholder="" minlength="2" name="fhName" />
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
                  <div class="col form-group">
                     <label for="aadhar">Aadhar Number</label>
                     <input type="number" class="form-control" id="aadhar" placeholder="" name="aadhar" minlength="12" maxlength="12"  />
                  </div>
                  <div class="col form-group">
                     <label for="voterNumber">Voter Number</label>
                     <input type="text" class="form-control" id="voterNumber" placeholder="" name="voterNumber" minlength="5" maxlength="14" />
                  </div>
               </div>
               <div class="row">
                  <label for="Address">Address</label>
                  <div class="col form-group">
                     <input type="text" class="form-control" id="city"  name="city" minlength="3" placeholder="City" />
                  </div>
                  <div class="col form-group">
                     <input type="text" class="form-control" id="district"  name="district" minlength="3" placeholder="District" />
                  </div>
               </div>
               <div class="row">
                  <div class="col form-group">
                     <label for="mobileNumber">Mobile Number</label>
                     <input type="number" class="form-control" id="phoneNumber" placeholder="" name="mobileNumber" minlength="10" maxlength="12" />
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
                    <div class="form-group">
                        <input type="hidden" name="select" value="advanced" />
                        <button type="submit" class="btn btn-primary" id="submit">Search</button>
                    </div>
               </div>
            </form>
         </div>
      </div>
   </body>
   <script></script>
</html>
 <?php } ?>
