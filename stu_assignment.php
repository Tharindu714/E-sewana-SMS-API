<!-- changes -->
<?php

session_start();
require "connection.php";

if (isset($_SESSION["user"])) {
  $email = $_SESSION["user"]["email"];
  $pageno;


?>

  <!-- changes -->

  <!DOCTYPE html>

  <html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Download Assignments | e - SEWANA </title>
    <style media="screen">
      embed {
        border: 2px solid black;
        margin-top: 20px;
        margin-left: -150px;

      }

      .div1 {
        margin-left: 170px;
      }
    </style>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="resource\logo.png" />

  </head>

  <body class="main-body">

    <div class="container-fluid">
      <div class="row">

        <!-- header -->
        <div class="col-12 bg-transparent">
          <div class="row">
            <div class="col-12 col-lg-4">
              <div class="row">
                <div class="col-12 col-lg-4 mt-1 mb-1 text-center logo">
                </div>
                <div class="col-12 col-lg-8">
                  <div class="row text-center text-lg-start">
                    <div class="col-12 mt-0 mt-lg-4">
                      <span class="text-danger fw-bold"><?php echo $_SESSION["user"]["fname"] . " " . $_SESSION["user"]["lname"] ?></span>
                    </div>
                    <div class="col-12">
                      <span class="text-blue-50 fw-bold"><?php echo $email; ?></span>
                    </div>

                    <!-- changes -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-8 ">
              <div class="row">
                <div class="col-12 col-lg-10 mt-2 my-lg-4">
                  <h1 class="offset-4 offset-lg-2 text-primary text-uppercase fw-bold">Download Assignment</h1>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- header -->

        <div class="col-12 d-none" id="activemsgdiv">
          <div class="alert alert-danger" role="alert" id="activealertdiv">
            <i class="bi bi-x-octagon-fill fs-5" id="activemsg">

            </i>
          </div>
        </div>

        <div class="col-12 border-0 border-end border-1 border-primary">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="studenthome.php">Back</a></li>
              <li class="breadcrumb-item active" aria-current="page">Assignment page</li>
            </ol>
          </nav>
        </div>

        <!-- body -->
        <div class="col-12">
          <div class="row">

            <!-- filter -->
            <div class="col-11 col-lg-2 mx-3 my-3 border border-primary rounded">
              <div class="row">
                <div class="col-12 mt-3 fs-5">
                  <div class="row">
                    <div class="col-12 text-center">
                      <?php
                      $profile_image_Resultset = Database::search("SELECT * FROM `profile_img` WHERE `student_email` = '" . $email . "';");
                      $profile_image_num = $profile_image_Resultset->num_rows;
                      $profile_image_data = $profile_image_Resultset->fetch_assoc();
                      if ($profile_image_num == 1) {
                      ?>
                        <img src="<?php echo $profile_image_data["path"]; ?>" width="100px" height="100px" class="rounded-circle" />
                      <?php
                      } else {
                      ?>
                        <img src="resource\proimg\Tharindu_6344ce577b8ce.jpeg" width="100px" height="100px" class="rounded-circle" />
                      <?php
                      }
                      ?>
                    </div>
                    <div class="col-12 text-center mt-3 mb-3">
                      <div class="row g-2">
                        <div class="col-12 col-lg-12 d-grid">
                          <button class="btn btn-outline-danger fw-bold text-uppercase" onclick="clearSort();">Refresh</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- filter -->

            <!-- product -->
            <div class="col-12 col-lg-9 mt-3 mb-3 bg-white">
              <div class="row" id="sort">
                <div class="offset-1 col-10 text-center">
                  <div class="row justify-content-center">
                    <div class="div1">

                      <?php
                      $query = Database::search("SELECT * FROM as_files");
                      while ($info = mysqli_fetch_array($query)) {
                      ?>

                        <embed src="pdf/<?php echo $info['file_code']; ?>" class="col-12" type="" width="300" height="400">
                      <?php
                      }
                      ?>
                    </div>
                  </div>

                </div>
              </div>
              <!-- product -->
            </div>
          </div>
          <!-- body -->

        </div>
      </div>

      <script src="script.js"></script>
      <script src="bootstrap.js"></script>

  </body>

  </html>

<?php

} else {

  header("location:studentindex.php");
}

?>