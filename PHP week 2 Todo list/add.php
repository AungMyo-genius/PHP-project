<?php
require 'config.php';

if($_POST) {
    $title = $_POST['title'];
    $desc = $_POST['description'];

    $sql = "INSERT INTO todo (title,description) VALUES (:title,:description)";

    $pdostmt = $pdo->prepare($sql);

    $result = $pdostmt->execute(
        array(
            ":title" => $title, ":description" =>$desc
        )
    );

    if($result) {
        echo "<script>alert('New task is added');window.location.href='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Your List</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="card">
        <div class="card-body">
        <h2>Add New To Do list</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea name="description" id="description" cols="80" rows="8" class="form-control"></textarea>
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