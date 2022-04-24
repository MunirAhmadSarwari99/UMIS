<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
mysqli_select_db($DBCONNECTION, $database);
if (! empty($_POST['subject']) && ! empty($_POST['subjectID'])){
    $id = $_POST['subjectID'];
    $subject = $_POST['subject'];
    mysqli_query($DBCONNECTION,"UPDATE subject SET subname = '$subject' WHERE id=" . $id);
    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}