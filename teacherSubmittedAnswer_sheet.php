<?php

session_start();
require "connection.php";

if (isset($_SESSION["teacher"])) {
  $email = $_SESSION["teacher"]["email"];
  $pageno;


?>

  <!-- changes -->

  <!DOCTYPE html>

  <html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Submitted Answers | e - SEWANA </title>
    <style media="screen">
    embed{
      border: 2px solid black;
      margin-top: 20px;
      margin-left: -150px;
      
    }
    .div1{
      margin-left: 170px;
    }
  </style>

    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

    <link rel="icon" href="resource\logo.png" />

  </head>

  <body class="main-body vh-100">

    <div class="container-fluid">
      <div class="row">

        <!-- header -->
        <div class="col-12 bg-transparent">
          <div class="row">
            <div class="col-12 col-lg-4">
              <div class="row">
                <div class="col-12 col-lg-4 mt-1 mb-1 text-center">

                  <!-- changes -->

                  <?php

                  $profile_image_Resultset = Database::search("SELECT * FROM `teacher_profile_img` WHERE `teacher_email` = '" . $email . "';");
                  $profile_image_num = $profile_image_Resultset->num_rows;
                  $profile_image_data = $profile_image_Resultset->fetch_assoc();

                  if ($profile_image_num == 1) {

                  ?>
                    <img src="<?php echo $profile_image_data["path"]; ?>" width="80px" height="80px" class="rounded-circle" />

                  <?php

                  } else {

                  ?>

                    <img src="resource\proimg\Tharindu_6344ce577b8ce.jpeg" width="80px" height="80px" class="rounded-circle" />

                  <?php

                  }

                  ?>

                </div>
                <div class="col-12 col-lg-8">
                  <div class="row text-center text-lg-start">
                    <div class="col-12 mt-0 mt-lg-4">
                      <span class="text-danger fw-bold"><?php echo $_SESSION["teacher"]["fname"] . " " . $_SESSION["teacher"]["lname"] ?></span>
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
                  <h1 class="offset-4 offset-lg-2 text-primary text-uppercase fw-bold">Student Answers</h1>
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
              <li class="breadcrumb-item"><a href="teacherhome.php">Back</a></li>
              <li class="breadcrumb-item active" aria-current="page">Submit Answers page</li>
            </ol>
          </nav>
        </div>

        <!-- body -->
        <div class="col-12">
          <div class="row">



            <!-- product -->
            <div class="col-12 bg-transparent">
              <div class="row">
                <div class="offset-1 col-10 text-center">

                  
                  <div class="row justify-content-center">


                    <div class="div1">

                      <?php

                      $query = Database::search("SELECT * FROM upload_answer");
                      while ($info = mysqli_fetch_array($query)) {
                        ?>
                    
                          <embed src="uppdf/<?php echo $info['path']; ?>" class="col-12" type="" width="300" height="500">
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

  header("location:teacherhome.php");
}

?>