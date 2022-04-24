<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
if ((isset($_POST['id'])) && ($_POST['id'] != "")) {
    mysqli_select_db($DBCONNECTION,$database);
    $query = mysqli_query($DBCONNECTION,"SELECT image FROM teacher WHERE id=" . $_POST['id']);
    $row = mysqli_fetch_assoc($query);
    if (! empty($row['image']) && $row['image'] != 'default.png'){
        unlink("../public/Storage/Teacher/" . $row['image']);
    }
    mysqli_query($DBCONNECTION,"DELETE FROM teacher WHERE id=" . $_POST['id']);
    $flash = new Flash();
    $flash->setFlash("One row has been deleted.", "success");
    header("Location:../views/teachers.php");
}