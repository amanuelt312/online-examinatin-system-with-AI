<?php
include 'nav.php';
$role = $_SESSION['role'];
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $role == "teacher") {

    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Welcome to the Exam</title>
    <style>
        body {
            margin:0;
            text-align: center;
            font-family: Arial, sans-serif;
             background-image: url(bk.png);
            background-size: cover;
            color: white;
        }
        p {
            margin-bottom: 20px;
        }
        .start-button {
            padding: 10px 20px;
            background-color: #0077c5;
            color: #FFF;
            font-size: 18px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .start-button:hover {
           background-color: #0f2535;
        }
    </style>
</head>
<body>
     <?php
     if (isset($_SESSION['finished']) && $_SESSION['finished'] == true) {
         $studentName = $_SESSION['username'];
         echo "<h2>Congratulations, $studentName! You have successfully finished the exam.</h2>";
         $mark = $_SESSION['savedMark'];
         echo "<h2>Score: $mark</h2>";

         echo " <form method='POST'>";
         echo " <input type='submit' name='submittRank' value='Return to Rank Page' class='start-button'>";
         echo "</form>";
     } else {
         $user = $_SESSION['username'];
         echo "<h1>Welcome to the Exam $user </h1>";
         echo "<h2>Exam Information</h2>";
         echo "<h3>Before you start the exam, please take note of the following:</h3>";

         echo "<h3>Read each question carefully before answering.</h3>";
         echo "<h3>Make sure to select the correct option for each multiple-choice question.</h3>";
         echo "<h3>You cannot go back to previous questions once you move forward.</h3>";

         echo "<form method='POST'>";
         echo "<input type='submit' name='submitt' value='Start Exam' class='start-button'>";
         echo "</form>";
     }
     ?>
</body>
</html>

<!-- <?php
if (isset($_POST['submitt'])) {
    header('Location:questions.php');
}
if (isset($_POST['submittRank'])) {
    header('Location:rank.php');
}
?> -->