<?php
include('head.php');
include('database.php');
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Class</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Class</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
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
    $standardErr = "";
    $ClassRoomErr = "";
    $teacherErr = "";
    $id = "";
    if (isset($_GET['standardErr'])) {
        $standardErr = $_GET['standardErr'];
    }
    if (isset($_GET['ClassRoomErr'])) {
        $ClassRoomErr = $_GET['ClassRoomErr'];
    }
    if (isset($_GET['teacherErr'])) {
        $teacherErr = $_GET['teacherErr'];
    }
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    ?>

    <div class="form-container">
        <form id="form" method="post" action="class/class_insert.php">
            <div class="row d-flex">
                <label for="standard_id" class="col-sm-4 col-form-label">Standard</label>
                <select class="form-control select2 select2-hidden-accessible" name="standard" id="standard_id" style="width: 100%;" tabindex="-1" aria-hidden="true" data-select2-id="standard_id">
                    <option value="">Select standard</option>
                    <option value="9" <?php if (isset($_GET['oldstandard'])) {
                                            if ($_GET['oldstandard'] == '9') {
                                                echo 'selected=\"selected\"';
                                            }
                                        } ?>>9</option>
                    <option value="10" <?php if (isset($_GET['oldstandard'])) {
                                            if ($_GET['oldstandard'] == '10') {
                                                echo 'selected=\"selected\"';
                                            }
                                        } ?>>10</option>
                    <option value="11" <?php if (isset($_GET['oldstandard'])) {
                                            if ($_GET['oldstandard'] == '11') {
                                                echo 'selected=\"selected\"';
                                            }
                                        } ?>>11</option>
                    <option value="12" <?php if (isset($_GET['oldstandard'])) {
                                            if ($_GET['oldstandard'] == '12') {
                                                echo 'selected=\"selected\"';
                                            }
                                        } ?>>12</option>
                </select>
            </div>
            <p class="error"><?php echo  $standardErr; ?></p>
            <div class="row">
                <label for="name" class="col-sm-4 col-form-label">ClassRoom</label>
                <select class="form-control select2 select2-hidden-accessible" name="ClassRoom" id="ClassRoom" style="width: 100%;" tabindex="-1" aria-hidden="true" data-select2-id="teacher_id">
                    <option value="" data-select2-id="64">Select ClassRoom</option>
                    <option value="A" <?php if (isset($_GET['oldClassRoom'])) {
                                            if ($_GET['oldClassRoom'] == 'A') {
                                                echo 'selected=\"selected\"';
                                            }
                                        } ?>>A</option>
                    <option value="B" <?php if (isset($_GET['oldClassRoom'])) {
                                            if ($_GET['oldClassRoom'] == 'B') {
                                                echo 'selected=\"selected\"';
                                            }
                                        } ?>>B</option>
                    <option value="C" <?php if (isset($_GET['oldClassRoom'])) {
                                            if ($_GET['oldClassRoom'] == 'C') {
                                                echo 'selected=\"selected\"';
                                            }
                                        } ?>>C</option>
                    <option value="D" <?php if (isset($_GET['oldClassRoom'])) {
                                            if ($_GET['oldClassRoom'] == 'D') {
                                                echo 'selected=\"selected\"';
                                            }
                                        } ?>>D</option>
                </select>
            </div>
            <p class="error"><?php echo  $ClassRoomErr; ?></p>
            <div class="row">
                <label for="teacher_id" class="col-sm-4 col-form-label">Select class teacher</label>
                <select class="form-control select2 select2-hidden-accessible" name="teacher" id="teacher_id" style="width: 100%;" tabindex="-1" aria-hidden="true" data-select2-id="teacher_id">
                    <option value="" data-select2-id="64">Select class teacher</option>
                    <?php
                    $sql = 'SELECT * FROM `teacher_form`';
                    $result = mysqli_query($conn, $sql);
                    $no = 0;
                    $marks = [];
                    while ($row = mysqli_fetch_assoc($result)) {
                        $selected = '';
                        if (isset($_GET['oldteacher']) && $_GET['oldteacher'] == $row['name']) {
                            $selected = 'selected="selected"';
                        }
                        echo '<option value="' . $row['name'] . '" ' . $selected . '>' . $row['name'] . '</option>';
                    }
                    ?>
                </select>
            </div>
            <p class="error"><?php echo  $teacherErr; ?></p>
            <?php
            if (isset($_GET['id'])) {
            ?>
                <input type="hidden" value='<?php echo $_GET['id']; ?>' name="id">
            <?php
            }
            ?>
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

        <?php include('footer.php'); ?>