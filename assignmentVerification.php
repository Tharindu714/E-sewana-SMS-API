<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>e - SEWANA | Assignment Portal</title>

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
            <p class="text-center title1">e- SEWANA Assignment Portal</p>
          </div>
        </div>
      </div>

      <div class="col-12 p-5">
        <div class="row">

          <div class="col-6 d-none d-lg-block background3"> </div>
          <div class="col-12 col-lg-6 d-block">
            <div class="row g-3">
              <div class="col-12">
                <p class="title2">VERIFY YOURSELF</p>
              </div>
              <div class="col-12">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" id="e" placeholder="ex :- someone@gmail.com" />
              </div>
              <div class="col-12 col-lg-6 d-grid">
                <button class="btn btn-primary" onclick="teacherVerification();"> Send Verification code </button>
              </div>
              <div class="col-12 col-lg-6 d-grid">
                <button class="btn btn-danger" onclick="window.location ='teacherhome.php';">Back to home</button>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!-- Model -->
      <div class="modal" tabindex="-1" id="veriFicationModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Teacher Verification</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <label class="form-label"> Enter Your Verification Code</label>
              <input type="text" class="form-control" id="vCode">
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary" onclick="Teacher_verify();">Verify</button>
            </div>
          </div>
        </div>
      </div>
      <!-- Model -->

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