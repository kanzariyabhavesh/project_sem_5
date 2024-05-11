<?php
include('head.php');
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Class Time Table</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">Class Time Table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="form-container">
        <form id="form" method="post" action="">
            <div class="card-body">
                <div id="filter-table">
                    <div class="row d-flex" id="custom-filter">
                        <div class="form-group col-md-4">
                            <label for="search_standard_id" class=" col-form-label">Standard</label>
                            <select class="form-control select2 select2-hidden-accessible" onchange="standardExams()" id="standard_id" name="search_standard_id" style="width: 100%;" data-select2-id="search_standard_id" tabindex="-1" aria-hidden="true">
                            <option value=''>Please select standard</option>
                            <option value='9'>9</option>
                            <option value='10'>10</option>
                            <option value='11'>11</option>
                            <option value='12'>12</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="search_class_id" class=" col-form-label">class</label>
                            <select class="form-control select2 select2-hidden-accessible" onchange="listDataTable()" id="class_id" name="search_class_id" style="width: 100%;" data-select2-id="search_class_id" tabindex="-1" aria-hidden="true">
                            <option value=''>Please select Class Room</option>
                            </select>
                        </div>
                        <div class="form-group col-md-12">
                            <div style="text-align: right" class="pb-4">
                                <button style="margin-right:20px;" onclick="printForm()" class="btn btn-small btn-info">Print</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive p-0" id="exam_detail_print">
                    <table class="display table table-striped" style="width:100%">
                        <tbody id="examDetail">

                        </tbody>
                    </table>
                    <table border="2" id="example" class="display table table-striped" style="width:100%">
                        <tbody id="examTimeTableDetail" style="text-align: center;">

                        </tbody>
                    </table>
                </div>

            </div>

        </form>
       
        <div id="Time_Table"></div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script>
    function standardExams() {
    var standard_id = $("#standard_id").val();
    $.ajax({
        url: "time_table/class_time_table_exams.php",
        type: "POST",
        data: {
            standard_id: standard_id
        },
        success: function(data) {
            $("#class_id").html(data);
            listDataTable();
        }
    });
}

function listDataTable() {
        $.ajax({
            url: "class_time_table_show.php",
            type: "POST",
            data: {
                standard: $("#standard_id").val(),
                class:$("#class_id").val(),
             
            },
            success: function(data) {
                $("#Time_Table").html(data);
            },

        });
    };
    $(document).on("click", ".delete-btn", function() {
					var standard = $(this).data("standard");
					var exam = $(this).data("exam");
					var element = this;
					$.ajax({
						url: "time_table/time_table_delete.php",
						type: "POST",
						data: {
							standard: standard,
							exam: exam
						},
						success: function(p_delete) {
                            console.log(p_delete);
							if (p_delete == 1) {
								document.getElementById('Time_Table').innerHTML = '';
							}
						},

					});
				});
    function printForm() {
        window.print();
    }
</script>
<?php include('footer.php'); ?>
