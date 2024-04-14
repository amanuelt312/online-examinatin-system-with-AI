<?php
include 'nav.php';
$role = $_SESSION['role'];
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $role == "teacher") {

    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
     body {
            margin: 0;
            text-align: center;
            font-family: Arial, sans-serif;
             background-image: url(bk.png);
            background-size: cover;
            color: white;
        }
        h1 {
            color: #333;
        }
        p {
            margin-bottom: 20px;
        }   
        table {
      width: 50%;
      margin: auto  ;
      border-collapse: collapse;

        }
    
    th, td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }
    
    th {
      /* background-color: #f2f2f2; */
      font-weight: bold;
    }
    
    tr:nth-child(even) {
      background-color:white ;
      color:black;

    }
</style>
<body>

    <?php

    require_once 'database.php';
    $database = new Database();


    $studentid = $_SESSION['id'];
    $StudentDepartment = $_SESSION['StudentDepartment'];
    if (isset($_SESSION['finished']) && $_SESSION['finished'] == true) {
        $mark = $_SESSION['savedMark'];

    } else {

        $mark = $_GET['mark'];
        $_SESSION['savedMark'] = $mark;

    }


    // $query = "SELECT * FROM mark_table WHERE student_id='$studentid'";
    
    $query1 = "SELECT * FROM mark_table WHERE student_id='$studentid'";
    $result1 = $database->getConnection()->query($query1);
    if ($result1 && $result1->num_rows == 0) {

        $database->saveStudentMarks($studentid, $StudentDepartment, $mark);
    } else if ($result1 && $result1->num_rows > 0) {
        $query3 = "UPDATE `mark_table` SET `mark`='$mark' WHERE `student_id`='$studentid'";
        $result3 = $database->getConnection()->query($query3);
    }

    $query2 = "SELECT * FROM mark_table ORDER BY mark DESC";
    $result2 = $database->getConnection()->query($query2);

    if ($result2 && $result2->num_rows > 0) {
        echo "<h2>Your Mark: $mark</h2>";
        echo "<h2>Rankings:</h2>";

        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Rank</th>';
        echo '<th>Name</th>';
        echo '<th>Mark</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        $rank = 1;
        while ($row = $result2->fetch_assoc()) {
            $name = $row['student_id'];
            $marks = $row['mark'];
            if ($name == $studentid) {
                echo "<tr style='background-color:#20639B;'>";
                echo "<td > $rank</td>";
                echo "<td style=' font-weight: bold;'>$name</td>";
                echo "<td>$marks</td>";
                echo '</tr>';

            } else {
                echo '<tr>';
                echo "<td> $rank</td>";
                echo "<td>$name</td>";

                echo "<td>$marks</td>";
                echo '</tr>';
            }
            $rank++;
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No rankings available.";
    }
    $_SESSION['finished'] = true;

    ?>
    
</body>
</html>