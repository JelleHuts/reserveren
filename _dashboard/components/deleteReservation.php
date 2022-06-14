
<?php
 if (isset($_POST['submit']) && $_POST['submit'] != '') {
    require_once '../../server.php';
    if ($_SESSION['isAdmin']) {
        $id = $_GET['id'];
        $sql = "DELETE FROM reservaties WHERE id = '$id'";
    
        $db->query($sql);
    
        header("location: ../../index.php?action=reserveren");
    } else {
        header("location: ../../index.php");
    }
 }
?>

<form action="" method="POST">

    <h2 style="color: red">Are you sure you want to delete this product?</h2>

    <input type="submit" name="submit" value="Yes, delete!">
</form>