<?php
require_once "connections/connection.php";

$connection = OpenConnection();

$result = $connection->query("SELECT * FROM test ORDER BY id DESC");

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
                    <textarea class="form-control" name="description"></textarea>
                </div>
                <button type="submit" name="create" class="btn btn-success">Create</button>
            </form>
        </div>
    </div>

    <!-- Read data -->

    <div class="card mt-4">
        <h5 class="card-header">Todo List</h5>
        <div class="card-body">
            <table class="table  table-hover table-striped">
                <thead>
                    <tr>
                        <th class="col-3">#</th>
                        <th class="col-3">Todo</th>
                        <th class="col-3">Description</th>
                        <th class="col-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <th scope="row" ><?php echo $row['id']; ?></th>
                            <td><?php echo $row['todo']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td>
                                <div>
                                    <form>
                                        <a href="#" class="btn btn-warning">Edit</a>
                                    </form>
                                    <form method="POST" action="actions/delete.php">
                                        <button type="submit" class="btn btn-danger" name="delete">Delete</button>
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php
require('layout/footer.php');
?>