<?php 
	$conn = mysqli_connect('localhost','','','database');
    $filter = "";
    $value = "";
    if(!empty($_GET['filter'])){
        $filter = $_GET['filter'];
    }
    if (!empty($_GET['value'])){
        $value = $_GET['value'];
    }
    if ($filter == "vidhanSabha" && !empty($value) ){
        $result = mysqli_query($conn,"Select * from `registration` where ".$filter." = '".$value."' ");
    }else if ($filter == "age" && !empty($value) ){
        $result = mysqli_query($conn,"Select * from `registration` where ".$filter." = '".$value."' ");
    }else if ($filter == "caste" && !empty($value) ){
        $result = mysqli_query($conn,"Select * from `registration` where ".$filter." = '".$value."' ");
    }else if ($filter == "occupation" && !empty($value) ){
        $result = mysqli_query($conn,"Select * from `registration` where ".$filter." = '".$value."' ");
    }else if ($filter == "wardNumber" && !empty($value) ){
        $result = mysqli_query($conn,"Select * from `registration` where ".$filter." = ".$value." ");
    }else {
        $result = mysqli_query($conn,"Select * from `registration`");
    }
?>
<!DOCTYPE html>
<html>
  <head>
    <title>All Data Page</title>
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.css" />
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
            .search-box {
                position: relative;
                float: right;
            }
            .search-box .input-group {
                min-width: 300px;
                position: absolute;
                right: 0;
            }
            .search-box .input-group-addon, .search-box input {
                border-color: #ddd;
                border-radius: 0;
            }	
            .search-box input {
                height: 34px;
                padding-right: 35px;
                background: #f4fcfd;
                border: none;
                border-radius: 2px !important;
            }
            .search-box input:focus {
                background: #fff;
            }
            .search-box input::placeholder {
                font-style: italic;
            }
            .search-box .input-group-addon {
                min-width: 35px;
                border: none;
                background: transparent;
                position: absolute;
                right: 0;
                z-index: 9;
                padding: 6px 0;
            }
            .search-box i {
                color: #a0a5b1;
                font-size: 19px;
                position: relative;
                top: 2px;
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
            </style>
  </head>
  <body>
    <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6"><h2>Manage <b>Data</b></h2></div>
                    <div class="col-sm-6">
                        <div class="btn-group me-2" data-toggle="buttons">
                        <form action="" method="get" autocomplete="off" onchange="check()">
                            <div class="">
                                <label class="btn btn-primary">
                                    <input type="radio" name="filter" value="vidhanSabha" <?php echo ($filter == 'vidhanSabha') ? "checked" : ""; ?>> Vidhan Sabha
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="filter" value="age" <?php echo ($filter == 'age') ? "checked" : ""; ?>> Age
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="filter" value="caste" <?php echo ($filter == 'caste') ? "checked" : ""; ?>> Caste
                                </label>
                                <label class="btn btn-primary">
                                    <input type="radio" name="filter" value="occupation" <?php echo ($filter == 'occupation') ? "checked" : ""; ?>> Occupation
                                </label>							
                                <label class="btn btn-primary">
                                    <input type="radio" name="filter" value="wardNumber" <?php echo ($filter == 'wardNumber') ? "checked" : ""; ?>> Ward
                                </label>
                                    <a href="./export" target="_top" ><button type="button" class="btn btn-success">Export</button></a>
                            </div>	
                            <div class="search-box form-group" id="search-box">
                                <div class="input-group">								
                                    <span class="input-group-addon"><i class="material-icons">&#xE8B6;</i></span>
                                    <input type="text" name="value" placeholder="Enter Value" value="<?php echo $value ; ?>" id="search" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="Search" />
                                </div>
                            </div>
                        </div>						
                        </form>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th class='text '>#</th>
                        <th class='text '>Vidhan Sabha</th>
                        <th class='text '>Full Name</th>
                        <th class='text '>Father / Husband Name</th>
                        <th class='number '>Age</th>
                        <th class='number '>Aadhar</th>
                        <th class='number '>Booth Number</th>
                        <th class='number '>Voter Number</th>
                        <th class='text '>Address</th>
                        <th class='text '>City</th>
                        <th class='text '>District</th>
                        <th class='text '>Caste</th>
                        <th class='text '>Sub Caste</th>
                        <th class='number '>Mobile Number</th>
                        <th class='text '>Occupation</th>
                        <th class='number '>Ward Number</th>
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
                        <td class='text ' data-title='fullName'><?php echo $row['fullName'] ; ?></td>
                        <td class='text ' data-title='fhName'><?php echo $row['fhName'] ; ?></td>
                        <td class='number ' data-title='age'><?php echo $row['age'] ; ?></td>
                        <td class='number ' data-title='aadhar'><?php echo $row['aadhar'] ; ?></td>
                        <td class='number ' data-title='boothNumber'><?php echo $row['boothNumber'] ; ?></td>
                        <td class='number ' data-title='voterNumber'><?php echo $row['voterNumber'] ; ?></td>
                        <td class='text ' data-title='address'><?php echo $row['address'] ; ?></td>
                        <td class='text ' data-title='city'><?php echo $row['city'] ; ?></td>
                        <td class='text ' data-title='district'><?php echo $row['district'] ; ?></td>
                        <td class='text ' data-title='caste'><?php echo $row['caste'] ; ?></td>
                        <td class='text ' data-title='subcaste'><?php echo $row['subcaste'] ; ?></td>
                        <td class='number ' data-title='mobileNumber'><?php echo $row['mobileNumber'] ; ?></td>
                        <td class='text ' data-title='occupation'><?php echo $row['occupation'] ; ?></td>
                        <td class='number ' data-title='wardNumber'><?php echo $row['wardNumber'] ; ?></td>
                        <td class='text ' data-title='remark1'><?php echo $row['remark1'] ; ?></td>
                        <td class='text ' data-title='remark2'><?php echo $row['remark2'] ; ?></td>
                        <td class='text ' data-title='remark3'><?php echo $row['remark3'] ; ?></td>
                        <td class='text ' data-title='other'><?php echo $row['other'] ; ?></td>
                        <td class='text ' data-title='action'><a href="./update?id=<?php echo $row['id'] ; ?>" class="btn btn primary">Update</a></td>
                    </tr>
                    <?php 
                    $cnt += 1;
                    }} ?>
                </tbody>
            </table>
        </div> 
    </div>   
</div> 
  </body>
  <script>
    const check =()=>{
        if (!$("input[name='filter']:checked").val()) {
            $("#search-box").hide();
        } else {
            $("#search-box").show();
        }
    }
    check();
  </script>
</html>
