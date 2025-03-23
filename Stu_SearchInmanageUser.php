<?php
session_start();
require "connection.php";

if (isset($_GET["mu"])) {

  $search = $_GET["mu"];

  $query = "SELECT * FROM `student`";
  $p_rs = Database::search($query . "WHERE `fname` LIKE '%" . $search . "%'");

  $p_num = $p_rs->num_rows;
  if ($p_num == 0) {
    echo ("No students you are sarching for");
  } else {

    for ($x = 0; $x < $p_num; $x++) {
      $p_data = $p_rs->fetch_assoc();

      $pro_img_rs = Database::search("SELECT * FROM `profile_img` 
        WHERE `student_email` = '" . $p_data["email"] . "';");

      $pro_img_data = $pro_img_rs->fetch_assoc();

?>

      <div class="col-12 mt-3 mb-3">
        <div class="row">
          <div class="col-2 col-lg-1 bg-transparent py2 text-end">
            <span class="fs-4 fw-bold text-dark"><?php echo $x + 1; ?></span>
          </div>
          <div class="col-2 d-none d-lg-block bg-light py-2">
            <img src="<?php echo $pro_img_data["path"]; ?>" class="rounded-circle" style="height: 90px;margin-left: 60px;" />
          </div>
          <div class="col-4 col-lg-2 bg-transparent py2">
            <span class="fs-5 fw-bold text-dark text-uppercase"><?php echo $p_data["fname"] . " " . $p_data["lname"]; ?></span>
          </div>
          <div class="col-4 col-lg-2 d-lg-block bg-light py-2">
            <span class="fs-6 fw-bold"><?php echo $p_data["email"]; ?></span>
          </div>
          <div class="col-2 d-none d-lg-block bg-transparent py-2">
            <span class="fs-4 fw-bold text-dark"><?php echo $p_data["mobile"]; ?></span>
          </div>
          <div class="col-2 d-none d-lg-block bg-light py-2">
            <span class="fs-4 fw-bold"><?php echo $p_data["join_date"]; ?></span>
          </div>
          <div class="col-2 col-lg-1 bg-transparent py-2 d-grid">

            <?php

            if ($p_data["status"] == 1) {
            ?>
              <button id="UB<?php echo $p_data['email']; ?>" class="btn btn-danger rounded-circle text-uppercase fw-bold" onclick="blockUser('<?php echo $p_data['email']; ?>');">BLOCK</button>
            <?php

            } else {
            ?>
              <button id="UB<?php echo $p_data['email']; ?>" class="btn btn-success rounded-circle text-uppercase fw-bold" onclick="blockUser('<?php echo $p_data['email']; ?>');">UNBLOCK</button>
            <?php

            }

            ?>
          </div>
        </div>
      </div>
    <?php
    }

    ?>
<?php
  }
}

?>