<?php
require 'config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>My To Do lists</title>
    
</head>
<body>
<?php
$pdostmt = $pdo->prepare("SELECT * from todo ORDER BY id DESC");
$pdostmt->execute();
$result = $pdostmt->fetchAll();
?>

    <div class="card">
        <div class="card-body">
            <h2>To do lists</h2>
            <div>
            <a href="add.php" type="button" class="btn btn-success">Add New List</a>
            </div>
            <br>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; if ($result)  { foreach($result as $value) { ?>
                      
                    <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $value['title']; ?></td>
                        <td><?php echo $value['description']; ?></td>
                        <td><?php echo date('d-m-Y',strtotime($value['created_at'])); ?></td>
                        <td>
                        <a href="edit.php?id=<?php echo $value['id'];?>" type="button" class="btn btn-warning">Edit</a>
                        <a href="delete.php?id=<?php echo $value['id']; ?>" type="button" class="btn btn-danger">Delete</a>
                        </td>
                    <?php $i++; }} ?>    
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    
</body>
</html>