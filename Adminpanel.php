<?php
session_start();
require "connection.php";

if (isset($_SESSION["aduser"])) {

?>

  <!DOCTYPE html>

  <html>
  <!--head tags -->

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>e- Sewana | Admin Panel</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />
  </head>

  <!--head tags -->

  <body class="main-body">

    <div class="container-fluid">
      <div class="row">

        <div class="col-12 col-lg-2">
          <div class="row">
            <div class="col-12 align-items-start bg-dark vh-100">
              <div class="row g-1 text-center">

                <div class="col-12 mt-5">
                  <h4 class="text-light fw-bold"><?php echo $_SESSION["aduser"]["fname"] . " " . $_SESSION["aduser"]["lname"]; ?> </h4>
                  <hr class="border border-1 border-white" />
                </div>
                <div class="nav flex-column nav-pills me-3 mt-3" role="tablist" aria-orientation="vertical">
                  <nav class="nav flex-column">
                    <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
                    <a class="nav-link" href="manageStudent.php">Manage Students</a>
                    <a class="nav-link" href="manageteachers.php">Manage Teachers</a>
                    <a class="nav-link" href="manageacademic.php">Manage Officers</a>
                    <a class="nav-link" href="manageadmin.php">Manage Administors</a>
                    <a class="nav-link" href="Ad_view.php">Check Student Results</a>
                    <a class="nav-link" href="adminsignin.php" title="Press to Signout" onclick="signout3();">Sign Out</a>


                  </nav>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-10">
          <div class="row">
            <div class="text-white fw-bold mb-1 mt-3">
              <h2 class="fw-bold ">Dashbord</h2>
            </div>

            <div class="col-12">
              <hr />
            </div>

            <div class="col-12 bg-dark">
              <div class="row">
                <div class="col-12 col-lg-2 text-center my-3">
                  <label class="form-label fs-5 fw-bold text-info">Total Active Time</label>
                </div>
                <div class="col-12 col-lg-10 text-center my-3">
                  <?php

                  $start_date = new DateTime("2022-12-22 00:00:00");

                  $tdate = new DateTime();
                  $tz = new DateTimeZone("Asia/Colombo");
                  $tdate->setTimezone($tz);

                  $end_date = new DateTime($tdate->format("Y-m-d H:i:s"));

                  $difference = $end_date->diff($start_date);

                  ?>
                  <label class="form-label fs-4 fw-bold text-warning">
                    <?php
                    echo $difference->format('%Y') . " Years " .
                      $difference->format('%m') . " Months " .
                      $difference->format('%d') . " Days " .
                      $difference->format('%H') . " Hours " .
                      $difference->format('%i') . " Minutes " .
                      $difference->format('%s') . " Seconds ";
                    ?>
                  </label>

                  <?php
                  $email = $_SESSION["aduser"]["email"];
                  $details_resultSet = Database::search("SELECT * FROM `admin`");
                  $data = $details_resultSet->fetch_assoc();

                  $img_resultSet = Database::search("SELECT `path` FROM `admin`");
                  $imgdata = $img_resultSet->fetch_assoc();
                  ?>

                </div>
              </div>
            </div>
            <div class="col-md-3 border-end bg-transparent">
              <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                <img src="resource/logo.png" class="rounded-circle mt-5" style="width:150px ;" />

                <span class="fw-bold"><?php echo $data["fname"] . " " . $data["lname"]; ?></span>
                <span class="fw-bold text-black-50"><?php echo $email; ?></span>

                <input type="file" class="d-none" id="profileimg" accept="image/*" />
              </div>
            </div>

            <div class="col-md-5 border-end bg-transparent">
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
                    <label for="" class="form-label">Email</label>
                    <input type="text" class="form-control" readonly value="<?php echo $email; ?>" />
                  </div>

                  <div class="col-12 d-grid mt-3">
                    <button class="btn text-light text-uppercase fw-bold border border-2 border-light" style="background-color: #150135;" onclick="updateProad();">Update My Profile</button>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 text-center bg-transparent">
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


    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>

  </body>

  </html>

<?php
} else {
  echo ("You Are Not a valid User");
}
?>