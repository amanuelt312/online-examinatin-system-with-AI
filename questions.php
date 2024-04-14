<?php
include 'nav.php';
$role = $_SESSION['role'];
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $role == "teacher") {

  header('Location: login.php');
  exit;
}
if (isset($_SESSION['finished']) && $_SESSION['finished'] == true) {
  header('Location: login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <style>
/* Existing styles */

  body {
    font-family: Arial, sans-serif;
     background-image: url(bk.png);
  background-size: cover;
  color: white;
    padding: 20px;
    margin: 0;
    padding: 0;

  }

  form {
    background-color: #fff;
    padding: 20px;
  color: #01012e;

    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  }

  p {
    font-size: 18px;
    line-height: 1.5;
    margin-bottom: 15px;
  }

  input[type="radio"],
  input[type="text"] {
    margin-bottom: 10px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    cursor: pointer;
  }

  input[type="radio"]:checked,
  input[type="text"]:focus {
    outline: none;
    border-color: #4CAF50;
    box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
  }

  input[type="submit"] {
    background-color: #0077c5;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }

  hr {
    border: none;
    border-top: 1px solid #ccc;
    margin: 15px 0;
  }
</style>

    <link rel="stylesheet" href="questions.css">
    <title>Document</title>     
</head>
<body>
    <?php
    require_once 'database.php';
    $department = $_SESSION['StudentDepartment'];
    $studentid = $_SESSION['id'];


    $database = new Database();
    $database->studentGetQuestions($department, $studentid);

    $database->closeConnection();


    ?>

</body>
</html>
