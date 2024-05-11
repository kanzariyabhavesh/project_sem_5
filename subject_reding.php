<?php
include "database.php";
include('head.php');
?>
<div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">reding</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active">reding</li>
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
                <th>subject</th>
            </tr>
        </thead>
        <?php
         $sql = 'SELECT * FROM `subject`';
         $result = mysqli_query($conn, $sql);
         $no = 0;
         
         
         while ($row = mysqli_fetch_assoc($result)) {
            $subject = '';
            $sub =explode(',',$row[ 'subject' ]);
            foreach ( $sub as $key=>$subjects)
            {
                $subject .='['.$key.']='.$subjects;
        
            }   
          
            $no = $no + 1;
            $no1 = $row['id'];
            echo "<tr><td scope = 'row'>" . $no . "</td>
                <td>" . $row['standard'] . "</td>
                <td>" . $subject . "</td>
                  
                </tr>";
        }

        ?>
        <tbody>
        </tbody>
    </table>
</div>
<?php include('footer.php'); ?>  