<?php
include_once('../database/DBConnect.php');
include_once('../database/Flash.php');
mysqli_select_db($DBCONNECTION, $database);
if (!empty($_FILES['ReplayHomework']) && ! empty($_POST['HomeworkID'])) {

    $homework = mysqli_query($DBCONNECTION,"SELECT homework.UploadHomework FROM homework WHERE id ={$_POST['HomeworkID']}");
    $row = mysqli_fetch_assoc($homework);

    if ($row['UploadHomework'] != null){
        unlink("../public/Storage/File/" . $row['UploadHomework']);
    }
    $ReplayHomework = time() . $_FILES['ReplayHomework']['name'];
    $target3 = "../public/Storage/File/" . $ReplayHomework;
    move_uploaded_file($_FILES["ReplayHomework"]["tmp_name"], $target3);

    $HomeworkID = $_POST['HomeworkID'];

    mysqli_query($DBCONNECTION,"UPDATE homework SET UploadHomework = '$ReplayHomework' WHERE id=" . $HomeworkID);

    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}