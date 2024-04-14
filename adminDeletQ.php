<?php


require_once 'database.php';


$database = new Database();

if (isset($_POST['adminQuestion_id'])) {

    $adminQuestion_id = $_POST['adminQuestion_id'];


    $database->adminDeleteQuestion($adminQuestion_id);
}


$database->closeConnection();
?>
