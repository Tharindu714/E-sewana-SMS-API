<!DOCTYPE html>

<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | e - SEWANA</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />
</head>

<body class="main-body">

    <div class="container-fluid">
        <div class="row">
            <?php require_once "teacherHeader.php"; ?>
            <hr />

            <div class="col-12">
                <div class="row">

                    <!-- carousel -->

                    <div class="col-12 d-none d-lg-block mb-3">
                        <div class="row">

                            <div id="carouselExampleIndicators" class="offset-2 col-8 carousel slide carousel-fade" data-bs-ride="true">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="resource/slide/posterimg.jpg" class="d-block poster-img1" />
                                        <div class="carousel-caption d-none d-md-block poster-caption">

                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="resource/slide/posterimg3.jpg" class="d-block poster-img1" />
                                    </div>
                                    <div class="carousel-item">
                                        <img src="resource/slide/posterimg2.jpg" class="d-block poster-img1" />
                                        <div class="carousel-caption d-none d-md-block poster-caption1">
                                            <h5 class="poster-title">STAY SAFE & LEARN WELL</h5>
                                            <p class="poster-text text-light">A valuable gift from government for student</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="resource/slide/posterimg4.jpg" class="d-block poster-img1" />
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                        </div>
                    </div>

                    <!-- carousel -->

                    <div class="offset-lg-1 col-lg-11 bg-transparent">
                        <div class="row" id="sort">
                            <div class="col-12">
                                <div>
                                    <?php
                                    include_once "connection.php";

                                    $query = Database::search("SELECT * FROM as_files");
                                    while ($info = mysqli_fetch_array($query)) {
                                    ?>
                                        <embed src="pdf/<?php echo $info['file_code']; ?>" class="btn" type="" width="400" height="400">
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="bootstrap.bundle.js"></script>
    <script src="script.js"></script>
</body>

</html>