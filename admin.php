<?php
include 'nav.php';
$role = $_SESSION['role'];
// Check if the user is not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['id'] != "admin") {

  header('Location: login.php');
  exit;
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Admin Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0px;
       align-items: center;
        justify-content: center;
background-image: url(bk.png);
    color: white  ;
    }

    h3 {
        align-items: center;
        display: flex;
        justify-content: center;
      margin-bottom: 20px;
    }

    table {
      border-collapse: collapse;
      width: 70%;
      margin: auto;
    }

    table, th, td {
      border: 1px solid #ccc;
    }

    th, td {
      padding: 10px;
    }
    /* <style>
  table {
    border-collapse: collapse;
    width: 100%;
  } */

  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
  }

  th {
    background-color: #071E22;
  }

  .delete-form {
    display: inline-block;
    margin-right: 5px;
  }

  button {
    background-color: red;
    color: white;
    border: none;
    padding: 6px 12px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    cursor: pointer;
    border-radius: 4px;
  }

  </style>
</head>
<body>
        
  <h3>Admin Page</h3>

  <?php
  require 'database.php';
  $database = new Database();

  echo "<h3>All Users</h3>";
  $database->getAllUsers();
  echo "<h3>All Questions</h3>";
  $database->getAllQuestions();
  echo "<h3>All Messages</h3>";
  $database->getAllContactMessages();

  $database->closeConnection();
  ?>
</body>
</html>
