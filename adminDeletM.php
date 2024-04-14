<?php


require_once 'database.php';


$database = new Database();

if (isset($_POST['adminMessage_id'])) {
    $adminMessage_id = $_POST['adminMessage_id'];

    $database->adminDeletemessage($adminMessage_id);
}


$database->closeConnection();
?>
