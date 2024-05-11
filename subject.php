<?php include('head.php'); ?>
<div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Subject</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Subject</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
<?php
  $standardErr = "";
if (isset($_GET['standardErr'])) {
  $standardErr = $_GET['standardErr'];
}
?>
 <style>
    .error {
      color: red;
    }
    </style>
            <center>
            <div class="form-container">
    <form id="form" method="post" action="subject_insert/subject_insert.php"> 
      <div class="row d-flex">
        <div class="form-group col-md-6">
          <label for="standard_id" class="col-form-label">Standard</label>
          <select class="form-control select2 select2-hidden-accessible" id="standard_id" name="standard"
            style="width: 100%;" onchange="updateSubjects()" tabindex="-1" aria-hidden="true"
            data-select2-id="standard_id">
            <option value="" data-select2-id="36">Please select standard</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11 Commerce">11 Commerce</option>
            <option value="12 Commerce">12 Commerce</option>
          </select>
          <p class="error"><?php echo  $standardErr;?></p>
        </div>

        <div class="form-group col-md-6">
          <label for="Subject" class="col-form-label">Subjects</label>
          <div id="subjectList" name="subject"></div>
        </div>
      </div>

      <div class="checkbox-group">
      </div>

      <div class="modal-footer">
          <button type="submit" class="btn btn-secondary" data-dismiss="modal">Reset</button>
          <button type="submit" class="btn btn-primary" >Submit</button>
      </div>
    </form>
  </div>

  <script>
    var subjectMap = {
      "9": ["Math", "Science", "English", "SocialScience", "Hindi","ComputerScience","Gujarati","sanskut"],
      "10": ["Math", "Science", "English", "SocialScience", "Gujarati", "sanskut"],
      "11 Commerce": ["Account", "Gujarati", "Economics", "stat", "English", "SP", "BA"],
      "12 Commerce": ["Account", "Gujarati", "Economics", "stat", "English", "SP", "BA"],
      
    };

    function updateSubjects() {
      var standardSelect = document.getElementById("standard_id");
      var subjectListDiv = document.getElementById("subjectList");

      var selectedStandard = standardSelect.value;

      if (subjectMap[selectedStandard]) {
        var subjects = subjectMap[selectedStandard].map(function (subject) {
          return '<input type="checkbox"  id="' + subject + '" name="' + subject + '" value="' + subject + '" checked><label for="' + subject + '"> ' + subject + '</label>';
        });

        subjectListDiv.innerHTML = subjects.join('<br>');
      } else {
        subjectListDiv.innerHTML = "";
      }
    }

    updateSubjects();
  </script>
            </center>
<?php include('footer.php') ?>