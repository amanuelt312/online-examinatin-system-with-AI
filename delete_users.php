<?php
require_once 'database.php';


$database = new Database();
if (isset($_POST['deleteuser_id'])) {

    $deleteuser_id = $_POST['deleteuser_id'];
    $database->deleteUser($deleteuser_id);
    // echo $_POST['deleteuser_id'];
}

$database->closeConnection();
?>
