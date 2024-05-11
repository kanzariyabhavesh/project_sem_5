<?php
include "database.php";
include('head.php');
?>
<div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">student_table</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">student table</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <form action="#" method="post">
    <label for="class_id" class=" col-form-label">ClassRoom</label>
                <select class="form-control select2 select2-hidden-accessible" id="class_id" name="class"
                     aria-hidden="true" data-select2-id="class_id">
                    <option value="" data-select2-id="39">Please select class</option>
                    <option value="A">A</option>
                    <option value="B">B</option>
                    <option value="C">C</option>
                    <option value="D">D</option>
                    <option value="E">E</option>

                </select> </br>
    <button type="submit" class="btn btn-primary" >Save</button>
    </form>
    <div class="container">
    <table class='table' border='10px' id="myTable" >
        <thead>
            <tr>
                <th>no</th>
                <th>Full Name</th>
                <th>Parent Name</th>
                <th>Standard</th>
                <th>Class Room</th>
                <th>Dob</th>
                <th>E-mail</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Address</th>
                <th>actions</th>
            </tr>
        </thead>
        <?php
         $class="";
         if (isset($_POST["class"])) {
             $class = $_POST["class"];
         }
        $sql = 'SELECT * FROM `student_form_value`';
        $result = mysqli_query($conn, $sql);
        $no = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($class == "") {
                if ($row['standard'] == 12) {
                    $no = $no + 1;
                    $no1 = $row['id'];
                    echo "<tr><td scope = 'row'>" . $no . "</td>
                        <td>" . $row['fullname'] . "</td>
                        <td>" . $row['parentname'] . "</td>
                        <td>" . $row['standard'] . "</td>
                        <td>" . $row['classroom'] . "</td>
                        <td>" . $row['dob'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['phonenumber'] . "</td>
                        <td>" . $row['gender'] . "</td>
                        <td>" . $row['address'] . "</td>
                        <td>
                        <div class='btn-group'>
                            <button type='button' class='btn btn-warning'><a href='student_form/form_update.php?id=$no1'>Edit</a></button>
                            <button type='button' class='btn btn-danger'><a href='student_form/from_delete.php?id=$no1'>Delete</a></button>
                        </div>
                        <div class='btn-group'>
                            <button type='button' class='btn btn-outline-info'><a href='fee_/fee_data.php?id=$no1&standard=$row[standard]'>Fee</a></button>
                        </div>
                        
                        </td> 
                        
                        </tr>";
                                }
                            }
            if ( $row['standard'] == 12) {
                if ($row['classroom'] == $class ) {
            $no = $no + 1;
            $no1 = $row['id'];
            echo "<tr><td scope = 'row'>" . $no . "</td>
                <td>" . $row['fullname'] . "</td>
                <td>" . $row['parentname'] . "</td>
                <td>" . $row['standard'] . "</td>
                <td>" . $row['classroom'] . "</td>
                <td>" . $row['dob'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['phonenumber'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td>" . $row['address'] . "</td>
                <td>
                <div class='btn-group'>
                    <button type='button' class='btn btn-warning'><a href='student_form/form_update.php?id=$no1'>Edit</a></button>
                    <button type='button' class='btn btn-danger'><a href='student_form/from_delete.php?id=$no1'>Delete</a></button>
                </div>
                <div class='btn-group'>
                    <button type='button' class='btn btn-outline-info'><a href='fee_/fee_data.php?id=$no1&standard=$row[standard]'>Fee</a></button>
                </div>
                
                </td> 
                
                </tr>";
            }
            }
        }
        
        ?>
        <button type='button' class='btn btn-outline-info'><a href='fee_value_table.php?standard=12'>Fee Table</a></button>
        <tbody>
        </tbody>
    </table>
</div>
<?php include('footer.php'); ?>  