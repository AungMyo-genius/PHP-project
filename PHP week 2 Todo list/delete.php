<?php

require "config.php";

$sql = "DELETE from todo WHERE id=".$_GET['id'];

$pdostmt= $pdo->prepare($sql);

$result = $pdostmt->execute();
header("Location: index.php");