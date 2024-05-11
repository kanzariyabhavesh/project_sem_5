<?php include('head.php'); ?>
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Teacher Form</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Teacher Form</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <center>
    <style>
      .error {
        color: red;
      }

      .form-container {
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 600px;
        margin: 0 auto;
      }
    </style>
    <?php
    $nameErr = "";
    $SalaryErr = "";
    $JoiningErr = "";
    $emailErr = "";
    $phone_numberErr = "";
    $genderErr = "";
    $addressErr = "";
    $id = "";
    if (isset($_GET['nameErr'])) {
      $nameErr = $_GET['nameErr'];
    }
    if (isset($_GET['SalaryErr'])) {
      $SalaryErr = $_GET['SalaryErr'];
    }
    if (isset($_GET['JoiningErr'])) {
      $JoiningErr = $_GET['JoiningErr'];
    }
    if (isset($_GET['emailErr'])) {
      $emailErr = $_GET['emailErr'];
    }
    if (isset($_GET['phone_numberErr'])) {
      $phone_numberErr = $_GET['phone_numberErr'];
    }
    if (isset($_GET['genderErr'])) {
      $genderErr = $_GET['genderErr'];
    }
    if (isset($_GET['addressErr'])) {
      $addressErr = $_GET['addressErr'];
    }
    if (isset($_GET['id'])) {
      $id = $_GET['id'];
    }

    ?>

    <div class="form-container">
      <form id="form" method="post" action="Teacher_form/from_insert.php">
        <div class="row d-flex">
          <div class="form-group col-md-6">
            <label for="name" class="col-form-label">Full name</label>
            <input type="text" class="form-control" id="name" placeholder="Full name" name="name" value="<?php echo isset($_GET['oldname']) ? $_GET['oldname'] : ""; ?>">
            <p class="error"><?php echo  $nameErr; ?></p>
          </div>

          <div class="form-group col-md-6">
            <label for="email" class="col-form-label">E-mail</label>
            <input type="text" class="form-control" id="email" placeholder="E-mail" name="email" value="<?php echo isset($_GET['oldemail']) ? $_GET['oldemail'] : ""; ?>">
            <p class="error"><?php echo  $emailErr; ?></p>
          </div>
          <div class="form-group col-md-6">
            <label for="phone_number" class="col-form-label">Phone number</label>
            <input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Phone number" value="<?php echo isset($_GET['oldphone_number']) ? $_GET['oldphone_number'] : ""; ?>">
            <p class="error"><?php echo  $phone_numberErr; ?></p>
          </div>
          <div class="form-group col-md-6">
            <label for="gender" class="col-form-label">Gender</label>
            <div class="form-group ">
              <select name="gender" id="gender_id" class="form-control" value="<?php echo isset($_GET['oldgender']) ? $_GET['oldgender'] : ""; ?>">
                <option value="">Select Gender</option>
                <option value="Male" <?php if (isset($_GET['oldgender'])) {
                                        if ($_GET['oldgender'] == 'Male') {
                                          echo ' selected=\"selected\"';
                                        }
                                      } ?>>Male</option>
                <option value="Female" <?php if (isset($_GET['oldgender'])) {
                                          if ($_GET['oldgender'] == 'Female') {
                                            echo ' selected=\"selected\"';
                                          }
                                        } ?>>Female</option>
              </select>
            </div>
            <p class="error"><?php echo  $genderErr; ?></p>
          </div>
          <div class="form-group col-md-6">
            <label for="Salary" class="col-form-label">Salary</label>
            <input type="number" class="form-control" id="Salary" placeholder="Salary" name="Salary" value="<?php echo isset($_GET['oldSalary']) ? $_GET['oldSalary'] : ""; ?>">
            <p class="error"><?php echo  $SalaryErr; ?></p>
          </div>

          <div class="form-group col-md-6">
            <label for="dob" class="col-form-label">Joining data</label>
            <input type="date" class="form-control" id="Joining" placeholder="Joining" name="Joining" value="<?php echo isset($_GET['oldJoining']) ? $_GET['oldJoining'] : ""; ?>">
            <p class="error"><?php echo  $JoiningErr; ?></p>
          </div>
          <div class="form-group col-md-7">
            <label for="address" class="col-form-label">Address</label>
            <textarea name="address" class="form-control " id="address" cols="30" rows="10"><?php echo isset($_GET['oldaddress']) ? $_GET['oldaddress'] : ""; ?></textarea>
            <p class="error"><?php echo  $addressErr; ?></p>
          </div>
            <div class="form-group col-md-12" style="margin-left: -179px;">
              <label class="col-form-label" style="font-size: 20px">Subjects</label>
              <button type="button" class="btn btn-success" style="margin-left: 15px;" onclick="addSubject()">Add subject</button>
            </div>
            <div class="row d-flex">
              <div class="table-responsive p-0">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th style="width: 50%">Standard</th>
                      <th style="width: 50%">Subject</th>
                      <th style="width: 33%">Action</th>
                    </tr>
                  </thead>
                  <tbody id="subjectTableBody"></tbody>
                </table>
              </div>
          </div>
          

          <?php
          if (isset($_GET['id'])) {
          ?>
            <input type="hidden" value='<?php echo $_GET['id']; ?>' name="id">
          <?php
          }
          ?>
        </div>
    </div>
    <div class="modal-footer">
      <a href="#">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
      <?php
      if ($id == "") {
      ?>
        <button type="submit" class="btn btn-primary" name="Save">Save</button>
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
    <script>
      function addSubject() {
        var rowId = Date.now();
        console.log(rowId);
        var newRow = `
            <tr id="time_table_row_${rowId}">
                <td>
                    <select class="form-control select2" name="Standard[]">
                        <option value="">Standard</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                </td>
                
                <td>
                <select class="form-control select2" name="subject[]">
                <option value="">Subject</option><option value="Math">Math</option><option value="Science">Science</option><option value="English">English</option><option value="SocialScience">SocialScience</option><option value="sanskut">sanskut</option><option value="Gujrati">Gujrati</option><option value="Hindi">Hindi</option><option value="ComputerScience">ComputerScience</option><option value="Account">Account</option><option value="BA">BA</option><option value="State">State</option><option value="Economics">Economics</option><option value="5">SP</option><option value="English">English</option><option value="Gujrati">Gujrati</option>
                    </select>
                </td>
                <td>
                    <button type="button" class="btn btn-danger" onclick="removeSubject(${rowId})">Delete</button>
                </td>
            </tr>`;

        $('#subjectTableBody').append(newRow);
      }

      function removeSubject(rowId) {
        $('#time_table_row_' + rowId).remove();
      }
    </script>
  </center>
  <?php include('footer.php') ?>