<?php
require_once('../connections/connection.php');

$connection= OpenConnection();

if (isset($_POST['create'])) {

$todo = $_POST['todo'];
$description = $_POST['description'];

$connection->query("INSERT INTO `test` (`todo` , `description`) VALUES ('$todo','$description')");

header('Location: ' . $_SERVER['HTTP_REFERER']);

}


?>