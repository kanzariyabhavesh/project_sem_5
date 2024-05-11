<?php
include "database.php";
include('head.php');
?>
<div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Teacher table</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Teacher table</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
    <div class="container">
    <table class='table' border='10px' id="myTable" >
        <thead>
            <tr>
                <th>no</th>
                <th>Full Name</th>
                <th>E-mail</th>
                <th>Phone Number</th>
                <th>Gender</th>
                <th>Salary</th>
                <th>Joining data</th>
                <th>Address</th>
                <th>standard</th>
                <th>subject</th>
                <th>actions</th>
            </tr>
        </thead>
        <?php
        $sql = 'SELECT * FROM `teacher_form`';
        $result = mysqli_query($conn, $sql);
        $no = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $no = $no + 1;
            $no1 = $row['id'];
            echo "<tr><td scope = 'row'>" . $no . "</td>
                <td>" . $row['name'] . "</td>
                <td>" . $row['email'] . "</td>
                <td>" . $row['phonenumber'] . "</td>
                <td>" . $row['gender'] . "</td>
                <td>" . $row['salary'] . "</td>
                <td>" . $row['joiningdata'] . "</td>
                <td>" . $row['address'] . "</td>
                <td>" . $row['standard'] . "</td>
                <td>" . $row['subject'] . "</td>
                <td><button type='button' class='btn btn-warning'><a href='Teacher_form/form_update.php?id=$no1'>edit</a></button>
                <button type='button' class='btn btn-danger'><a href='Teacher_form/from_delete.php?id=$no1'>delete</a></button>
                </td>  
   
                </tr>";
        }

        ?>
        <tbody>
        </tbody>
    </table>
</div>
<?php include('footer.php'); ?>  