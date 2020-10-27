<?php
require 'config.php';

if(isset($_POST['submit'])) {
    $title = $_POST['title'];
    $desc = $_POST['description'];
    $id = $_POST['id'];

    $sql = "UPDATE todo SET title='$title, description='$desc' WHERE id ='$id'";
    $pdostmt = $pdo->prepare($sql);
    $result = $pdostmt->execute();
    if($result) {
        echo "<script>alert('New task is added');window.location.href='index.php';</script>";
    } 
} else {
    $pdostmt = $pdo->prepare("SELECT * from todo WHERE id=".$_GET['id']);
    $pdostmt->execute();
    $result= $pdostmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
        <h2>Edit To Do list</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <input type="hidden" name="id" value="<?php echo $result[0]['id']?>">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="form-control" value="<?php echo $result[0]['title']?>">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" cols="80" rows="8" class="form-control"
                    ><?php echo $result[0]['description']?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" value="UPDATE" class="btn btn-primary">
                    <a href="index.php" class="btn btn-warning" type="button">Back</a>
                </div>
            </form>
        </div>
    </div>
 </div>   
</body>
</html>