 <?php
include "database.php";
include('head.php');
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Settings</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Setting</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
  <!--  <div class="col-5 col-sm-3">
        <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link" id="general_setting-tabs-tab" data-toggle="pill" href="#general_setting-tabs" role="tab" aria-controls="general_setting-tabs" aria-selected="false">General settings</a>
            <a class="nav-link active" id="grades-tabs-tab" data-toggle="pill" href="#grades-tabs" role="tab" aria-controls="grades-tabs" aria-selected="true">Grades</a>
        </div>
    </div>

    <div class="col-10 col-sm-11">
        <div class="tab-content" id="vert-tabs-tabContent">
            <div class="tab-pane text-left fade active show" id="general_setting-tabs" role="tabpanel" aria-labelledby="general_setting-tabs-tab">
                <div class="form-group row" style="text-align: right;">
                    <label for="name" class="col-sm-3 col-form-label">School name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="name" placeholder="School name" value="school" name="name">
                    </div>
                </div>
                <div class="form-group row" style="text-align: right;">
                    <label for="logo" class="col-sm-3 col-form-label">Logo</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="logo" onchange="filePreview()" placeholder="Logo" name="logo">
                        </br>
                        <div id="image_preview" style="text-align: center">
                            <img src="dist/img/image_118.jfif" height="100px" width="100px">
                        </div>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="year_id" style="text-align: right;" class="col-sm-3 col-form-label">Financial year</label>
                    <div class="col-sm-9">
                        <select class="form-control select2 select2-hidden-accessible" onchange="getFinancialData()" id="year_id" name="year_id" style="width: 100%;" data-select2-id="year_id" tabindex="-1" aria-hidden="true">
                            <option value="">Financial year</option>
                            <option value="2" selected="" data-select2-id="2">2023-2024</option>
                        </select>
                    </br>
                    </div>
                    <div class="form-group row" style="text-align: right;">
                        <label for="financial_start_date" class="col-sm-4 col-form-label">Financial start date</label>
                        <div class="col-sm-3">
                            <input type="text" readonly="" class="form-control" id="financial_year_start_date" value="2023-06-01" placeholder="">
                        </div>
                        <label for="financial_end_date" class="col-sm-3 col-form-label">Financial end date</label>
                        <div class="col-sm-2">
                            <input type="text" readonly="" class="form-control" id="financial_year_end_date" value="2024-05-31" placeholder="">
                        </div>
                    </div>

                </div>
                <div class="form-group row" style="text-align: right;">
                    <label for="lecture_time" class="col-sm-3 col-form-label">Lecture time in minutes</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="lecture_time" placeholder="Lecture time in minutes" value="45" name="lecture_time">
                    </div>
                </div>
                <div class="form-group row" style="text-align: right;">
                    <label for="school_open" class="col-sm-3 col-form-label">School open</label>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <div class="input-group date timepicker" id="timepicker_school_open" data-target-input="nearest">
                                <input type="text" name="school_open" value="07:30" class="form-control datetimepicker-input" data-target="#timepicker_school_open">
                                <div class="input-group-append" data-target="#timepicker_school_open" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="school_close" class="col-sm-3 col-form-label">School close</label>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <div class="input-group date timepicker" id="timepicker_school_close" data-target-input="nearest">
                                <input type="text" name="school_close" value="12:30" class="form-control datetimepicker-input" data-target="#timepicker_school_close">
                                <div class="input-group-append" data-target="#timepicker_school_close" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row" style="text-align: right;">
                    <label for="recess_start" class="col-sm-3 col-form-label">Recess start</label>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <div class="input-group date timepicker" id="timepicker_recess_start" data-target-input="nearest">
                                <input type="text" name="recess_start" value="09:30" class="form-control datetimepicker-input" data-target="#timepicker_recess_start">
                                <div class="input-group-append" data-target="#timepicker_recess_start" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label for="recess_end" class="col-sm-3 col-form-label">Recess end</label>
                    <div class="col-sm-3">
                        <div class="form-group">
                            <div class="input-group date timepicker" id="timepicker_recess_end" data-target-input="nearest">
                                <input type="text" name="recess_end" value="09:50" class="form-control datetimepicker-input" data-target="#timepicker_recess_end">
                                <div class="input-group-append" data-target="#timepicker_recess_end" data-toggle="datetimepicker">
                                    <div class="input-group-text"><i class="far fa-clock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="grades-tabs" role="tabpanel" aria-labelledby="grades-tabs-tab">
                <div class="row d-flex">
                    <div class="form-group col-md-5">
                        <button type="button" class="btn btn-primary" onclick="addGrade()">Create grade</button>
                    </div>
                </div>
                <div class="row d-flex" id="allGrades">

                    <div style="display: flex;" class="col-md-12" id="gradeHTML_0">
                        <div class="form-group col-md-4">
                            <label for="min_percentage_0" class="col-form-label">Min percentage</label>
                            <input type="text" class="form-control" id="min_percentage_0" placeholder="Min percentage" name="grade[min_percentage][]" value="80">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="max_percentage_0" class="col-form-label">Max percentage</label>
                            <input type="text" class="form-control" id="max_percentage_0" placeholder="Max percentage" name="grade[max_percentage][]" value="90">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="grade_0" class="col-form-label">Grade</label>
                            <input type="text" class="form-control" id="grade_0" placeholder="Grade" name="grade[grade][]" value="A">
                        </div>
                        <div class="form-group col-md-2">
                            <button type="button" onclick="deleteGrade(0)" style="margin-top: 35px;" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                    <div style="display: flex;" class="col-md-12" id="gradeHTML_1">
                        <div class="form-group col-md-4">
                            <label for="min_percentage_1" class="col-form-label">Min percentage</label>
                            <input type="text" class="form-control" id="min_percentage_1" placeholder="Min percentage" name="grade[min_percentage][]" value="70">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="max_percentage_1" class="col-form-label">Max percentage</label>
                            <input type="text" class="form-control" id="max_percentage_1" placeholder="Max percentage" name="grade[max_percentage][]" value="80">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="grade_1" class="col-form-label">Grade</label>
                            <input type="text" class="form-control" id="grade_1" placeholder="Grade" name="grade[grade][]" value="B+">
                        </div>
                        <div class="form-group col-md-2">
                            <button type="button" onclick="deleteGrade(1)" style="margin-top: 35px;" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                    <div style="display: flex;" class="col-md-12" id="gradeHTML_2">
                        <div class="form-group col-md-4">
                            <label for="min_percentage_2" class="col-form-label">Min percentage</label>
                            <input type="text" class="form-control" id="min_percentage_2" placeholder="Min percentage" name="grade[min_percentage][]" value="60">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="max_percentage_2" class="col-form-label">Max percentage</label>
                            <input type="text" class="form-control" id="max_percentage_2" placeholder="Max percentage" name="grade[max_percentage][]" value="70">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="grade_2" class="col-form-label">Grade</label>
                            <input type="text" class="form-control" id="grade_2" placeholder="Grade" name="grade[grade][]" value="B">
                        </div>
                        <div class="form-group col-md-2">
                            <button type="button" onclick="deleteGrade(2)" style="margin-top: 35px;" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                    <div style="display: flex;" class="col-md-12" id="gradeHTML_3">
                        <div class="form-group col-md-4">
                            <label for="min_percentage_3" class="col-form-label">Min percentage</label>
                            <input type="text" class="form-control" id="min_percentage_3" placeholder="Min percentage" name="grade[min_percentage][]" value="50">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="max_percentage_3" class="col-form-label">Max percentage</label>
                            <input type="text" class="form-control" id="max_percentage_3" placeholder="Max percentage" name="grade[max_percentage][]" value="60">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="grade_3" class="col-form-label">Grade</label>
                            <input type="text" class="form-control" id="grade_3" placeholder="Grade" name="grade[grade][]" value="C+">
                        </div>
                        <div class="form-group col-md-2">
                            <button type="button" onclick="deleteGrade(3)" style="margin-top: 35px;" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                    <div style="display: flex;" class="col-md-12" id="gradeHTML_4">
                        <div class="form-group col-md-4">
                            <label for="min_percentage_4" class="col-form-label">Min percentage</label>
                            <input type="text" class="form-control" id="min_percentage_4" placeholder="Min percentage" name="grade[min_percentage][]" value="35">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="max_percentage_4" class="col-form-label">Max percentage</label>
                            <input type="text" class="form-control" id="max_percentage_4" placeholder="Max percentage" name="grade[max_percentage][]" value="50">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="grade_4" class="col-form-label">Grade</label>
                            <input type="text" class="form-control" id="grade_4" placeholder="Grade" name="grade[grade][]" value="C">
                        </div>
                        <div class="form-group col-md-2">
                            <button type="button" onclick="deleteGrade(4)" style="margin-top: 35px;" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                    <div style="display: flex;" class="col-md-12" id="gradeHTML_5">
                        <div class="form-group col-md-4">
                            <label for="min_percentage_5" class="col-form-label">Min percentage</label>
                            <input type="text" class="form-control" id="min_percentage_5" placeholder="Min percentage" name="grade[min_percentage][]" value="90">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="max_percentage_5" class="col-form-label">Max percentage</label>
                            <input type="text" class="form-control" id="max_percentage_5" placeholder="Max percentage" name="grade[max_percentage][]" value="100">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="grade_5" class="col-form-label">Grade</label>
                            <input type="text" class="form-control" id="grade_5" placeholder="Grade" name="grade[grade][]" value="A+">
                        </div>
                        <div class="form-group col-md-2">
                            <button type="button" onclick="deleteGrade(5)" style="margin-top: 35px;" class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="email-setting-tabs" role="tabpanel" aria-labelledby="email-setting-tabs-tab">
                <div class="form-group row" style="text-align: right;">
                    <label for="mailer" class="col-sm-3 col-form-label">Mailer</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="mailer" placeholder="Mailer" value="" name="mail_mailer">
                    </div>
                </div>
                <div class="form-group row" style="text-align: right;">
                    <label for="host" class="col-sm-3 col-form-label">Host</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="host" placeholder="Host" value="" name="mail_host">
                    </div>
                </div>
                <div class="form-group row" style="text-align: right;">
                    <label for="port" class="col-sm-3 col-form-label">Port</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="port" placeholder="Port" value="" name="mail_port">
                    </div>
                </div>
                <div class="form-group row" style="text-align: right;">
                    <label for="from" class="col-sm-3 col-form-label">From name</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="from" placeholder="From name" value="" name="mail_from">
                    </div>
                </div>
                <div class="form-group row" style="text-align: right;">
                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="password" placeholder="Password" value="" name="mail_password">
                    </div>
                </div>
                <div class="form-group row" style="text-align: right;">
                    <label for="encryption" class="col-sm-3 col-form-label">Encryption</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="encryption" placeholder="Encryption" value="" name="mail_encryption">
                    </div>
                </div>
                <div class="form-group row" style="text-align: right;">
                    <label for="from_address" class="col-sm-3 col-form-label">From email address</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="from_address" placeholder="From email address" value="" name="mail_from_address">
                    </div>
                </div>
            </div>

        </div>
    </div>-->
    <?php include('footer.php'); ?>