<!DOCTYPE html>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>e - SEWANA</title>

    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css" />

    <link rel="icon" href="resource/logo.png" />

</head>

<body class="main-body">

    <div class="container-fluid vh-100 d-flex justify-content-center">
        <div class="row align-content-center">

            <!-- header -->
            <div class="col-12">
                <div class="row">
                    <div class="col-lg-9 col-8 mt-lg-0 mt-4 offset-lg-1 logo"></div>
                    <div class="col-lg-1 col-2 mt-lg-0 mt-4 link-primary fw-bold"><a href="teacherindex.php">Login as a Teacher</a></div>
                    <div class="col-lg-1 col-2 mt-lg-0 mt-4 link-primary fw-bold"><a href="academicindex.php">Login as an academic officer</a></div>
                    <div class="col-12">
                        <p class="text-center title1">e- SEWANA Online Education Portal</p>
                    </div>
                </div>
            </div>
            <!-- header -->

            <!-- content -->
            <div class="col-12 p-3">
                <div class="row">

                    <div class="col-6 d-none d-lg-block background"></div>
                    <div class="col-12 col-lg-6" id="signUpBox">
                        <div class="row g-2">
                            <div class="col-12">
                                <p class="title2 fw-bold">CREATE NEW ACCOUNT</p>
                            </div>
                            <div class="col-12 d-none" id="msgdiv">
                                <div class="alert alert-danger" role="alert" id="alertdiv">
                                    <i class="bi bi-x-octagon-fill fs-5" id="msg">

                                    </i>
                                </div>
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">First Name</label>
                                <input type="text" class="form-control" id="fname" style="background-color: #4ce9a0;" />
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Last Name</label>
                                <input type="text" class="form-control" id="lname" style="background-color: #4ce9a0;"  />
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Email</label>
                                <input type="email" class="form-control" id="email" style="background-color: #4ce9a0;"  />
                            </div>
                            <div class="col-12">
                                <label class="form-label fw-bold">Password</label>
                                <input type="password" class="form-control" id="pass" style="background-color: #4ce9a0;"  />
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Mobile</label>
                                <input type="text" class="form-control" id="mobile" style="background-color: #4ce9a0;"  />
                            </div>
                            <div class="col-6">
                                <label class="form-label fw-bold">Gender</label>
                                <select class="form-select text-dark text-uppercase fw-bold" id="gender" style="background-color: #4ce9a0;" >
                                    <?php

                                    require "connection.php";

                                    $rs = Database::search("SELECT * FROM `gender`");
                                    $n = $rs->num_rows;

                                    for ($x = 0; $x < $n; $x++) {
                                        $d = $rs->fetch_assoc();

                                    ?>

                                        <option value="<?php echo $d["gender_id"]; ?>"><?php echo $d["gender_name"]; ?></option>

                                    <?php

                                    }

                                    ?>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn border border-2 border-white text-light text-uppercase fw-bold" onclick="signUp();" style="background-color: #d11c76;">Sign Up</button>
                            </div>
                            <div class="col-12 col-lg-6 d-grid">
                                <button class="btn btn-dark border border-2 border-white text-light text-uppercase fw-bold" onclick="changeView();" style="background-color: #150135;">Let me login </button>
                            </div>
                        </div>
                    </div>
                    <?php

                    ?>

                        <div class="col-12 col-lg-6 d-none" id="signInBox">
                            <div class="row g-2">
                                <div class="col-12">
                                    <p class="title2 fw-bold">SIGN IN </p>
                                    <div class="col-12 d-none" id="msgdiv2">
                                        <div class="alert alert-danger" role="alert" id="alertdiv2">
                                            <i class="bi bi-x-octagon-fill fs-5" id="msg2">
                                            </i>
                                        </div>
                                    </div>
                                </div>

                                <?php

                                $email = "";
                                $password = "";

                                if (isset($_COOKIE["email"])) {
                                    $email = $_COOKIE["email"];
                                }

                                if (isset($_COOKIE["password"])) {
                                    $password = $_COOKIE["password"];
                                }

                                ?>

                                <div class="col-12">
                                    <label class="form-label fw-bold">Email</label>
                                    <input type="email" class="form-control" id="email2" value="<?php echo $email; ?>" style="background-color: #4ce9a0;"  />
                                </div>
                                <div class="col-12">
                                    <label class="form-label fw-bold">Password</label>
                                    <input type="password" class="form-control" id="password2" value="<?php echo $password; ?>" style="background-color: #4ce9a0;"  />
                                </div>
                                <div class="col-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="rememberme" style="background-color: #4ce9a0;"/>
                                        <label class="form-check-label text-uppercase">Remember Me</label>
                                    </div>
                                </div>
                                <div class="col-6 text-end">
                                    <a href="#" class="link-primary text-uppercase fw-bold" onclick="forgotPassword();">Forgot Password?</a>
                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="btn border border-2 border-white text-light text-uppercase fw-bold" onclick="signIn();" style="background-color: #d11c76;">Sign In</button>
                                </div>
                                <div class="col-12 col-lg-6 d-grid">
                                    <button class="btn btn-dark border border-2 border-white text-light text-uppercase fw-bold" onclick="changeView();" style="background-color: #033d2a;">I haven't any account Yet</button>
                                </div>
                            </div>

                        </div>

                </div>
            </div>
            <!-- content -->

        <!-- modal -->

        <div class="modal" tabindex="-1" id="forgotPasswordModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Reset Password</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-3">

                            <div class="col-6">
                                <label class="form-label">New Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="newpassinput" />
                                    <button class="btn btn-outline-secondary" type="button" id="newpassbtn" onclick="ShowPass();">
                                        <i id="eye1" class="bi bi-eye-slash-fill">
                                        </i>
                                    </button>
                                </div>
                            </div>

                            <div class="col-6">
                                <label class="form-label">Re type Password</label>
                                <div class="input-group mb-3">
                                    <input type="password" class="form-control" id="retypepassinput" />
                                    <button class="btn btn-outline-secondary" type="button" id="retypepassbtn" onclick="ShowRetypePass();">
                                        <i id="eye2" class="bi bi-eye-slash-fill"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Verification Code</label>
                                <input type="text" class="form-control" id="verifycode" />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" onclick="resetpass();">Reset Password</button>
                    </div>
                </div>
            </div>
        </div>



        <!-- modal -->

        <!-- footer -->

        <div class="col-12 fixed-bottom d-none d-lg-block">
            <p class="text-center fw-bold">&copy; 2023 eSewana.lk || All Right Reserved</p>
        </div>

        <!-- footer -->

        </div>

    </div>

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>