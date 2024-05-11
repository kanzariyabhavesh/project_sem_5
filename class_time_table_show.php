 <?php
    include "database.php";
    if ($_POST['standard'] != '') {
        if (isset($_POST['class'])) {
            $sql = "SELECT * FROM `class_timetable` WHERE `standard` = '$_POST[standard]'";
            $result = mysqli_query($conn, $sql);
            $standard='';
            $classroom='';
            while ($row = mysqli_fetch_assoc($result)) {
                $standard = $row['standard'];
                $classroom = $row['classroom'];
            }
            if ($_POST['standard'] == $standard && $_POST['class'] == $classroom) {
    ?>
         <table class="display table table-striped" style="width:100%">
             <tbody id="classDetail">
                 <tr>
                     <td style="width:30%"><span style="font-weight: bold;">Standard: </span><?php echo $_POST['standard']; ?></td>
                     <td style="width:30%"><span style="font-weight: bold;">Class name: </span><?php echo $_POST['class']; ?></td>
                 </tr>
             </tbody>
         </table>
         <table border="2" id="example" class="display table table-striped" style="width:100%">
             <tbody id="classTimeTableDetail" style="text-align: center;">
                 <tr>
                     <th>Time</th>
                     <th>Monday</th>
                     <th>Tuesday</th>
                     <th>Wednesday</th>
                     <th>Thursday</th>
                     <th>Friday</th>
                     <th>Saturday</th>
                 </tr>

                 <?php
                    $sql = "SELECT * FROM `class_timetable` WHERE `standard` = '$_POST[standard]' AND `classroom` = '$_POST[class]'";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $starttime = explode(',', $row['starttime']);
                        $endtime = explode(',', $row['endtime']);
                        $monsubject= explode(',', $row['monsubject']);
                        $monteacher = explode(',', $row['monteacher']);
                        $tuesubject = explode(',', $row['tuesubject']);
                        $tueteacher = explode(',', $row['tueteacher']);
                        $wedsubject = explode(',', $row['wedsubject']);
                        $wedteacher = explode(',', $row['wedteacher']);
                        $thusubject = explode(',', $row['thusubject']);
                        $thuteacher = explode(',', $row['thuteacher']);
                        $frisubject = explode(',', $row['frisubject']);
                        $friteacher = explode(',', $row['friteacher']);
                        $satsubject = explode(',', $row['satsubject']);
                        $satteacher = explode(',', $row['satteacher']);
                        
                        foreach ($starttime as $key => $start) {
                            $end = isset($endtime[$key]) ? $endtime[$key] : '';
                            $monSub = isset($monsubject[$key]) ? $monsubject[$key] : '';
                            $monTeach = isset($monteacher[$key]) ? $monteacher[$key] : '';
                            $tueSub = isset($tuesubject[$key]) ? $tuesubject[$key] : '';
                            $tueTeach = isset($tueteacher[$key]) ? $tueteacher[$key] : '';
                            $wedSub = isset($wedsubject[$key]) ? $wedsubject[$key] : '';
                            $wedTeach = isset($wedteacher[$key]) ? $wedteacher[$key] : '';
                            $thuSub = isset($thusubject[$key]) ? $thusubject[$key] : '';
                            $thuTeach = isset($thuteacher[$key]) ? $thuteacher[$key] : '';
                            $friSub = isset($frisubject[$key]) ? $frisubject[$key] : '';
                            $friTeach = isset($friteacher[$key]) ? $friteacher[$key] : '';
                            $satSub = isset($satsubject[$key]) ? $satsubject[$key] : '';
                            $satTeach = isset($satteacher[$key]) ? $satteacher[$key] : '';
                            echo "<tr>";
                            echo "<td>{$start}-{$end}</td>";
                            echo "<td>{$monSub} ({$monTeach})</td>";
                            echo "<td>{$tueSub} ({$tueTeach})</td>";
                            echo "<td>{$wedSub} ({$wedTeach})</td>";
                            echo "<td>{$thuSub} ({$thuTeach})</td>";
                            echo "<td>{$friSub} ({$friTeach})</td>";
                            echo "<td>{$satSub} ({$satTeach})</td>";
                            echo "</tr>";
                        }
                    }
                    ?>

             </tbody>
         </table>
 <?php
            }
        }
    }
    ?>