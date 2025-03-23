<?php

require "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Released Assignment Marks | E- Sewana</title>

  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="style.css" />

  <link rel="icon" href="resource/logo.png" />

</head>

<body class="main-body">

  <div class="container-fluid">
    <div class="row">

      <div class="col-12 bg-light text-center">
        <label class="form-label text-primary fw-bold fs-1 text-uppercase">Released Assignment Marks</label>
      </div>

      <div class="row border-bottom border-dark">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="academichome.php">Back</a></li>
            <li class="breadcrumb-item active" aria-current="page">Released Assignment Marks</li>
          </ol>
        </nav>
      </div>


      <div class="col-12 mt-3 mb-3">
        <div class="row">
          <div class="col-2 col-lg-1 bg-transparent py-2 text-end">
            <span class="fs-4 fw-bold text-dark">#</span>
          </div>
          <div class="col-2 d-none d-lg-block bg-light py-2">
            <span class="fs-4 fw-bold">Assignment</span>
          </div>
          <div class="col-4 col-lg-2 bg-transparent py-2">
            <span class="fs-4 fw-bold text-dark">User Name</span>
          </div>
          <div class="col-1 d-lg-block bg-light py-2">
            <span class="fs-4 fw-bold text-primary">Marks</span>
          </div>
          <div class="col-6 col-lg-3 d-none d-lg-block bg-transparent py-2">
            <span class="fs-4 fw-bold">Email</span>
          </div>
          <div class="col-4 col-lg-3 bg-transparent py-2">
          <button class="btn border border-2 border-white text-light text-uppercase fw-bold d-block text-center" onclick='window.location = "released.php"' style="background-color: #08e27c; margin-left: 130px;">Release Mark</button>
          </div>
        </div>
        <?php
        $query = "SELECT * FROM `student`";
        $pageno;

        if (isset($_GET["page"])) {
          $pageno = $_GET["page"];
        } else {
          $pageno = 1;
        }

        $user_rs = Database::search($query);
        $user_num = $user_rs->num_rows;

        $results_per_page = 4;
        $number_of_pages = ceil($user_num / $results_per_page);

        $page_results = ($pageno - 1) * $results_per_page;
        $selected_rs =  Database::search($query . " LIMIT " . $results_per_page . " OFFSET " . $page_results . "");

        $selected_num = $selected_rs->num_rows;

        for ($x = 0; $x < $selected_num; $x++) {
          $selected_data = $selected_rs->fetch_assoc();


          $query1 = Database::search("SELECT * FROM as_files");
          while ($info = mysqli_fetch_array($query1)) {

            $mark_rs = Database::search("SELECT * FROM `assignment_mark` WHERE `as_files_id` ='" . $info['id'] . "'");
            $mark_data = $mark_rs->fetch_assoc();


        ?>

            <div class="col-12">
              <div class="row mb-3 mt-3">
                <div class="col-2 col-lg-1 bg-transparent py-2 text-end">
                  <span class="fs-4 text-dark"><?php echo $info['id']; ?></span>
                </div>
                <div class="col-2 d-none d-lg-block bg-light py-2">
                  <embed src="pdf/<?php echo $info['file_code']; ?>" class="col-12" type="" width="100" height="100">
                </div>
                <div class="col-4 col-lg-2 bg-transparent py-2">
                  <span class="fs-5 text-dark text-uppercase"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></span>
                </div>
                <div class="col-1 d-lg-block bg-light py-2">
                  <span class="fs-4"><?php echo $mark_data['marks']; ?></span>
                </div>
                <div class="col-6 col-lg-3 d-lg-block d-none bg-transparent py-2">
                  <span class="fs-4 fw-bold"><?php echo $selected_data["email"]; ?></span>
                </div>
              </div>
            </div>
      </div>
  <?php
          }
        }

  ?>


  <!--  -->
  <div class="offset-2 offset-lg-3 col-8 col-lg-6 text-center mb-3">
    <nav aria-label="Page navigation example">
      <ul class="pagination pagination-lg justify-content-center">
        <li class="page-item">
          <a class="page-link" href="
                                                <?php if ($pageno <= 1) {
                                                  echo ("#");
                                                } else {
                                                  echo "?page=" . ($pageno - 1);
                                                } ?>
                                                " aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php

        for ($x = 1; $x <= $number_of_pages; $x++) {
          if ($x == $pageno) {
        ?>
            <li class="page-item active">
              <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
            </li>
          <?php
          } else {
          ?>
            <li class="page-item">
              <a class="page-link" href="<?php echo "?page=" . ($x); ?>"><?php echo $x; ?></a>
            </li>
        <?php
          }
        }

        ?>

        <li class="page-item">
          <a class="page-link" href="
                                                <?php if ($pageno >= $number_of_pages) {
                                                  echo ("#");
                                                } else {
                                                  echo "?page=" . ($pageno + 1);
                                                } ?>
                                                " aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
  <!--  -->

    </div>
  </div>

  <script src="bootstrap.bundle.js"></script>
  <script src="script.js"></script>
</body>

</html>