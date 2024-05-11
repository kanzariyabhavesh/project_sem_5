<?php
include "database.php";
include('head.php');
?>
<div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Fee_table</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">Fee table</li>
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
                <th>Total Fee</th>
                <th>Cerdit Fee</th>
                <th>actions</th>
            </tr>
        </thead>
        <?php
            $class="";
            if (isset($_POST["class"])) {
                $class = $_POST["class"];
            }
            $sql="SELECT 
            student_fee_value.id,
            student_fee_value.fullname,
            student_fee_value.parentname,
            student_fee_value.standard,
            student_fee_value.classroom,
            student_fee_value.dob,
            student_fee_value.email,
            student_fee_value.phonenumber,
            student_fee_value.gender,
            student_fee_value.address,
            student_fee_value.cerditfee,
            fee_form.fee 
        FROM 
            student_fee_value 
        INNER JOIN 
            fee_form 
        ON 
            student_fee_value.standard = fee_form.Standard";
        $result = mysqli_query($conn, $sql);
        $no = 0;
        $totalfee = 0;
        $cerditfee = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($class == "") {
            if ($row['standard'] == $_GET['standard']) {
            $totalfee +=$row['fee'];
            $cerditfee +=$row['cerditfee'];
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
                <td>" . $row['fee'] . "</td>
                <td>" . $row['cerditfee'] . "</td>
                <td><button type='button' class='btn btn-warning'><a href='fee_/fee_update.php?id=$no1'>edit</a></button>
                <button type='button' class='btn btn-danger'><a href='fee_/fee_delete.php?id=$no1&standard=$row[standard] '>delete</a></button>
                </td>  
   
                </tr>";
        }
    }
    if ($row['standard'] == $_GET['standard']) {
        if ( $row['classroom'] == $class ) {
          
        $totalfee +=$row['fee'];
        $cerditfee +=$row['cerditfee'];
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
            <td>" . $row['fee'] . "</td>
            <td>" . $row['cerditfee'] . "</td>
            <td><button type='button' class='btn btn-warning'><a href='fee_/fee_update.php?id=$no1'>edit</a></button>
            <button type='button' class='btn btn-danger'><a href='fee_/fee_delete.php?id=$no1&standard=$row[standard] '>delete</a></button>
            </td>  

            </tr>";
        }
    }
    }

        ?>
        <tfoot>
  <tr>
      <td colspan="10" align="center">Total fee</td>
         <td colspan="1"><?php echo $totalfee ; ?></td>
         <td colspan="1"><?php echo $cerditfee ; ?></td>
      </tr>
</tfoot>
        <tbody>
        </tbody>
    </table>
</div>
<?php include('footer.php'); ?>  