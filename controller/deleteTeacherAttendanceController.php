<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
if ((isset($_POST['id'])) && ($_POST['id'] != "")) {
    mysqli_select_db($DBCONNECTION,$database);
    mysqli_query($DBCONNECTION,"DELETE FROM teacherattr WHERE id=" . $_POST['id']);
    $flash = new Flash();
    $flash->setFlash("One row has been deleted.", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}