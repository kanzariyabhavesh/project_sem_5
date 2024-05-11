<?php include('head.php'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Exam create</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Exam create</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <style>
    .form-container {
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      max-width: 600px;
      margin: 0 auto;
    }

    .s {
      margin-left: 30px;
    }

    .error {
      color: red;
    }
  </style>
  <?php
  $examNameErr = "";
  $standerErr = "";
  $classRoomErr = "";
  $totalMarksErr = "";
  $passingMarksErr = "";
  $startDateErr = "";
  $endDateErr = "";
  $id = "";
  if (isset($_GET['examNameErr'])) {
    $examNameErr = $_GET['examNameErr'];
  }
  if (isset($_GET['standerErr'])) {
    $standerErr = $_GET['standerErr'];
  }
  if (isset($_GET['totalMarksErr'])) {
    $totalMarksErr = $_GET['totalMarksErr'];
  }
  if (isset($_GET['passingMarksErr'])) {
    $passingMarksErr = $_GET['passingMarksErr'];
  }
  if (isset($_GET['startDateErr'])) {
    $startDateErr = $_GET['startDateErr'];
  }
  if (isset($_GET['endDateErr'])) {
    $endDateErr = $_GET['endDateErr'];
  }

  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }

  ?>
  <div class="form-container">
    <form id="form" method="post" action="Exam/exam_inser.php">
      <div class="row d-flex">
        <div class="form-group s">
          <label for="examName" class="col-form-label">Exam Name</label>
          <input type="text" class="form-control" id="examName" name="examName" value="<?php echo isset($_GET['oldexamName']) ? $_GET['oldexamName'] : ""; ?>">
          <p class="error"><?php echo  $examNameErr; ?></p>
        </div>

        <div class="form-group s">
          <label for="class" class="col-form-label">stander</label>
          <input type="text" class="form-control" id="stander" name="stander" value="<?php echo isset($_GET['oldstander']) ? $_GET['oldstander'] : ""; ?>">
          <p class="error"><?php echo  $standerErr; ?></p>
        </div>
        <div class="form-group s">
          <label for="totalMarks" class="col-form-label">Total Marks</label>
          <input type="number" class="form-control" id="totalMarks" name="totalMarks" value="<?php echo isset($_GET['oldtotalMarks']) ? $_GET['oldtotalMarks'] : ""; ?>">
          <p class="error"><?php echo  $totalMarksErr; ?></p>
        </div>

        <div class="form-group s">
          <label for="passingMarks" class="col-form-label">Passing Marks</label>
          <input type="number" class="form-control" id="passingMarks" name="passingMarks" value="<?php echo isset($_GET['oldpassingMarks']) ? $_GET['oldpassingMarks'] : ""; ?>">
          <p class="error"><?php echo  $passingMarksErr; ?></p>
        </div>

        <div class="form-group s">
          <label for="startDate" class="col-form-label">Exam Start Date</label>
          <input type="date" class="form-control" id="startDate" name="startDate" value="<?php echo isset($_GET['oldstartDate']) ? $_GET['oldstartDate'] : ""; ?>">
          <p class="error"><?php echo  $startDateErr; ?></p>
        </div>

        <div class="form-group s">
          <label for="endDate" class="col-form-label">Exam End Date</label>
          <input type="date" class="form-control" id="endDate" name="endDate" value="<?php echo isset($_GET['oldendDate']) ? $_GET['oldendDate'] : ""; ?>">
          <p class="error"><?php echo  $endDateErr; ?></p>
        </div>
        <?php
        if (isset($_GET['id'])) {
        ?>
          <input type="hidden" value='<?php echo $_GET['id']; ?>' name="id">
        <?php
        }
        ?>
      </div>

      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Reset</button>
        <?php
        if ($id == "") {
        ?>
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        <?php
        } ?>
        <?php
        if ($id != "") {
        ?>
          <button type="submit" class="btn btn-primary" name="update">UPDATE</button>
        <?php
        } ?>
      </div>
    </form>
  </div>
  <?php include('footer.php') ?>