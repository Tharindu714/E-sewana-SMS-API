<?php

require "connection.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage teachers | Admins</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />

</head>

<body class="main-body">

    <div class="container-fluid">
        <div class="row">

            <div class="col-12 bg-light text-center">
                <label class="form-label text-primary fw-bold fs-1 text-uppercase">Manage All Teachers</label>
            </div>
            <div class="row border-bottom border-dark">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="Adminpanel.php">Back</a></li>
            <li class="breadcrumb-item active" aria-current="page">Admin's Profile</li>
          </ol>
        </nav>
      </div>
            <div class="col-12 mt-3">
                <div class="row">
                    <div class="offset-0 offset-lg-3 col-12 col-lg-6 mb-3">
                        <div class="row">
                            <div class="col-9">
                                <input type="text" class="form-control" id="mu" placeholder="Search by Teacher Name" />
                            </div>
                            <div class="col-3 d-grid">
                                <button class="btn bg-transparent text-uppercase fw-bold text-primary border border-2 border-primary fs-6" title="Search by Teacher Name" onclick="searchMU1();">Search Teacher</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-3 mb-3">
                <div class="row">
                    <div class="col-2 col-lg-1 bg-transparent py-2 text-end">
                        <span class="fs-4 fw-bold text-primary">#</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold">Profile Image</span>
                    </div>
                    <div class="col-4 col-lg-2 bg-transparent py-2">
                        <span class="fs-4 fw-bold text-primary">User Name</span>
                    </div>
                    <div class="col-4 col-lg-2 d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold">Email</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-transparent py-2">
                        <span class="fs-4 fw-bold text-primary">Mobile</span>
                    </div>
                    <div class="col-2 d-none d-lg-block bg-light py-2">
                        <span class="fs-4 fw-bold">Registered Date</span>
                    </div>
                    <div class="col-2 col-lg-1 bg-transparent"></div>
                </div>
            </div>

            <?php

            $query = "SELECT * FROM `teacher`";
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

                $pro_img_rs = Database::search("SELECT * FROM `teacher_profile_img` 
                WHERE `teacher_email` = '" . $selected_data["email"] . "';");

                $pro_img_data = $pro_img_rs->fetch_assoc();

            ?>

                <div class="col-12" id="searchResults">
                    <div class="row mb-3 mt-3">
                        <div class="col-2 col-lg-1 bg-transparent py-2 text-end">
                            <span class="fs-4 text-dark fw-bold"><?php echo $x + 1; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-light py-2">
                            <img src="<?php echo $pro_img_data["path"]; ?>" class="rounded-circle" style="height: 90px; margin-left: 60px;" />
                        </div>
                        <div class="col-4 col-lg-2 bg-transparent py-2">
                            <span class="fs-5 text-dark fw-bold text-uppercase"><?php echo $selected_data["fname"] . " " . $selected_data["lname"]; ?></span>
                        </div>
                        <div class="col-4 col-lg-2 d-lg-block bg-light py-2">
                            <span class="fs-6"><?php echo $selected_data['email']; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-transparent py-2">
                            <span class="fs-4 text-dark fw-bold"><?php echo $selected_data['mobile']; ?></span>
                        </div>
                        <div class="col-2 d-none d-lg-block bg-light py-2">
                            <span class="fs-4 "><?php echo $selected_data['join_date']; ?></span>
                        </div>
                        <div class="col-2 col-lg-1 bg-transparent py-2 d-grid">
                            <?php

                            if ($selected_data["status"] == 1) {
                            ?>
                                <button id="UB<?php echo $selected_data['email']; ?>" class="btn btn-danger rounded-circle text-uppercase fw-bold" onclick="blockUser1('<?php echo $selected_data['email']; ?>');">Block</button>
                            <?php
                            } else {
                            ?>
                                <button id="UB<?php echo $selected_data['email']; ?>" class="btn btn-success rounded-circle text-uppercase fw-bold" onclick="blockUser1('<?php echo $selected_data['email']; ?>');">Unblock</button>
                            <?php

                            }

                            ?>
                        </div>
                    </div>
                </div>
            <?php
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