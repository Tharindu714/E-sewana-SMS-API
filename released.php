<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>e - SEWANA | Release Marks</title>

  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="style.css" />

  <link rel="icon" href="resource/logo.png" />
</head>

<body class="main-body">
  <div class="container-fluid justify-content-center" style="margin-top: 100px;">
    <div class="row align-content-center">

      <div class="col-12">
        <div class="row">

          <div class="col-12 logo"></div>
          <div class="col-12">
            <p class="text-center title1">e- SEWANA Mark Realeasing Portal</p>
          </div>
        </div>
      </div>

      <div class="col-12 p-5">
        <div class="row">

          <div class="col-6 d-none d-lg-block background2"> </div>
          <div class="col-12 col-lg-6 d-block">
            <div class="row g-3">
              <div class="col-12">
                <p class="title2 text-uppercase">Release Assignment Marks</p>
              </div>
              <div class="col-12 d-none" id="msgdiv">
                <div class="alert alert-danger" role="alert" id="alertdiv">
                  <i class="bi bi-x-octagon-fill fs-5" id="msg">

                  </i>
                </div>
              </div>
              <div class="col-12">
                <label class="form-label">Marks</label>
                <input type="number" class="form-control" id="marks" placeholder="Enter Assignment Mark Here" />
              </div>
              <div class="col-12">
                <label class="form-label fw-bold">Assignment</label>
                <select class="form-select text-dark text-uppercase fw-bold" id="assignment">
                  <?php

                  require "connection.php";

                  $rs = Database::search("SELECT * FROM `as_files`");
                  $n = $rs->num_rows;

                  for ($x = 0; $x < $n; $x++) {
                    $d = $rs->fetch_assoc();

                  ?>

                    <option value="<?php echo $d["id"]; ?>"><?php echo $d["file_code"]; ?></option>

                  <?php

                  }

                  ?>
                </select>
              </div>
              <div class="col-12 col-lg-6 d-grid">
                <button class="btn btn-success text-uppercase fw-bold" onclick="rMarks();" > Release Marks</button>
              </div>
              <div class="col-12 col-lg-6 d-grid">
                <button class="btn btn-danger text-uppercase fw-bold" onclick="window.location ='releaseMarks.php';">Go Back</button>
              </div>
            </div>

          </div>


          <div class="col-12 fixed-bottom text-center">
            <p>&copy; 2023 eSewana.lk || All Right Reserved</p>
            <p class="fw-bold">e- Sewana &trade;</p>
          </div>

        </div>
      </div>

      <script src="script.js"></script>
      <script src="bootstrap.bundle.js"></script>
</body>

</html>