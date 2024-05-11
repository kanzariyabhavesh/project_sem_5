<?php
include "database.php";
if ($_POST['standard'] != '') {
    if (isset($_POST['exam'])) {
        $sql = 'SELECT * FROM `time_table` where `stander` = ' . $_POST['standard'];
        $result = mysqli_query($conn, $sql);
        $examname = [];
        $stander = '';  
        while ($row = mysqli_fetch_assoc($result)) {
            $stander = $row['stander'];
            $examname[]= $row['examname'];
            
        }
        $Examstartdate = '';  
        $Examenddate = '';  
        $Mark = '';  
        $PassingMark = ''; 
        $sqls = "SELECT * FROM `create_exam` WHERE `stander` = '$_POST[standard]' AND `examName` = '$_POST[exam]'";
        $results = mysqli_query($conn, $sqls);
        while ($rows = mysqli_fetch_assoc($results)) {
           $Examstartdate=$rows['startDate'];
           $Examenddate=$rows['endDate'];
           $Mark=$rows['totalMarks'];
           $PassingMark=$rows['passingMarks'];
        }
        foreach ($examname  as $exam){
        if ($_POST['standard'] == $stander && $_POST['exam'] == $exam) {
?>
            <table class="display table table-striped" style="width:100%">
                <tbody id="examDetail">
                    <tr>
                        <td style="width:30%"><span style="font-weight: bold;">Standard: </span><?php echo $_POST['standard']; ?></td>
                        <td style="width:30%"><span style="font-weight: bold;">Exam name: </span><?php echo $_POST['exam']; ?></td>
                        <td style="width:30%"><span style="font-weight: bold;">Exam start date: </span><?php echo $Examstartdate; ?></td>
                    </tr>
                    <tr>
                        <td><span style="font-weight: bold;">Mark: </span><?php echo $Mark; ?></td>
                        <td><span style="font-weight: bold;">Passing Mark: </span><?php echo $PassingMark; ?></td>
                        <td><span style="font-weight: bold;">Exam end date: </span><?php echo $Examenddate; ?></td>
                    </tr>
                </tbody>
            </table>
            <div class="container">
                <table class='table' border='10px' id="myTable">
                    <thead>
                        <tr>
                            <th>Index</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Subject</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = 'SELECT * FROM `time_table` where `stander` = ' . $_POST['standard'];
                        $result = mysqli_query($conn, $sql);
                        $no = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row['examname']==$_POST['exam']) {
                            $subjects = explode(',', $row['subject']);
                            $dates = explode(',', $row['date']);
                            $times = explode(',', $row['time']);
                            foreach ($subjects as $key => $subject) {
                                $no = $no + 1;
                                $date = isset($dates[$key]) ? $dates[$key] : '';
                                $time = isset($times[$key]) ? $times[$key] : '';
                                echo "<tr><td scope='row'>$no</td><td>$date</td><td>$time</td><td>$subject</td></tr>";
                            }
                            }
                            
                        }
                        ?>
                    </tbody>
                   <button class='delete-btn btn btn-danger' data-standard="<?= $_POST['standard']?>" data-exam="<?=$_POST['exam']?>">Delete</button>
                </table>
    <?php
        }
    }
}
}
    ?>