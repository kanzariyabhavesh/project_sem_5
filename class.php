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
            max-width: 50%;
        }

        .error {
            color: red;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
       
    <a href="class_form.php" class="btn btn-success" style="margin-left: 1070px;">Create Class</a>
    
    <div class="container"  style="margin-top: 10px;">
            <table class='table' border='10px' id="myTable">
                <thead>
                    <tr>
                        <th>no</th>
                        <th>Standard</th>
                        <th>ClassRoom</th>
                        <th>teacher</th>
                        <th>actions</th>
                    </tr>
                </thead>
                <?php
                $sql = 'SELECT * FROM `class`';
                $result = mysqli_query($conn, $sql);
                $no = 0;
                $marks = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $no = $no + 1;
                    $no1 = $row['id'];
                    echo "<tr>
                                <td scope='row'>" . $no . "</td>
                                <td>" . $row['standard'] . "</td>
                                <td>" . $row['ClassRoom'] . "</td>
                                <td>" . $row['teacher'] . "</td>
                                <td><button type='button' class='btn btn-warning'><a href='class/class_update.php?id=$no1'>Edit</a></button>
                                <button type='button' class='btn btn-danger'><a href='class/class_delete.php?id=$no1'>Delete</a></button>
                                <button type='button' class='btn btn-outline-success'><a href='class_time_table_form.php?standard=$row[standard]&ClassRoom=$row[ClassRoom]'>Time Table</a></button></td></tr>";
                }

                ?>
                <tbody>
                </tbody>
            </table>
            
        </div>
    </div>


    <?php include('footer.php'); ?>