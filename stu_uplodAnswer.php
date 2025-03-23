<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Answer | e - Sewana</title>
  <style media="screen">
    .div {
      border: 2px solid black;
      width: 500px;
      margin-left: 370px;
      margin-top: 50px;
      padding: 30px;
    }

    label {
      font-size: 20px;
      font-weight: bold;
    }

    #pdf {
      font-size: 20px;
      font-weight: bold;
      margin-top: 10px;
      margin-left: 150px;
    }

    #upload {
      font-size: 20px;
      font-weight: bold;
      margin-top: 20px;

    }
  </style>

  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />

  <link rel="icon" href="resource/logo.png" />

</head>

<body class="main-body vh-100">
  <div class="container-fluid">
    <div class="row gy-3">
      <?php include "studentHeader.php";

      require "connection.php";

      if (isset($_SESSION["user"])) {

      ?>
        <hr />

        <div class="col-12 mt-1">
          <div class="row">
            <div class="col-12 text-center">
              <h2 class="h1 text-primary fw-bolder">UPLOAD ASSIGNMENT ANSWERS</h2>
            </div>
            <hr />

            <div class="row border-bottom border-dark">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item text-uppercase fw-bold"><a href="studenthome.php">Go Back</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Assignment Answer Portal</li>
                </ol>
              </nav>
            </div>

            <div class="col-12 text-center">
              <form method="post" enctype="multipart/form-data">
                <label for="" class="text-uppercase">Choose your PDF files</label><br /><br />
                <input id="pdf" type="file" name="pdf" value="" required><br /><br />
                <input id="upload" type="submit" name="submit" value="upload Answer PDF" class="btn btn-outline-dark d-block col-12 text-uppercase">
                <?php

                if (isset($_POST['submit'])) {
                  $pdf = $_FILES['pdf']['name'];
                  $pdf_type = $_FILES['pdf']['type'];
                  $pdf_size = $_FILES['pdf']['size'];
                  $pdf_temp = $_FILES['pdf']['tmp_name'];
                  $pdf_store = "uppdf/" . $pdf;

                  move_uploaded_file($pdf_temp, $pdf_store);

                  Database::insUpdelete("INSERT INTO upload_answer(path) VALUES('$pdf')");
                }
                ?>
              </form>
            </div>
          </div>
        </div>
    </div>

  <?php
      } else {
        header("location:studenthome.php");
      }
  ?>
  <script src="script.js"></script>
  <script src="bootstrap.bundle.js"></script>
</body>

</html>