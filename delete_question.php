<?php


require_once 'database.php';


$database = new Database();

if (isset($_POST['question_id'])) {
  $questionId = $_POST['question_id'];

  $database->deleteQuestion($questionId, );
}

$database->closeConnection();
?>
