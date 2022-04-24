<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
$img = $_FILES['photo']['name'];
$id = $_POST['staffId'];
if(! empty($img)){
    mysqli_select_db($DBCONNECTION, $database);
    $query = mysqli_query($DBCONNECTION,"SELECT image FROM staff WHERE id=" . $id) or die(mysqli_error());
    $row = mysqli_fetch_assoc($query);
    $imageName = time().$_FILES['photo']['name'];
    $source3 = $_FILES['photo']['tmp_name'];
    if ($row['image'] != 'default.png'){
//        unlink("../public/Storage/Staff/" . $row['image']);
    }
    $target3 = "../public/Storage/Staff/".$imageName;
    move_uploaded_file($_FILES["photo"]["tmp_name"],$target3);
    mysqli_query($DBCONNECTION,"UPDATE staff SET image = '$imageName' WHERE id=" . $id) or die(mysqli_error());
}
if(isset($_POST['firstName'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $hometown = $_POST['hometown'];
    $livesin = $_POST['livesin'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $gendre = $_POST['gendre'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $regdate = $_POST['regdate'];
    mysqli_select_db($DBCONNECTION, $database);
    mysqli_query($DBCONNECTION,"UPDATE staff SET firstName = '$firstName', lastName = '$lastName', year = '$year', mounth = '$month', day = '$day', gender = '$gendre', pcity = '$hometown', ccity = '$livesin', nic = '$nic', phone = '$phone', position = '$position', regdate = '$regdate' WHERE id=" . $id) or die(mysqli_error());
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}