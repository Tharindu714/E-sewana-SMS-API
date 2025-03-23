<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Academic Officer's Profile | e - SEWANA</title>

  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="icon" href="resource/logo.png" />

</head>

<body>

  <div class="container-fluid">
    <div class="row">

      <?php include "academicheader.php"; ?>

      <?php

      require "connection.php";

      if (isset($_SESSION["af"])) {
        $email = $_SESSION["af"]["email"];

  

        $details_resultSet = Database::search("SELECT * FROM `academic_officer` INNER JOIN `gender` ON 
        gender.gender_id=academic_officer.gender_id WHERE `email`= '" . $email . "';");

        $img_resultSet = Database::search("SELECT*FROM `acadamic_profile_img` WHERE `academic_officer_email`='" . $email . "';");

        $addr_resultSet = Database::search("SELECT*FROM `academic_officer_has_address`
        INNER JOIN `city` ON academic_officer_has_address.city_id=city.id
        INNER JOIN `district` ON city.district_id=district.id
        INNER JOIN `province`ON district.province_id=province.id WHERE `academic_officer_email`='" . $email . "';");

        $data = $details_resultSet->fetch_assoc();
        $imgdata = $img_resultSet->fetch_assoc();
        $addrdata = $addr_resultSet->fetch_assoc();


      ?>

        <div class="col-12 bg-primary">
          <div class="row">

            <div class="col-12 bg-body rounded mt-4 mb-4">
              <div class="row g-2">

                <div class="col-md-3 border-end main-body">
                  <div class="d-flex flex-column align-items-center text-center p-3 py-5">


                    <?php

                    if (empty($imgdata["path"])) {
                    ?>
                      <img src="resource/proimg/newuser.svg" id="viewimg" class="rounded-circle mt-5" style="width:150px ;" />
                    <?php

                    } else {
                    ?>
                      <img src="<?php echo $imgdata["path"]; ?>" id="viewimg" class="rounded-circle mt-5" style="width:150px ;" />
                    <?php

                    }
                    ?>
                    <span class="fw-bold"><?php echo $data["fname"] . " " . $data["lname"]; ?></span>
                    <span class="fw-bold text-black-50"><?php echo $email; ?></span>

                    <input type="file" class="d-none" id="profileimg" accept="image/*" />
                    <label for="profileimg" class="btn mt-5 text-light text-uppercase fw-bold border border-2 border-light" onclick="changeimg2();" style="background-color: #033d2a;">Update Profile Image</label>

                  </div>
                </div>

                <div class="col-md-5 border-end main-body">
                  <div class="p-3 py-5">

                    <div class="d-flex justify-content-between align-align-items-center mb-3">
                      <h4 class="fw-bold text-uppercase">Profile Settings</h4>
                    </div>

                    <div class="row mt-4">

                      <div class="col-6">
                        <label for="" class="form-label">First Name</label>
                        <input type="text" class="form-control" value="<?php echo $data["fname"]; ?>" id="fname" />
                      </div>

                      <div class="col-6">
                        <label for="" class="form-label">Last Name</label>
                        <input type="text" class="form-control" value="<?php echo $data["lname"]; ?>" id="lname" />
                      </div>

                      <div class="col-12">
                        <label for="" class="form-label">Mobile</label>
                        <input type="text" class="form-control" value="<?php echo $data["mobile"]; ?>" id="mob" />
                      </div>

                      <div class="col-12">
                        <label for="" class="form-label">Email</label>
                        <input type="text" class="form-control" readonly value="<?php echo $data["email"]; ?>" />
                      </div>

                      <div class="col-12">
                        <label for="" class="form-label">Password</label>
                        <div class="input-group mb-3">
                          <input type="password" class="form-control" value="<?php echo $data["password"]; ?>" readonly aria-label="Recipient's username" aria-describedby="basic-addon2">
                          <span class="input-group-text" id="basic-addon2">
                            <i class="bi bi-eye-slash-fill">
                            </i>
                          </span>
                        </div>
                      </div>

                      <div class="col-12">
                        <label for="" class="form-label">Registerd Date</label>
                        <input type="text" class="form-control" readonly value="<?php echo $data["join_date"]; ?>" />
                      </div>

                      <?php
                      if (!empty($addrdata["line1"])) {
                      ?>
                        <div class="col-12">
                          <label class="form-label">Address Line 01</label>
                          <input type="text" class="form-control" value="<?php echo $addrdata["line1"]; ?>" id="add01" />
                        </div>

                      <?php
                      } else {
                      ?>

                        <div class="col-12">
                          <label for="" class="form-label">Address Line 01</label>
                          <input type="text" class="form-control" id="add01" />
                        </div>

                      <?php


                      }
                      if (!empty($addrdata["line2"])) {
                      ?>

                        <div class="col-12 mt-1">
                          <label for="" class="form-label">Address Line 02</label>
                          <input type="text" value="<?php echo $addrdata["line2"]; ?>" class="form-control" id="add02"/>
                        </div>

                      <?php
                      } else {
                      ?>

                        <div class= "col-12">
                          <label class="form-label">Address Line 02</label>
                          <input type="text" class="form-control" id="add02" />
                        </div>

                      <?php
                      }

                      $province_resultSet = Database::search("SELECT * FROM `province`");
                      $district_resultSet = Database::search("SELECT * FROM `district`");
                      

                      ?>

                      <div class="col-12">
                        <label class="form-label">Province</label>
                        <select class="form-select" id="province">
                          <option value="0">Select Province</option>
                          <?php
                          $province_num = $province_resultSet->num_rows;
                          for ($x = 0; $x < $province_num; $x++) {
                            $province_data = $province_resultSet->fetch_assoc();
                          ?>

                            <option value="<?php echo $province_data["id"]; ?>" <?php 
                            if(!empty($addrdata["province_id"])){

                            if ($province_data["id"] == $addrdata["province_id"]) {

                               ?>selected<?php } } ?>>

                              <?php echo $province_data["province_name"]; ?></option>

                          <?php
                          }
                          ?>
                        </select>
                      </div>

                      <div class="col-6">
                        <label for="" class="form-label">District</label>
                        <select class="form-select" id="district">
                          <option value="0">Select District</option>
                          <?php
                          
                          $district_num = $district_resultSet->num_rows;
                          for ($x = 0; $x < $district_num; $x++) {
                            $district_data = $district_resultSet->fetch_assoc();
                          ?>

                            <option value="<?php echo $district_data["id"]; ?>" <?php
                            if(!empty($addrdata["district_id"])){

                               if ($district_data["id"] == $addrdata["district_id"]) {

                                 ?>selected<?php } } ?>>

                              <?php echo $district_data["district_name"]; ?></option>

                          <?php
                          }
                          ?>
                        </select>
                      </div>

                      <div class="col-6">
                        <label for="" class="form-label">City</label>
                        <select class="form-select" id="city">
                          <option value="0">Select City</option>
                          <?php
                          $city_resultSet = Database::search("SELECT * FROM `city`");
                          $city_num = $city_resultSet->num_rows;
                          for ($x = 0; $x < $city_num; $x++) {
                            $city_data = $city_resultSet->fetch_assoc();
                          ?>

                            <option value="<?php echo $city_data["id"]; ?>" <?php
                            if(!empty($addrdata["city_id"])){

                               if ($city_data["id"] == $addrdata["city_id"]) {
                                
                                ?>selected<?php } } ?>>

                              <?php echo $city_data["city_name"]; ?></option>

                          <?php
                          }
                          ?>
                        </select>
                      </div>

                      <?php
                      if (!empty($addrdata["postal_code"])) {
                      ?>
                        <div class="col-6">
                          <label for="" class="form-label">Postal Code</label>
                          <input type="text" class="form-control" id="postal" value="<?php echo $addrdata["postal_code"]; ?>" />
                        </div>

                      <?php
                      } else {
                      ?>

                        <div class="col-6">
                          <label for="" class="form-label">Postal Code</label>
                          <input type="text" class="form-control" id="postal" />
                        </div>

                      <?php
                      }
                      if (!empty($data["gender_name"])) {
                      ?>

                        <div class="col-6">
                          <label for="" class="form-label">Gender</label>
                          <input type="text" class="form-control" readonly value="<?php echo $data["gender_name"]; ?>" />
                        </div>

                      <?php
                      } else {
                      ?>
                        <div class="col-6">
                          <label for="" class="form-label">Gender</label>
                          <input type="text" class="form-control" readonly />
                        </div>

                      <?php
                      }

                      ?>
                      <div class="col-12 d-grid mt-3">
                        <button class="btn text-light text-uppercase fw-bold border border-2 border-light" style="background-color: #150135;" onclick="updatePro2();">Update My Profile</button>
                      </div>

                    </div>

                  </div>
                </div>

                <div class="col-md-4 text-center main-body">
                  <div class="row">
                    <span class="mt-5 fw-bold text-black-50"><a href="#"> Display ads </a></span>
                  </div>
                </div>

              </div>
            </div>

          </div>
        </div>

    </div>
  </div>

<?php

      } else {
        header("location:academichome.php");
      }

?>

</div>
</div>

<script src="bootstrap.bundle.js"></script>

<script src="script.js"></script>

</body>

</html>
