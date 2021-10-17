<?php
require_once("../connections/connection.php");

$connection=OpenConnection();

if (isset($_POST['delete'])) {

    $id=$_POST['id'];

    $connection->query("DELETE FROM `test` WHERE `test`.`id` = $id");
    header('Location: ' . $_SERVER['HTTP_REFERER']);

}
?>