<?php
include('head.php');
include('database.php');
$standars = $_GET['standard'];
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Class Time Table Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Class Time Table Form</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="time_table/class_time_table_insert.php">
        <div class="row d-flex">
            <div class="form-group col-md-4">
                <label for="standard" class="col-form-label">Standard</label>
                <input readonly="" class="form-control" id="standard_name" value="<?php echo isset($_GET['standard']) ? $_GET['standard'] : ""; ?>" name="Standard">
            </div>
            <div class="form-group col-md-4">
                <label class="col-form-label">Class</label>
                <input readonly="" class="form-control" id="class_name" value="<?php echo isset($_GET['ClassRoom']) ? $_GET['ClassRoom'] : ""; ?>" name="Class">
            </div>
        </div>
        <div class="row d-flex">
            <div class="form-group col-md-12">
                <label class="col-form-label" style="font-size: 20px">Subjects</label>
                <button type="button" class="btn btn-success" style="margin-left: 15px;" onclick="addTimetableInTime()">Add subject</button>
            </div>
        </div>
        <div class="row d-flex">
            <div class="table-responsive p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 18%">Time</th>
                            <th style="width: 12%">Monday</th>
                            <th style="width: 12%">Tuesday</th>
                            <th style="width: 12%">Wednesday</th>
                            <th style="width: 12%">Thursday</th>
                            <th style="width: 12%">Friday</th>
                            <th style="width: 12%">Saturday</th>
                        </tr>
                    </thead>
                    <tbody id="allSubjects">
                        <tr id="time_table_row_0">
                            <td>
                                From:<input type="time" class="form-control" id="exam_time_0"  name="start_time[]">
                                To:<input type="time" class="form-control" id="exam_time_0" name="end_time[]">
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[subject_id][]" id="mon_subject_id_0" data-select2-id="mon_subject_id_0" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '" name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                            <option value="Recess">Recess</option>
                                </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[teacher_id][]" id="mon_teacher_id_0" data-select2-id="mon_teacher_id_0" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[subject_id][]" id="tue_subject_id_0" data-select2-id="tue_subject_id_0" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>

                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[teacher_id][]" id="tue_teacher_id_0" data-select2-id="tue_teacher_id_0" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[subject_id][]" id="wed_subject_id_0" data-select2-id="wed_subject_id_0" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[teacher_id][]" id="wed_teacher_id_0" data-select2-id="wed_teacher_id_0" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[subject_id][]" sid="thu_subject_id_0" data-select2-id="thu_subject_id_0" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[teacher_id][]" id="thu_teacher_id_0" data-select2-id="thu_teacher_id_0" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[subject_id][]" id="fri_subject_id_0" data-select2-id="fri_subject_id_0" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[teacher_id][]" id="fri_teacher_id_0" data-select2-id="fri_teacher_id_0" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[subject_id][]" id="sat_subject_id_0" data-select2-id="sat_subject_id_0" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[teacher_id][]" id="sat_teacher_id_0" data-select2-id="sat_teacher_id_0" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="removeTimeTableRow(0)">Delete</button>
                            </td>
                        </tr>
                        <tr id="time_table_row_1">
                            <td>
                                From:<input type="time" class="form-control" id="exam_time_0"  name="start_time[]">
                                To:<input type="time" class="form-control" id="exam_time_0" name="end_time[]">
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[subject_id][]" id="mon_subject_id_1" data-select2-id="mon_subject_id_1" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[teacher_id][]" id="mon_teacher_id_1" data-select2-id="mon_teacher_id_1" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[subject_id][]" id="tue_subject_id_1" data-select2-id="tue_subject_id_1" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[teacher_id][]" id="tue_teacher_id_1" data-select2-id="tue_teacher_id_1" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="50">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[subject_id][]" id="wed_subject_id_1" data-select2-id="wed_subject_id_1" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[teacher_id][]" id="wed_teacher_id_1" data-select2-id="wed_teacher_id_1" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="52">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[subject_id][]" id="thu_subject_id_1" data-select2-id="thu_subject_id_1" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[teacher_id][]" id="thu_teacher_id_1" data-select2-id="thu_teacher_id_1" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="54">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[subject_id][]" id="fri_subject_id_1" data-select2-id="fri_subject_id_1" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[teacher_id][]" id="fri_teacher_id_1" data-select2-id="fri_teacher_id_1" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="56">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[subject_id][]" id="sat_subject_id_1" data-select2-id="sat_subject_id_1" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[teacher_id][]" id="sat_teacher_id_1" data-select2-id="sat_teacher_id_1" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="58">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="removeTimeTableRow(1)">Delete</button>
                            </td>
                        </tr>
                        <tr id="time_table_row_2">
                            <td>
                                From:<input type="time" class="form-control" id="exam_time_0"  name="start_time[]">
                                To:<input type="time" class="form-control" id="exam_time_0" name="end_time[]">
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[subject_id][]" id="mon_subject_id_2" data-select2-id="mon_subject_id_2" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[teacher_id][]" id="mon_teacher_id_2" data-select2-id="mon_teacher_id_2" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[subject_id][]" id="tue_subject_id_2" data-select2-id="tue_subject_id_2" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[teacher_id][]" id="tue_teacher_id_2" data-select2-id="tue_teacher_id_2" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[subject_id][]" id="wed_subject_id_2" data-select2-id="wed_subject_id_2" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[teacher_id][]" id="wed_teacher_id_2" data-select2-id="wed_teacher_id_2" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[subject_id][]" id="thu_subject_id_2" data-select2-id="thu_subject_id_2" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[teacher_id][]" id="thu_teacher_id_2" data-select2-id="thu_teacher_id_2" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[subject_id][]" ] id="fri_subject_id_2" data-select2-id="fri_subject_id_2" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[teacher_id][]" id="fri_teacher_id_2" data-select2-id="fri_teacher_id_2" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[subject_id][]" id="sat_subject_id_2" data-select2-id="sat_subject_id_2" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[teacher_id][]" id="sat_teacher_id_2" data-select2-id="sat_teacher_id_2" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="removeTimeTableRow(2)">Delete</button>
                            </td>
                        </tr>
                        <tr id="time_table_row_3">
                            <td>
                                From:<input type="time" class="form-control" id="exam_time_0"  name="start_time[]">
                                To:<input type="time" class="form-control" id="exam_time_0" name="end_time[]">
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[subject_id][]" id="mon_subject_id_3" data-select2-id="mon_subject_id_3" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="84">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[teacher_id][]" id="mon_teacher_id_3" data-select2-id="mon_teacher_id_3" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="96">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[subject_id][]" id="tue_subject_id_3" data-select2-id="tue_subject_id_3" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="86">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[teacher_id][]" id="tue_teacher_id_3" data-select2-id="tue_teacher_id_3" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="98">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[subject_id][]" id="wed_subject_id_3" data-select2-id="wed_subject_id_3" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="88">Subject</option>

                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[teacher_id][]" id="wed_teacher_id_3" data-select2-id="wed_teacher_id_3" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="100">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[subject_id][]" id="thu_subject_id_3" data-select2-id="thu_subject_id_3" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="90">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[teacher_id][]" id="thu_teacher_id_3" data-select2-id="thu_teacher_id_3" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="102">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[subject_id][]" id="fri_subject_id_3" data-select2-id="fri_subject_id_3" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="92">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[teacher_id][]" id="fri_teacher_id_3" data-select2-id="fri_teacher_id_3" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="104">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[subject_id][]" id="sat_subject_id_3" data-select2-id="sat_subject_id_3" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="94">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[teacher_id][]" id="sat_teacher_id_3" data-select2-id="sat_teacher_id_3" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="106">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="removeTimeTableRow(3)">Delete</button>
                            </td>
                        </tr>
                        <tr id="time_table_row_4">
                            <td>
                                From:<input type="time" class="form-control" id="exam_time_0"  name="start_time[]">
                                To:<input type="time" class="form-control" id="exam_time_0" name="end_time[]">
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[subject_id][]" id="mon_subject_id_4" data-select2-id="mon_subject_id_4" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[teacher_id][]" id="mon_teacher_id_4" data-select2-id="mon_teacher_id_4" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[subject_id][]" id="tue_subject_id_4" data-select2-id="tue_subject_id_4" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[teacher_id][]" id="tue_teacher_id_4" data-select2-id="tue_teacher_id_4" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[subject_id][]" id="wed_subject_id_4" data-select2-id="wed_subject_id_4" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[teacher_id][]" id="wed_teacher_id_4" data-select2-id="wed_teacher_id_4" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[subject_id][]" id="thu_subject_id_4" data-select2-id="thu_subject_id_4" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[teacher_id][]" id="thu_teacher_id_4" data-select2-id="thu_teacher_id_4" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[subject_id][]" id="fri_subject_id_4" data-select2-id="fri_subject_id_4" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[teacher_id][]" id="fri_teacher_id_4" data-select2-id="fri_teacher_id_4" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[subject_id][]" id="sat_subject_id_4" data-select2-id="sat_subject_id_4" tabindex="-1" aria-hidden="true">
                                    <option value="">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[teacher_id][]" id="sat_teacher_id_4" data-select2-id="sat_teacher_id_4" tabindex="-1" aria-hidden="true">
                                    <option value="">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="removeTimeTableRow(4)">Delete</button>
                            </td>
                        </tr>
                        <tr id="time_table_row_5">
                            <td>
                                From:<input type="time" class="form-control" id="exam_time_0"  name="start_time[]">
                                To:<input type="time" class="form-control" id="exam_time_0" name="end_time[]">
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[subject_id][]" id="mon_subject_id_5" data-select2-id="mon_subject_id_5" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="132">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[teacher_id][]" id="mon_teacher_id_5" data-select2-id="mon_teacher_id_5" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="144">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[subject_id][]" id="tue_subject_id_5" data-select2-id="tue_subject_id_5" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="134">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[teacher_id][]" id="tue_teacher_id_5" data-select2-id="tue_teacher_id_5" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="146">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[subject_id][]" id="wed_subject_id_5" data-select2-id="wed_subject_id_5" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="136">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[teacher_id][]" id="wed_teacher_id_5" data-select2-id="wed_teacher_id_5" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="148">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[subject_id][]" id="thu_subject_id_5" data-select2-id="thu_subject_id_5" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="138">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[teacher_id][]" id="thu_teacher_id_5" data-select2-id="thu_teacher_id_5" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="150">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[subject_id][]" id="fri_subject_id_5" data-select2-id="fri_subject_id_5" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="140">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[teacher_id][]" id="fri_teacher_id_5" data-select2-id="fri_teacher_id_5" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="152">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[subject_id][]" id="sat_subject_id_5" data-select2-id="sat_subject_id_5" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="142">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[teacher_id][]" id="sat_teacher_id_5" data-select2-id="sat_teacher_id_5" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="154">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="removeTimeTableRow(5)">Delete</button>
                            </td>
                        </tr>
                        <tr id="time_table_row_6">
                            <td>
                                From:<input type="time" class="form-control" id="exam_time_0"  name="start_time[]">
                                To:<input type="time" class="form-control" id="exam_time_0" name="end_time[]">
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[subject_id][]" id="mon_subject_id_6" data-select2-id="mon_subject_id_6" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="156">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[teacher_id][]" id="mon_teacher_id_6" data-select2-id="mon_teacher_id_6" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="168">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[subject_id][]" id="tue_subject_id_6" data-select2-id="tue_subject_id_6" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="158">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[teacher_id][]" id="tue_teacher_id_6" data-select2-id="tue_teacher_id_6" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="170">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[subject_id][]" id="wed_subject_id_6" data-select2-id="wed_subject_id_6" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="160">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[teacher_id][]" id="wed_teacher_id_6" data-select2-id="wed_teacher_id_6" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="172">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[subject_id][]" id="thu_subject_id_6" data-select2-id="thu_subject_id_6" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="162">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[teacher_id][]" id="thu_teacher_id_6" data-select2-id="thu_teacher_id_6" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="174">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[subject_id][]" id="fri_subject_id_6" data-select2-id="fri_subject_id_6" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="164">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[teacher_id][]" id="fri_teacher_id_6" data-select2-id="fri_teacher_id_6" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="176">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[subject_id][]" id="sat_subject_id_6" data-select2-id="sat_subject_id_6" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="166">Subject</option>
                                    <?php
                                    $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $subject = [];
                                        $sub = explode(',', $row['subject']);
                                        foreach ($sub as $key => $subjects) {
                                            $subject[] = $subjects;
                                        }
                                        for ($i = 1; $i < count($subject); $i++) {
                                            echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                        }
                                    }

                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                                <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[teacher_id][]" id="sat_teacher_id_6" data-select2-id="sat_teacher_id_6" tabindex="-1" aria-hidden="true">
                                    <option value="" data-select2-id="178">Teacher</option>
                                    <?php
                                    $sql = 'SELECT * FROM `teacher_form`';
                                    $result = mysqli_query($conn, $sql);
                                    $no = 0;
                                    $marks = [];
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $standard = [];
                                        $sta = explode(',', $row['standard']);
                                        foreach ($sta as $key => $standards) {
                                            $standard[] = $standards;
                                        }
                                        for ($i = 0; $i < count($standard); $i++) {
                                            if ($standard[$i] == $standars) {
                                                echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                            }
                                        }
                                    }
                                    ?>
                                    <option value="Recess">Recess</option>    
                            </select>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" onclick="removeTimeTableRow(6)">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                    <tbody id="timetable_body">
                    </tbody>
                </table>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        function addTimetableInTime() {
            var rowId = Date.now();
            var newRow = `
            <tr id="time_table_row_${rowId}">
            <td>
                            From:<input type="time" class="form-control" id="exam_time_0"  name="start_time[]">
                            To:<input type="time" class="form-control" id="exam_time_0" name="end_time[]">
                        </td>
                        <td>
                            <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[subject_id][]" id="mon_subject_id_6" data-select2-id="mon_subject_id_6" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="156">Subject</option>
                                <?php
                                $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $subject = [];
                                    $sub = explode(',', $row['subject']);
                                    foreach ($sub as $key => $subjects) {
                                        $subject[] = $subjects;
                                    }
                                    for ($i = 1; $i < count($subject); $i++) {
                                        echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                    }
                                }

                                ?>
                                    <option value="Recess">Recess</option></select>
                            <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="mon[teacher_id][]" id="mon_teacher_id_6" data-select2-id="mon_teacher_id_6" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="168">Teacher</option>
                                <?php
                                $sql = 'SELECT * FROM `teacher_form`';
                                $result = mysqli_query($conn, $sql);
                                $no = 0;
                                $marks = [];
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $standard = [];
                                    $sta = explode(',', $row['standard']);
                                    foreach ($sta as $key => $standards) {
                                        $standard[] = $standards;
                                    }
                                    for ($i = 0; $i < count($standard); $i++) {
                                        if ($standard[$i] == $standars) {
                                            echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                        }
                                    }
                                }
                                ?>
                                    <option value="Recess">Recess</option></select>
                        </td>
                        <td>
                            <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[subject_id][]" id="tue_subject_id_6" data-select2-id="tue_subject_id_6" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="158">Subject</option>
                                <?php
                                $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $subject = [];
                                    $sub = explode(',', $row['subject']);
                                    foreach ($sub as $key => $subjects) {
                                        $subject[] = $subjects;
                                    }
                                    for ($i = 1; $i < count($subject); $i++) {
                                        echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                    }
                                }

                                ?>
                                    <option value="Recess">Recess</option></select>
                            <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="tue[teacher_id][]" id="tue_teacher_id_6" data-select2-id="tue_teacher_id_6" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="170">Teacher</option>
                                <?php
                                $sql = 'SELECT * FROM `teacher_form`';
                                $result = mysqli_query($conn, $sql);
                                $no = 0;
                                $marks = [];
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $standard = [];
                                    $sta = explode(',', $row['standard']);
                                    foreach ($sta as $key => $standards) {
                                        $standard[] = $standards;
                                    }
                                    for ($i = 0; $i < count($standard); $i++) {
                                        if ($standard[$i] == $standars) {
                                            echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                        }
                                    }
                                }
                                ?>
                                    <option value="Recess">Recess</option></select>
                        </td>
                        <td>
                            <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[subject_id][]" id="wed_subject_id_6" data-select2-id="wed_subject_id_6" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="160">Subject</option>
                                <?php
                                $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $subject = [];
                                    $sub = explode(',', $row['subject']);
                                    foreach ($sub as $key => $subjects) {
                                        $subject[] = $subjects;
                                    }
                                    for ($i = 1; $i < count($subject); $i++) {
                                        echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                    }
                                }

                                ?>
                                    <option value="Recess">Recess</option></select>
                            <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="wed[teacher_id][]" id="wed_teacher_id_6" data-select2-id="wed_teacher_id_6" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="172">Teacher</option>
                                <?php
                                $sql = 'SELECT * FROM `teacher_form`';
                                $result = mysqli_query($conn, $sql);
                                $no = 0;
                                $marks = [];
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $standard = [];
                                    $sta = explode(',', $row['standard']);
                                    foreach ($sta as $key => $standards) {
                                        $standard[] = $standards;
                                    }
                                    for ($i = 0; $i < count($standard); $i++) {
                                        if ($standard[$i] == $standars) {
                                            echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                        }
                                    }
                                }
                                ?>
                                    <option value="Recess">Recess</option></select>
                        </td>
                        <td>
                            <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[subject_id][]" id="thu_subject_id_6" data-select2-id="thu_subject_id_6" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="162">Subject</option>
                                <?php
                                $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $subject = [];
                                    $sub = explode(',', $row['subject']);
                                    foreach ($sub as $key => $subjects) {
                                        $subject[] = $subjects;
                                    }
                                    for ($i = 1; $i < count($subject); $i++) {
                                        echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                    }
                                }

                                ?>
                                    <option value="Recess">Recess</option></select>
                            <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="thu[teacher_id][]" id="thu_teacher_id_6" data-select2-id="thu_teacher_id_6" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="174">Teacher</option>
                                <?php
                                $sql = 'SELECT * FROM `teacher_form`';
                                $result = mysqli_query($conn, $sql);
                                $no = 0;
                                $marks = [];
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $standard = [];
                                    $sta = explode(',', $row['standard']);
                                    foreach ($sta as $key => $standards) {
                                        $standard[] = $standards;
                                    }
                                    for ($i = 0; $i < count($standard); $i++) {
                                        if ($standard[$i] == $standars) {
                                            echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                        }
                                    }
                                }
                                ?>
                                    <option value="Recess">Recess</option></select>
                        </td>
                        <td>
                            <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[subject_id][]" id="fri_subject_id_6" data-select2-id="fri_subject_id_6" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="164">Subject</option>
                                <?php
                                $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $subject = [];
                                    $sub = explode(',', $row['subject']);
                                    foreach ($sub as $key => $subjects) {
                                        $subject[] = $subjects;
                                    }
                                    for ($i = 1; $i < count($subject); $i++) {
                                        echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                    }
                                }

                                ?>
                                    <option value="Recess">Recess</option></select>
                            <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="fri[teacher_id][]" id="fri_teacher_id_6" data-select2-id="fri_teacher_id_6" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="176">Teacher</option>
                                <?php
                                $sql = 'SELECT * FROM `teacher_form`';
                                $result = mysqli_query($conn, $sql);
                                $no = 0;
                                $marks = [];
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $standard = [];
                                    $sta = explode(',', $row['standard']);
                                    foreach ($sta as $key => $standards) {
                                        $standard[] = $standards;
                                    }
                                    for ($i = 0; $i < count($standard); $i++) {
                                        if ($standard[$i] == $standars) {
                                            echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                        }
                                    }
                                }
                                ?>
                                    <option value="Recess">Recess</option></select>
                        </td>
                        <td>
                            <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[subject_id][]" id="sat_subject_id_6" data-select2-id="sat_subject_id_6" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="166">Subject</option>
                                <?php
                                $sql = 'SELECT * FROM `subject` where `standard`=' . $standars;
                                $result = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $subject = [];
                                    $sub = explode(',', $row['subject']);
                                    foreach ($sub as $key => $subjects) {
                                        $subject[] = $subjects;
                                    }
                                    for ($i = 1; $i < count($subject); $i++) {
                                        echo '<option value="' . $subject[$i] . '"  name=' . $subject[$i] . '>' . $subject[$i] . '</option>';
                                    }
                                }

                                ?>
                                    <option value="Recess">Recess</option></select>
                            <select style="width:100%" class="form-control select2 select2-hidden-accessible" name="sat[teacher_id][]" id="sat_teacher_id_6" data-select2-id="sat_teacher_id_6" tabindex="-1" aria-hidden="true">
                                <option value="" data-select2-id="178">Teacher</option>
                                <?php
                                $sql = 'SELECT * FROM `teacher_form`';
                                $result = mysqli_query($conn, $sql);
                                $no = 0;
                                $marks = [];
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $standard = [];
                                    $sta = explode(',', $row['standard']);
                                    foreach ($sta as $key => $standards) {
                                        $standard[] = $standards;
                                    }
                                    for ($i = 0; $i < count($standard); $i++) {
                                        if ($standard[$i] == $standars) {
                                            echo '<option value="' . $row['name'] . '" name=' . $row['name'] . '>' . $row['name'] . '</option>';
                                        }
                                    }
                                }
                                ?>
                                    <option value="Recess">Recess</option></select>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="removeTimeTableRow(${rowId})">Delete</button>
                        </td>
            </tr>`;

            $('#timetable_body').append(newRow);
        }

        function removeTimeTableRow(index) {
            $('#time_table_row_' + index).remove();
        }
    </script>
    <?php include('footer.php'); ?>