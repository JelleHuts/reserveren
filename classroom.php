<?php
$url1=$_SERVER['REQUEST_URI'];
header("Refresh: 60; URL=$url1");
  require 'server.php';

  if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ./login.php");
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Classroom</title>
    <link rel="stylesheet" href="css/material-dashboard.min.css">
    <link rel="stylesheet" href="css/classroom.css">
</head>
<body>
    <?php 
        if(isset($_GET['classroom'])) {
            include("classroom_display.php");
        } else {
            include("classroom_select.php");
        } 
    ?>
</body>
</html>