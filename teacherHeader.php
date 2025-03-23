<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css" />
  <link rel="stylesheet" href="style.css" />

  <link rel="icon" href="resource/logo.svg" />

</head>

<body>
  <div class="col-12">
    <div class="row mt-1 mb-1">

      <div class="offset-lg-1 col-12 col-lg-3 align-self-start mt-2">

        <?php

        session_start();

        if (isset($_SESSION["teacher"])) {
          $data = $_SESSION["teacher"];

        ?>

          <span class="text-lg-start link link-dark welcome text-uppercase fs-6" title="User name"><?php echo $data["fname"]; ?></span> |
          <span class="text-lg-start fw-bold link link-danger fs-6 signout" onclick="signout1();" title="Press to Signout"><img src="resource\refresh.svg" style="width:20px;" />Sign out</span> |

        <?php

        } else {
        ?>

          <a href="teacherindex.php" class="btn text-light text-decoration-none fw-bold text-uppercase" style="background-color: #ce0167;"><img src="resource\refresh.svg" style="width:25px;" /> Register</a>

        <?php

        }

        ?>

        <span class="text-lg-start fw-bold link link-primary"><img src="resource\support.svg" style="width:20px;" /> Help & Contact</span>
      </div>

      <div class="offset-lg-4 col-12 col-lg-3 align-self-end">
        <div class="row">
          <div class="col-2 col-lg-6 dropdown">
            <button class="btn dropdown-toggle text-light fw-bold" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: #08e27c;">
            <img src="resource/settings.svg" style="width:25px;" /> SETTINGS
            </button>
            <ul class="dropdown-menu" style="background-color: #4ce9a0;">
              <li><a class="dropdown-item" href="teacherhome.php">Home page</a></li>
              <li><a class="dropdown-item" href="teacherprofile.php">My Profile</a></li>
              <li><a class="dropdown-item" href="AddLessonNotes.php">Add Lesson Notes</a></li>
              <li><a class="dropdown-item" href="assignmentVerification.php">Add Assignments</a></li>
              <li><a class="dropdown-item" href="MyLessonNotes.php">My Lesson Notes</a></li>
              <li><a class="dropdown-item" href="teacherSubmittedAnswer_sheet.php">Submitted Answer</a></li>

          
            </ul>
          </div>
         
        </div>
      </div>
    </div>
  </div>

  <script src="script.js"></script>
</body>

</html>
