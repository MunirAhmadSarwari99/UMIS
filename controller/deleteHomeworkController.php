<?php
include_once('../database/DBConnect.php');
include_once('../database/Flash.php');
if ((isset($_POST['id'])) && ($_POST['id'] != "")) {
    mysqli_select_db($DBCONNECTION, $database);
    $query = mysqli_query($DBCONNECTION, "SELECT homework.id, homework.Homework FROM homework where  id=" . $_POST['id']);
    $row = mysqli_fetch_assoc($query);

    unlink("../public/Storage/File/" . $row['Homework']);
    mysqli_query($DBCONNECTION, "DELETE FROM homework WHERE id=" . $row['id']);

    $flash = new Flash();
    $flash->setFlash("One row has been deleted.", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}