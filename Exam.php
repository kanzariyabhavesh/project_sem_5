<?php include('head.php');
include "database.php";
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Exam Table</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active">table</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="Exam_create.php" style="margin-left: 950px;">
                <button type="button" class="btn btn-outline-primary">Create Exam</button>
            </a>
        </div>
    </nav>
    <br>
    <div class="container">
        <table class='table' border='10px' id="myTable">
            <thead>
                <tr>
                    <th>no</th>
                    <th>Exam Name</th>
                    <th>stander</th>
                    <th>Total Marks</th>
                    <th>Passing Marks</th>
                    <th>Exam Start Date</th>
                    <th>Exam End Date</th>
                    <th>actions</th>
                </tr>
            </thead>
            <?php
            $sql = 'SELECT * FROM `create_exam`';
            $result = mysqli_query($conn, $sql);
            $no = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $no = $no + 1;
                $no1 = $row['id'];

                echo "<tr><td scope = 'row'>" . $no . "</td>
                <td>" . $row['examName'] . "</td>
                <td>" . $row['stander'] . "</td>
                <td>" . $row['totalMarks'] . "</td>
                <td>" . $row['passingMarks'] . "</td>
                <td>" . $row['startDate'] . "</td>
                <td>" . $row['endDate'] . "</td>
                <td><button type='button' class='btn btn-success'><a href='result.php?id=$row[id]&examname=$row[examName]&stander=$row[stander]&totalMarks=$row[totalMarks]&passingMarks=$row[passingMarks]&startDate=$row[startDate]&endDate=$row[endDate]'>Result</a></button>
                <button type='button' class='btn btn-warning'><a href='Exam/exam_update.php?id=$no1'>edit</a></button>
                <button type='button' class='btn btn-danger'><a href='Exam/exam_delete.php?id=$no1'>delete</a></button>
                <button type='button' class='btn btn-light'><a href='time_table.php?examname=$row[examName]&stander=$row[stander]'>Time Table</a></button>
                </td>  
   
                </tr>";
            }

            ?>
            <tbody>
            </tbody>
        </table>
    </div>
    <?php include('footer.php') ?>