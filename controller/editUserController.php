<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');

$img = $_FILES['photo']['name'];
$userid = $_POST['userid'];
if(! empty($img)){
    mysqli_select_db($DBCONNECTION, $database);
    $query = mysqli_query($DBCONNECTION,"SELECT photo FROM users WHERE id='$userid'") or die(mysqli_error());
    $row = mysqli_fetch_assoc($query);
    $imageName = time().$_FILES['photo']['name'];
    if ($row['photo'] != 'default.png'){
        unlink("../public/Storage/Users/" . $row['photo']);
    }
    $target3 = "../public/Storage/Users/".$imageName;
    move_uploaded_file($_FILES["photo"]["tmp_name"],$target3);
    mysqli_query($DBCONNECTION,"UPDATE users SET photo = '$imageName' WHERE id='$userid'")or die(mysqli_error()); ;
}
if (isset($_POST['submit'])){
    mysqli_select_db($DBCONNECTION,$database);
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $statue = $_POST['statue'];
    $level = $_POST['level'];

    mysqli_query($DBCONNECTION,"UPDATE users SET firstName ='$firstName', lastName ='$lastName', email ='$email', level ='$level', statue ='$statue' WHERE id ='$userid'") or die(mysqli_error());

    $admin = $_POST['admin'];
    $finance = $_POST['finance'];
    $hr = $_POST['hr'];
    $logistic = $_POST['logistic'];

    mysqli_query($DBCONNECTION,"UPDATE roles SET admin ='$admin', hr ='$hr', finance ='$finance', logistic ='$logistic' WHERE userid='$userid'") or die(mysqli_error());

    $visit = $_POST['visit'];
    $create = $_POST['create'];
    $edit = $_POST['edit'];
    $delete = $_POST['delete'];

    mysqli_query($DBCONNECTION,"UPDATE permissions SET reed1 ='$visit', create1 ='$create', edit1 ='$edit', delete1 ='$delete' WHERE userid='$userid'") or die(mysqli_error());
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}