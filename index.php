<?php
require_once "connections/connection.php";

$connection=OpenConnection();

$result= $connection->query("SELECT * FROM test ORDER BY id DESC");

$connection->close();

require('layout/header.php');
?>

<!-- Create todo -->

<div class="container ">
    <div class="card mt-4">
        <h5 class="card-header">Create New Todo</h5>
        <div class="card-body">
            <form method="POST" action="actions/store.php">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Todo</label>
                    <input type="text" class="form-control" name="todo">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Description</label>
                    <textarea  class="form-control" name="description" ></textarea>
                </div>
                <button type="submit" name="create" class="btn btn-success">Create</button>
            </form>
        </div>
</div>




<?php
require('layout/footer.php');
?>