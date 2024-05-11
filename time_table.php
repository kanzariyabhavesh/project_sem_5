<?php include('head.php');
include "database.php";
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Time Table</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Time Table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <form method="post" action="time_table/time_table_insert.php?examname=<?php echo $_GET['examname'];?>&stander=<?php echo $_GET['stander'];?>">
    <div class="row d-flex">
        <div class="form-group col-md-4">
            <label class="col-form-label">Standard:</label>
            <input readonly="" class="form-control"  value="<?php echo isset($_GET['stander'])?$_GET['stander']:"";?>" >
        </div>
        <div class="form-group col-md-4">
            <label class="col-form-label">Exam Name:</label>
            <input readonly="" class="form-control"  value="<?php echo isset($_GET['examname'])?$_GET['examname']:"";?>" >
        </div>
    </div>
    <div class="form-group col-md-12">
       <label class="col-form-label" style="font-size: 20px">Subjects</label>
       <button type="button" class="btn btn-success" style="margin-left: 15px;" onclick="addSubject()">Add subject</button>
    </div>
    <div class="row d-flex">
      <div class="table-responsive p-0">
         <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 33%">Date</th>
                                        <th style="width: 33%">Time</th>
                                        <th style="width: 33%">Subjects</th>
                                        <th style="width: 33%">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="subjectTableBody">
        <?php 
        if ($_GET['stander'] == 9) {
          
        ?>
        <tr id="time_table_row_1">
            <td>
                <input type="date" class="form-control" id="exam_date_0" placeholder="message.exam_date" name="exam_date[]" value="2023-11-16">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_0" data-select2-id="subject_id_0" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math" selected="" data-select2-id="10">Math</option><option value="Science">Science</option><option value="English">English</option><option value="SocialScience">SocialScience</option><option value="sanskut">sanskut</option><option value="Gujrati">Gujrati</option><option value="Hindi">Hindi</option><option value="ComputerScience">ComputerScience</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(0)">Delete</button>
            </td>
        </tr><tr id="time_table_row_1">
            <td>
                <input type="date" class="form-control" id="exam_date_1" placeholder="message.exam_date" name="exam_date[]" value="2023-11-17">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_1" data-select2-id="subject_id_1" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math">Math</option><option value="Science" selected="" data-select2-id="12">Science</option><option value="English">English</option><option value="SocialScience">SocialScience</option><option value="sanskut">sanskut</option><option value="Gujrati">Gujrati</option><option value="Hindi">Hindi</option><option value="ComputerScience">ComputerScience</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(1)">Delete</button>
            </td>
        </tr><tr id="time_table_row_2">
            <td>
                <input type="date" class="form-control" id="exam_date_2" placeholder="message.exam_date" name="exam_date[]" value="2023-11-18">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_2" data-select2-id="subject_id_2" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math">Math</option><option value="Science">Science</option><option value="English" selected="" data-select2-id="14">English</option><option value="SocialScience">SocialScience</option><option value="sanskut">sanskut</option><option value="Gujrati">Gujrati</option><option value="Hindi">Hindi</option><option value="ComputerScience">ComputerScience</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(2)">Delete</button>
            </td>
        </tr><tr id="time_table_row_3">
            <td>
                <input type="date" class="form-control" id="exam_date_3" placeholder="message.exam_date" name="exam_date[]" value="2023-11-19">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_3" data-select2-id="subject_id_3" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math">Math</option><option value="Science">Science</option><option value="English">English</option><option value="SocialScience" selected="" data-select2-id="16">SocialScience</option><option value="sanskut">sanskut</option><option value="Gujrati">Gujrati</option><option value="Hindi">Hindi</option><option value="ComputerScience">ComputerScience</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(3)">Delete</button>
            </td>
        </tr><tr id="time_table_row_4">
            <td>
                <input type="date" class="form-control" id="exam_date_4" placeholder="message.exam_date" name="exam_date[]" value="2023-11-20">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_4" data-select2-id="subject_id_4" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math">Math</option><option value="Science">Science</option><option value="English">English</option><option value="SocialScience">SocialScience</option><option value="sanskut" selected="" data-select2-id="18">sanskut</option><option value="Gujrati">Gujrati</option><option value="Hindi">Hindi</option><option value="ComputerScience">ComputerScience</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(4)">Delete</button>
            </td>
        </tr><tr id="time_table_row_5">
            <td>
                <input type="date" class="form-control" id="exam_date_5" placeholder="message.exam_date" name="exam_date[]" value="2023-11-21">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_5" data-select2-id="subject_id_5" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math">Math</option><option value="Science">Science</option><option value="English">English</option><option value="SocialScience">SocialScience</option><option value="sanskut">sanskut</option><option value="Gujrati" selected="" data-select2-id="20">Gujrati</option><option value="Hindi">Hindi</option><option value="ComputerScience">ComputerScience</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(5)">Delete</button>
            </td>
        </tr><tr id="time_table_row_6">
            <td>
                <input type="date" class="form-control" id="exam_date_6" placeholder="message.exam_date" name="exam_date[]" value="2023-11-22">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_6" data-select2-id="subject_id_6" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math">Math</option><option value="Science">Science</option><option value="English">English</option><option value="SocialScience">SocialScience</option><option value="sanskut">sanskut</option><option value="Gujrati" >Gujrati</option><option value="Hindi"  selected="" data-select2-id="22">Hindi</option><option value="ComputerScience">ComputerScience</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(6)">Delete</button>
            </td>
            </tr>
        </tr><tr id="time_table_row_7">
            <td>
                <input type="date" class="form-control" id="exam_date_6" placeholder="message.exam_date" name="exam_date[]" value="2023-11-23">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_6" data-select2-id="subject_id_6" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math">Math</option><option value="Science">Science</option><option value="English">English</option><option value="SocialScience">SocialScience</option><option value="sanskut">sanskut</option><option value="Gujrati" >Gujrati</option><option value="Hindi">Hindi</option><option value="ComputerScience"   selected="" data-select2-id="24">ComputerScience</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(6)">Delete</button>
            </td>
            </tr>
        <?php 
        }
        ?>
        <?php 
        if ($_GET['stander'] == 10) {
          
        ?>
        <tr id="time_table_row_1">
            <td>
                <input type="date" class="form-control" id="exam_date_0" placeholder="message.exam_date" name="exam_date[]" value="2023-11-16">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_0" data-select2-id="subject_id_0" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math" selected="" data-select2-id="10">Math</option><option value="Science">Science</option><option value="English">English</option><option value="SocialScience">SocialScience</option><option value="sanskut">sanskut</option><option value="Gujrati">Gujrati</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(0)">Delete</button>
            </td>
        </tr><tr id="time_table_row_1">
            <td>
                <input type="date" class="form-control" id="exam_date_1" placeholder="message.exam_date" name="exam_date[]" value="2023-11-17">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_1" data-select2-id="subject_id_1" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math">Math</option><option value="Science" selected="" data-select2-id="12">Science</option><option value="English">English</option><option value="SocialScience">SocialScience</option><option value="sanskut">sanskut</option><option value="Gujrati">Gujrati</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(1)">Delete</button>
            </td>
        </tr><tr id="time_table_row_2">
            <td>
                <input type="date" class="form-control" id="exam_date_2" placeholder="message.exam_date" name="exam_date[]" value="2023-11-18">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_2" data-select2-id="subject_id_2" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math">Math</option><option value="Science">Science</option><option value="English" selected="" data-select2-id="14">English</option><option value="SocialScience">SocialScience</option><option value="sanskut">sanskut</option><option value="Gujrati">Gujrati</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(2)">Delete</button>
            </td>
        </tr><tr id="time_table_row_3">
            <td>
                <input type="date" class="form-control" id="exam_date_3" placeholder="message.exam_date" name="exam_date[]" value="2023-11-19">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_3" data-select2-id="subject_id_3" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math">Math</option><option value="Science">Science</option><option value="English">English</option><option value="SocialScience" selected="" data-select2-id="16">SocialScience</option><option value="sanskut">sanskut</option><option value="Gujrati">Gujrati</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(3)">Delete</button>
            </td>
        </tr><tr id="time_table_row_4">
            <td>
                <input type="date" class="form-control" id="exam_date_4" placeholder="message.exam_date" name="exam_date[]" value="2023-11-20">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_4" data-select2-id="subject_id_4" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math">Math</option><option value="Science">Science</option><option value="English">English</option><option value="SocialScience">SocialScience</option><option value="sanskut" selected="" data-select2-id="18">sanskut</option><option value="Gujrati">Gujrati</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(4)">Delete</button>
            </td>
        </tr><tr id="time_table_row_5">
            <td>
                <input type="date" class="form-control" id="exam_date_5" placeholder="message.exam_date" name="exam_date[]" value="2023-11-21">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_5" data-select2-id="subject_id_5" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Math">Math</option><option value="Science">Science</option><option value="English">English</option><option value="SocialScience">SocialScience</option><option value="sanskut">sanskut</option><option value="Gujrati" selected="" data-select2-id="20">Gujrati</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(5)">Delete</button>
            </td>
        </tr>
            </tr>
        <?php 
        }
        ?>
        <?php 
        if ($_GET['stander'] == 11 || $_GET['stander'] == 12) {
          
        ?>
        <tr id="time_table_row_1">
            <td>
                <input type="date" class="form-control" id="exam_date_0" placeholder="message.exam_date" name="exam_date[]" value="2023-11-16">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_0" data-select2-id="subject_id_0" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Account" selected="" data-select2-id="10">Account</option><option value="BA">BA</option><option value="State">State</option><option value="Economics">Economics</option><option value="5">SP</option><option value="English">English</option><option value="Gujrati">Gujrati</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(0)">Delete</button>
            </td>
        </tr><tr id="time_table_row_1">
            <td>
                <input type="date" class="form-control" id="exam_date_1" placeholder="message.exam_date" name="exam_date[]" value="2023-11-17">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_1" data-select2-id="subject_id_1" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Account">Account</option><option value="BA" selected="" data-select2-id="12">BA</option><option value="State">State</option><option value="Economics">Economics</option><option value="SP">SP</option><option value="English">English</option><option value="Gujrati">Gujrati</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(1)">Delete</button>
            </td>
        </tr><tr id="time_table_row_2">
            <td>
                <input type="date" class="form-control" id="exam_date_2" placeholder="message.exam_date" name="exam_date[]" value="2023-11-18">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_2" data-select2-id="subject_id_2" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Account">Account</option><option value="BA">BA</option><option value="State" selected="" data-select2-id="14">State</option><option value="Economics">Economics</option><option value="SP">SP</option><option value="English">English</option><option value="Gujrati">Gujrati</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(2)">Delete</button>
            </td>
        </tr><tr id="time_table_row_3">
            <td>
                <input type="date" class="form-control" id="exam_date_3" placeholder="message.exam_date" name="exam_date[]" value="2023-11-19">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_3" data-select2-id="subject_id_3" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Account">Account</option><option value="BA">BA</option><option value="State">State</option><option value="Economics" selected="" data-select2-id="16">Economics</option><option value="SP">SP</option><option value="English">English</option><option value="Gujrati">Gujrati</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(3)">Delete</button>
            </td>
        </tr><tr id="time_table_row_4">
            <td>
                <input type="date" class="form-control" id="exam_date_4" placeholder="message.exam_date" name="exam_date[]" value="2023-11-20">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_4" data-select2-id="subject_id_4" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Account">Account</option><option value="BA">BA</option><option value="State">State</option><option value="Economics">Economics</option><option value="SP" selected="" data-select2-id="18">SP</option><option value="English">English</option><option value="Gujrati">Gujrati</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(4)">Delete</button>
            </td>
        </tr><tr id="time_table_row_5">
            <td>
                <input type="date" class="form-control" id="exam_date_5" placeholder="message.exam_date" name="exam_date[]" value="2023-11-21">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_5" data-select2-id="subject_id_5" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Account">Account</option><option value="BA">BA</option><option value="State">State</option><option value="Economics">Economics</option><option value="SP">SP</option><option value="English" selected="" data-select2-id="20">English</option><option value="Gujrati">Gujrati</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(5)">Delete</button>
            </td>
        </tr><tr id="time_table_row_6">
            <td>
                <input type="date" class="form-control" id="exam_date_6" placeholder="message.exam_date" name="exam_date[]" value="2023-11-22">
            </td>
            <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
            </td>
            <td>
                <select class="form-control select2 select2-hidden-accessible" name="subject_id[]" style="width:100%" id="subject_id_6" data-select2-id="subject_id_6" tabindex="-1" aria-hidden="true">
                    <option value="">Subject</option><option value="Account">Account</option><option value="BA">BA</option><option value="State">State</option><option value="Economics">Economics</option><option value="SP">SP</option><option value="English">English</option><option value="Gujrati" selected="" data-select2-id="22">Gujrati</option></select>
            </td>
            <td>
                <button type="button" class="btn btn-danger" onclick="removeExamRow(6)">Delete</button>
            </td>
            </tr>
        <?php 
        }
        ?>
    </tbody>
           </table>

        </div>
    </div>   
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit"  class="btn btn-primary">Save</button>
                </div>
    </form>
   
    <?php include('footer.php') ?>

    
<script>
    function addSubject() {
        var rowId = Date.now(); 
        var newRow = `
            <tr id="time_table_row_${rowId}">
                <td>
                    <input type="date" class="form-control" name="exam_date[]" value="2023-11-16">
                </td>
                <td>
                 <input type="text" class="form-control" id="exam_time_0" placeholder="Start - End Time" name="exam_time[]" value="8:00 AM - 11:00 AM">
                </td>
                <td>
                    <select class="form-control select2" name="subject_id[]">
                        <option value="">Subject</option>
                        <option value="1">Account</option>
                        <option value="2">BA</option>
                        <option value="3">State</option>
                        <option value="4">Economics</option>
                        <option value="5">SP</option>
                        <option value="6">English</option>
                        <option value="7">Gujrati</option>
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