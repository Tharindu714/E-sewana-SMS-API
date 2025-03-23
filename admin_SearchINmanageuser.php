<?php
session_start();
require "connection.php";

if (isset($_GET["mu"])) {

  $search = $_GET["mu"];

  $query = "SELECT * FROM `admin`";
  $p_rs = Database::search($query . "WHERE `fname` LIKE '%" . $search . "%'");

  $p_num = $p_rs->num_rows;
  if ($p_num == 0) {
    echo ("No Admin you are sarching for");
  } else {

    for ($x = 0; $x < $p_num; $x++) {
      $p_data = $p_rs->fetch_assoc();

      $pro_img_rs = Database::search("SELECT * FROM `admin_profile_img` 
        WHERE `admin_email` = '" . $p_data["email"] . "';");

      $pro_img_data = $pro_img_rs->fetch_assoc();

?>

      <div class="row mb-3 mt-3">
        <div class="col-2 col-lg-1 bg-transparent py-2 text-end">
          <span class="fs-4 text-dark"><?php echo $x + 1; ?></span>
        </div>
        <div class="col-2 col-lg-4 bg-light py-2">
          <img src="<?php echo $pro_img_data["path"]; ?>" class="rounded-circle" style="height: 150px; margin-left: 80px;" />
        </div>
        <div class="col-4 col-lg-3 bg-transparent py-2">
          <span class="fs-4 text-dark text-uppercase"><?php echo $p_data["fname"] . " " . $p_data["lname"]; ?></span>
        </div>
        <div class="col-4 col-lg-4 d-lg-block bg-light py-2">
          <span class="fs-4"><?php echo $p_data['email']; ?></span>
        </div>

      </div>
    <?php
    }

    ?>
<?php
  }
}

?>