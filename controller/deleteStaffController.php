<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
if ((isset($_POST['id'])) && ($_POST['id'] != "")) {
    mysqli_select_db($DBCONNECTION,$database);
    $query = mysqli_query($DBCONNECTION,"SELECT id, userid, image FROM staff WHERE id=" . $_POST['id'] .  "") or die(mysqli_error());
    $row = mysqli_fetch_assoc($query);
    if ($row['userid'] != 1){
        if (! empty($row['image']) && $row['image'] != 'default.png'){
            unlink("../public/Storage/Staff/" . $row['image']);
        }
        mysqli_query($DBCONNECTION,"DELETE FROM staff WHERE id=" . $_POST['id'] . "") or die(mysqli_error());
    }
    $flash = new Flash();
    $flash->setFlash("One row has been deleted.", "success");
    header("Location:../views/staffs.php");
}