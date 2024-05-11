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
    <div class="container">
    <table class='table' border='10px' id="myTable" >
        <thead>
            <tr>
                <th>no</th>
                <th>Standard</th>
                <th>Fee</th>
                <th>actions</th>
            </tr>
        </thead>
        <?php
        $sql = 'SELECT * FROM `fee_form`';
        $result = mysqli_query($conn, $sql);
        $no = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $no = $no + 1;
            $no1 = $row['id'];
            echo "<tr><td scope = 'row'>" . $no . "</td>
                <td>" . $row['Standard'] . "</td>
                <td>" . $row['fee'] . "</td>
                <td><button type='button' class='btn btn-warning'><a href='fee_/form_update.php?id=$no1'>edit</a></button>
                <button type='button' class='btn btn-danger'><a href='fee_/from_delete.php?id=$no1'>delete</a></button>
                </td>  
   
                </tr>";
        }

        ?>
        <tbody>
        </tbody>
    </table>
</div>
<?php include('footer.php'); ?>  