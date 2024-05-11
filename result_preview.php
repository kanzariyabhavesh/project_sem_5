<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Result</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .result-container {
            width: 80%;
            max-width: 600px;
            margin: 50px auto;
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: pink;
        }

        h2 {
            text-align: center;
            color: #3498db;
        }

        .header-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .school-logo {
            text-align: left;
            margin-bottom: 20px;
            margin-top: -40px;
        }

        .school-logo img {
            max-width: 80px;
            max-height: 80px;
            margin-top: -500px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #ecf0f1;
        }

        .profile {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .profile img {
            border-radius: 50%;
            max-width: 100px;
            max-height: 100px;
            object-fit: cover;
        }

        .input-field {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #3498db;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .signature {
            text-align: right;
            margin-top: 20px;
        }

        .result-summary {
            margin-top: 20px;
            background-color: #e6f7ff;
            padding: 10px;
            border-radius: 8px;
            background-color: pink;
        }

        @media (max-width: 600px) {
            .result-container {
                width: 90%;
            }
        }
    </style>
</head>

<body>

    <div class="result-container">
        <div class="header-info">
            <h2>Student Result</h2>
            <p><strong>Exam Name:</strong> <?php
                                            echo isset($_GET['examname']) ? $_GET['examname'] : "";
                                            ?></p>
            <p><strong>Passing Year:</strong> 2024</p>
        </div>

        <div class="school-logo">
            <img src="upload/school.jpg" alt="Signature" width="150px" height="120px">
        </div>

        <div class="profile">
            <div>
                <p><strong>Name:</strong> <?php
                                            echo isset($_GET['fullname']) ? $_GET['fullname'] : "";
                                            ?></p>
                <p><strong>parentname:</strong><?php
                                                echo isset($_GET['parentname']) ? $_GET['parentname'] : "";
                                                ?></p>
                <p><strong>stander:</strong><?php
                                            echo isset($_GET['stander']) ? $_GET['stander'] : "";
                                            ?></p>
                <p><strong>School Name:</strong> ABC High School</p>
                <p><strong>Class:</strong> <?php
                                            echo isset($_GET['class']) ? $_GET['class'] : "";
                                            ?></p>
            </div>
        </div>
        <?php
        include "database.php";

        $sql = 'SELECT * FROM `subject`';
        $result = mysqli_query($conn, $sql);
        $no = 0;

        $subject = [];
        while ($row = mysqli_fetch_assoc($result)) {
            if ($_GET['stander'] == $row['standard']) {
                $sub = explode(',', $row['subject']);
                foreach ($sub as $key => $subjects) {
                    $subject[] = $subjects;
                }
            }
        }
        ?>
        <table>
            <tr>
                <th>Subject Name</th>
                <th>Total Marks</th>
                <th>Passing Marks</th>
                <th>Marks</th>

            </tr>
            <?php
            $sql = 'SELECT * FROM `marks`';
            $result = mysqli_query($conn, $sql);
            $no = 0;

            $subjectmarks = [];
            $marks = [];
            while ($row = mysqli_fetch_assoc($result)) {
                if ($_GET['stander'] == $row['stander']) {
                    if ($_GET['fullname'] == $row['fullname']) {
                        $sub = explode(',', $row['subjectmarks']);
                        foreach ($sub as $key => $subjects) {
                            $subjectmarks[] = $subjects;
                        }
                        $subjectString = implode(', ', $subjectmarks);

                        $parts = explode(', ', $subjectString);

                        $data = [];

                        foreach ($parts as $part) {
                            list($key, $value) = explode(':', $part);
                            $data[trim($key)] = trim($value);
                        }

                        for ($i = 1; $i < count($subject); $i++) {
                            $mathScore = isset($data[$subject[$i]]) ? $data[$subject[$i]] : 'Not Available';

                            $marks[] = explode(', ', $mathScore);
                        }
                    }
                }
            }
            for ($i = 1; $i < count($subject); $i++) {
                $m = $i - 1;
                echo "<tr>
                <td>" . $subject[$i]  . "</td>
                <td>" . $_GET['totalMarks'] . "</td>
                <td>" .  $_GET['passingMarks']  . "</td>
                <td>" . $marks[$m][0] . "</td>
                
               </tr>";
            }
            $totelsum = 0;
            $passingThreshold = $_GET['passingMarks'];
            $result = "Pass";
            for ($i = 1; $i < count($subject); $i++) {
                $m = $i - 1;
                $totelsum += (int)$marks[$m][0];
                if ($marks[$m][0] < $passingThreshold) {
                    $result = "Fail";
                }
            }
            $t = $i - 1;
            $p = $i - 1;
            $totalMarks = $_GET['totalMarks'] * $t;
            echo "<tr>
                 <td>" . 'Total' . "</td>
                 <td>" . $totalMarks . "</td>
                 <td>" . $_GET['passingMarks'] * $p  . "</td>
                 <td>" . $totelsum . "</td>
            </tr>";
            $Percentage = "";
            $Percentage = $totelsum * 100 / $totalMarks;
            $Grade = "";

            if ($Percentage >= 95) {
                $Grade = "A+";
            }
            if ($Percentage >= 90 && $Percentage <= 95) {
                $Grade = "A";
            }
            if ($Percentage >= 80 && $Percentage <= 90) {
                $Grade = "B";
            }
            if ($Percentage >= 70 && $Percentage <= 80) {
                $Grade = "C";
            }
            if ($Percentage >= 60 && $Percentage <= 70) {
                $Grade = "D";
            }
            if ($Percentage >= 50 && $Percentage <= 60) {
                $Grade = "F";
            }
            if ($Percentage >= 35 && $Percentage <= 50) {
                $Grade = "G";
            }
            ?>


        </table>
        <div class="result-summary">
            <?php
            if ($result == 'Pass') {
            ?>
                <p><strong>Grade:</strong><?php echo $Grade; ?></p>
                <p><strong>Percentage:</strong><?php echo $Percentage; ?>%</p>
            <?php
            }
            ?>
            <p><strong>Result</strong> <?php echo $result; ?></p>
        </div>

        <div class="signature">
            <img src="upload/school.jpg" alt="Signature" width="150px" height="120px">
        </div>
        <div class="signature">
            <?php
            echo "<button style='margin-right: 15px;' onclick='shareOnWhatsApp(\"$Grade\", \"$Percentage\", \"$result\")'>send</button>
      <button onclick='printCurrentPage()'>Print Current Page</button>";


            ?>

        </div>
    </div>
    <?php
    $sql = 'SELECT * FROM `student_form_value`';
    $result = mysqli_query($conn, $sql);

    $phonenumber = "";
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['standard'] == $_GET['stander']) {
            if ($row['classroom'] == $_GET['class']) {
                if ($row['fullname'] == $_GET['fullname']) {
                    if ($row['parentname'] == $_GET['parentname']) {
                        $phonenumber = $row['phonenumber'];
                    }
                }
            }
        }
    }
    print_r($phonenumber);
    ?>

    <script>
        function shareOnWhatsApp(Grade, Percentage, result) {
            <?php
            $sql = 'SELECT * FROM `marks`';
            $result = mysqli_query($conn, $sql);

            $subjectMarks = "";
            while ($row = mysqli_fetch_assoc($result)) {
                if ($_GET['stander'] == $row['stander'] && $_GET['fullname'] == $row['fullname']) {
                    $sub = explode(',', $row['subjectmarks']);
                    foreach ($sub as $subjectMark) {
                        $parts = explode(':', $subjectMark);
                        $subjectName = $parts[0];
                        $subjectScore = $parts[1];
                        $subjectMarks .= $subjectName . ': ' . $subjectScore . ', ';
                    }
                    $subjectMarks = rtrim($subjectMarks, ', ');
                }
            }
            ?>


            var message = '<?php echo $subjectMarks; ?>, Grade: ' + Grade + ',Percentage:' + Percentage + ',Result:' + result;
            var whatsappUrl = 'https://api.whatsapp.com/send?phone=' + <?php echo $phonenumber; ?> + '&text=' + encodeURIComponent(message);
            window.open(whatsappUrl, '_blank');
        }

        function printCurrentPage() {
            window.print(); 
        }
    </script>

</body>

</html>