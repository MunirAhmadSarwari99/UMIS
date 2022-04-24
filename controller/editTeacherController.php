<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
$img = $_FILES['photo']['name'];
$id = $_POST['teacherId'];
if(! empty($img)){
    mysqli_select_db($DBCONNECTION, $database);
    $query = mysqli_query($DBCONNECTION,"SELECT image FROM teacher WHERE id=" . $id);
    $row = mysqli_fetch_assoc($query);
    $imageName = time().$_FILES['photo']['name'];

    if ($row['image'] != 'default.png'){
        unlink("../public/Storage/Teacher/" . $row['image']);
    }

    $target3 = "../public/Storage/Teacher/".$imageName;
    move_uploaded_file($_FILES["photo"]["tmp_name"],$target3);
    mysqli_query($DBCONNECTION,"UPDATE teacher SET image = '$imageName' WHERE id=" . $id);
}

$faculty = $_POST['faculty'];
$department = $_POST['department'];

if (! empty($faculty) && ! empty($department)){
    mysqli_select_db($DBCONNECTION, $database);
    mysqli_query($DBCONNECTION,"UPDATE teacher SET departmentid = '$department', facultyid = '$faculty' WHERE id=" . $id);
}

if(isset($_POST['firstName'])){
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $fatherName = $_POST['fatherName'];
    $hometown = $_POST['hometown'];
    $livesin = $_POST['livesin'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $gendre = $_POST['gendre'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    $regdate = $_POST['regdate'];
    $degree = $_POST['degree'];
    mysqli_select_db($DBCONNECTION, $database);
    mysqli_query($DBCONNECTION,"UPDATE teacher SET firstName = '$firstName', fatherName = '$fatherName', lastName = '$lastName', year = '$year', mounth = '$month', day = '$day', gender = '$gendre', pcity = '$hometown', ccity = '$livesin', nic = '$nic', phone = '$phone', regdate = '$regdate', degree = '$degree' WHERE id=" . $id) or die(mysqli_error($DBCONNECTION));
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}