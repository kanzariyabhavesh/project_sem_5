<?php include('head.php'); ?>

<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Result</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Result</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <style>
    h1 {
      margin-left: 450px
    }

    .header {
      text-align: center;
      font-size: 50px;
      font-weight: initial;
      margin-bottom: 20px;
      width: 100%;
      color: red;
      background-color: #f0f8ff;

    }

    .exam-info {
      font-size: 20px;

      padding-left: 10%;
      display: flex;
      justify-content: space-between;
      margin-bottom: 20px;
      background-color: #f0f8ff;
    }

    .dates,
    .standards {
      font-size: 20px;
      padding-right: 10%;
      flex-basis: 48%;
    }

    .modal-80 {
      max-width: 80%;
    }
  </style>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  <div class="header"><?php
                      echo isset($_GET['examname']) ? $_GET['examname'] : "";
                      ?></div>
  <div class="exam-info">
    <div class="dates">
      <p>Exam Start Date:<?php echo isset($_GET['startDate']) ? $_GET['startDate'] : ""; ?></p>
      <p>Exam End Date::<?php echo isset($_GET['endDate']) ? $_GET['endDate'] : ""; ?></p>
      <p>Exam Total Mark: <?php echo isset($_GET['totalMarks']) ? $_GET['totalMarks'] : ""; ?></p>

    </div>
    <div class="standards ">
      <p>Standard:<?php echo isset($_GET['stander']) ? $_GET['stander'] : ""; ?></p>
      <p>Class: <?php echo isset($_POST['class']) ? $_POST['class'] : ""; ?></p>
      <p>passing mark:<?php echo isset($_GET['passingMarks']) ? $_GET['passingMarks'] : ""; ?></p>
    </div>
  </div>
  <div>
    <form method="post" id="Class">
      <p>Class:
        <select name="class" id="classSelect" onchange="ok()">
          <option value="">Class Room</option>
          <option value="A">A</option>
          <option value="B">B</option>
          <option value="C">C</option>
          <option value="D">D</option>
        </select>
      </p>
    </form>
    <script>
      function ok() {
        document.getElementById('Class').submit();
      }
    </script>
  </div>
  <?php
  if (isset($_POST['class'])) {
    if ($_POST['class'] != '') {
  ?>
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="margin-left: 1070px;">
        Create Result
      </button>
  <?php }
  } ?>
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-80">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Create Result</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
              <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
              <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
            </svg>
          </button>
        </div>
        <div class="modal-body">

          <?php
          include "database.php";

          $sql = 'SELECT * FROM `subject`';
          $result = mysqli_query($conn, $sql);
          $no = 0;

          $subject = [];
          while ($row = mysqli_fetch_assoc($result)) {
            if ($_GET['stander'] == $row['standard']) {
              $sub = explode(',', $row['subject']);
              foreach ($sub as $key => $subjects) {
                $subject[] = $subjects;
              }
            }
          }


          ?>
          <div class="container">
            <div class="table-responsive">
              <table class='table table-bordered' id="myTable">
                <thead>
                  <tr>
                    <th>Full Name</th>
                    <th>Parent Name</th>
                    <th>Address</th>
                    <?php
                    for ($i = 1; $i < count($subject); $i++) {
                      echo '<th>' . $subject[$i] . '</th>';
                    }
                    ?>
                    <th>actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = 'SELECT * FROM `student_form_value`';
                  $result = mysqli_query($conn, $sql);
                  $subj = '';
                  $full_name = [];
                  while ($row = mysqli_fetch_assoc($result)) {
                    $full_name[] = $row['fullname'];
                    if ($_GET['stander'] == $row['standard']) {
                      if ($_POST['class'] == $row['classroom']) {
                        echo "<tr>
                            <td>" . $row['fullname'] . "</td>
                            <td>" . $row['parentname'] . "</td>
                            <td>" . $row['address'] . "</td>";

                        for ($i = 1; $i < count($subject); $i++) {
                          echo "<td>"; ?>
                          <form action="mark/mark_insert.php">
                            <input type='hidden' name='standard' value="<?php echo $_GET['stander']; ?>">
                            <input type='hidden' name='class' value="<?php echo $_POST['class']; ?>">
                            <input type='hidden' name='id' value="<?php echo $_GET['id']; ?>">
                            <input type='hidden' name='fullname' value="<?php echo $row['fullname']; ?>">
                            <input type='hidden' name='parentname' value="<?php echo $row['parentname']; ?>">
                            <input type='hidden' name='totalMarks' value="<?php echo $_GET['totalMarks']; ?>">
                            Theory: <input type='text' name='<?php echo $subject[$i]; ?>' required>

                            </td>

                          <?php

                        }

                        echo "<td>";
                          ?>
                          <button type="submit" class="btn btn-primary">Save</button>
                          </form>
                    <?php
                        echo " </td></tr>";
                      }
                    }
                  }
                    ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <?php
  if (isset($_POST['class'])) {
    if ($_POST['class'] != '') {
  ?>
      <div class="container">
        <table class='table' border='10px' id="myTable">
          <thead>
            <tr>
              <th>no</th>
              <th>Full Name</th>
              <th>Parent Name</th>
              <th>Standard</th>
              <th>Class Room</th>
              <?php
              for ($i = 1; $i < count($subject); $i++) {
                echo '<th>' . $subject[$i] . '</th>';
              }
              ?>
              <th>actions</th>
            </tr>
          </thead>
          <?php
          $sql = 'SELECT * FROM `marks`';
          $result = mysqli_query($conn, $sql);
          $no = 0;
          $marks = [];
          while ($row = mysqli_fetch_assoc($result)) {
            if ($row['stander'] == $_GET['stander'] && $row['classroom'] == $_POST['class'] && $row['totlemarks'] == $_GET['totalMarks']) {
              $no = $no + 1;
              $submarks = explode(',', $row['subjectmarks']);
              foreach ($submarks as $key => $subjectmarks) {
                $marks[] = $subjectmarks;
              }
              echo "<tr>
                      <td scope='row'>" . $no . "</td>
                      <td>" . $row['fullname'] . "</td>
                      <td>" . $row['parentname'] . "</td>
                      <td>" . $row['stander'] . "</td>
                      <td>" . $row['classroom'] . "</td>";
              for ($i = 6; $i < count($marks); $i++) {
                $subjectmark = explode(":", $marks[$i]);
                echo "<td>" . $subjectmark[1] . "</td>";
              }
              echo "<td>
          <button type='button' class='btn btn-warning'><a href='result_preview.php?fullname=$row[fullname]&parentname=$row[parentname]&examname=$_GET[examname]&totalMarks=$_GET[totalMarks]&stander=$_GET[stander]&class=$_POST[class]&passingMarks=$_GET[passingMarks]'>preview</a></button>
          </td></tr>";
              $marks = [];
            }
          }

          ?>
          <tbody>
          </tbody>
        </table>
      </div>
</div>
<?php
    }
  } ?>
<?php include('footer.php'); ?>