<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
if ($_POST['level'] == 0 || $_POST['level'] == 1){
    mysqli_select_db($DBCONNECTION,$database);
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];

    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $photo = $_FILES['photo']['name'];
    $imageName = null;
    if (! empty($photo)){
        $imageName = time().$_FILES['photo']['name'];
        $target3 = "../public/Storage/Users/".$imageName;
        move_uploaded_file($_FILES["photo"]["tmp_name"],$target3);
    }else{
        $imageName = 'default.png';
    }

    $statue = $_POST['statue'];

    mysqli_query($DBCONNECTION,"INSERT INTO users (firstName, lastName,email, password, level, photo, statue) VALUES ('$firstName', '$lastName', '$email', '$password', '$level', '$imageName', '$statue')");

    $userid = $DBCONNECTION->insert_id;

    $admin = $_POST['admin'];
    $finance = $_POST['finance'];
    $hr = $_POST['hr'];
    $logistic = $_POST['logistic'];

    mysqli_query($DBCONNECTION,"INSERT INTO roles (userid, admin, finance, hr, logistic) VALUES ('$userid', '$admin', '$finance', '$hr', '$logistic')");

    $visit = $_POST['visit'];
    $create = $_POST['create'];
    $edit = $_POST['edit'];
    $delete = $_POST['delete'];

    mysqli_query($DBCONNECTION,"INSERT INTO permissions (userid, reed1, create1, edit1, delete1) VALUES ('$userid', '$visit', '$create', '$edit', '$delete')");

    $facultyId = $_POST['faculty'];
    $hometown = $_POST['hometown'];
    $livesin = $_POST['livesin'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $gendre = $_POST['gendre'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    $position = $_POST['position'];
    $image = $_FILES['image']['name'];
    $imageStaffName = null;
    if (! empty($image)){
        $imageStaffName = time().$_FILES['image']['name'];
        $target3 = "../public/Storage/Staff/".$imageStaffName;
        move_uploaded_file($_FILES["image"]["tmp_name"],$target3);
    }else{
        $imageStaffName = 'default.png';
    }

    $regdate = $_POST['regdate'];
    $manager = $_POST['manager'];

    mysqli_query($DBCONNECTION,"INSERT INTO staff (userid, facultyid, firstName, lastName, year, mounth, day, gender, pcity, ccity, nic, phone, position, image, regdate, manager) VALUES ('$userid', '$facultyId', '$firstName', '$lastName', '$year', '$month',' $day','$gendre', '$hometown', '$livesin', '$nic', '$phone', '$position', '$imageStaffName', '$regdate', '$manager')");
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}elseif ($_POST['level'] == 2){
    mysqli_select_db($DBCONNECTION,$database);
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $photo = $_FILES['photo']['name'];
    $imageName = null;
    if (! empty($photo)){
        $imageName = time().$_FILES['photo']['name'];
        $target3 = "../public/Storage/Users/".$imageName;
        move_uploaded_file($_FILES["photo"]["tmp_name"],$target3);
    }else{
        $imageName = 'default.png';
    }

    $statue = $_POST['statue'];

    mysqli_query($DBCONNECTION,"INSERT INTO users (firstName, lastName,email, password, level, photo, statue) VALUES ('$firstName', '$lastName', '$email', '$password', '$level', '$imageName', '$statue')");
    $userid = $DBCONNECTION->insert_id;

    $visit = $_POST['visit'];
    $create = $_POST['create'];
    $edit = $_POST['edit'];
    $delete = $_POST['delete'];

    mysqli_query($DBCONNECTION,"INSERT INTO permissions (userid, reed1, create1, edit1, delete1) VALUES ('$userid', '$visit', '$create', '$edit', '$delete')");

    $facultyId = $_POST['faculty'];
    $departmentId = $_POST['department'];
    $fatherName = $_POST['fatherName'];
    $hometown = $_POST['hometown'];
    $livesin = $_POST['livesin'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $gendre = $_POST['gendre'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    $image = $_FILES['image']['name'];
    $imageTeacherName = null;
    if (! empty($image)){
        $imageTeacherName = time().$_FILES['image']['name'];
        $target3 = "../public/Storage/Teacher/".$imageTeacherName;
        move_uploaded_file($_FILES["image"]["tmp_name"],$target3);
    }else{
        $imageTeacherName = 'default.png';
    }
    $regdate = $_POST['regdate'];
    $degree = $_POST['degree'];

    mysqli_query($DBCONNECTION,"INSERT INTO teacher (userid, departmentid, facultyid, firstName, fatherName, lastName, year, mounth, day, gender, pcity, ccity, nic, phone, image, regdate, degree) VALUES ('$userid', '$departmentId', '$facultyId', '$firstName', '$fatherName', '$lastName', '$year', '$month',' $day','$gendre', '$hometown', '$livesin', '$nic', '$phone', '$imageTeacherName', '$regdate', '$degree')");
    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}elseif ($_POST['level'] == 3){
    mysqli_select_db($DBCONNECTION,$database);
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $photo = $_FILES['photo']['name'];
    $imageName = null;
    if (! empty($photo)){
        $imageName = time().$_FILES['photo']['name'];
        $target3 = "../public/Storage/Users/".$imageName;
        move_uploaded_file($_FILES["photo"]["tmp_name"],$target3);
    }else{
        $imageName = 'default.png';
    }

    $statue = $_POST['statue'];

    mysqli_query($DBCONNECTION,"INSERT INTO users (firstName, lastName,email, password, level, photo, statue) VALUES ('$firstName', '$lastName', '$email', '$password', '$level', '$imageName', '$statue')");
    $userid = $DBCONNECTION->insert_id;


    $visit = $_POST['visit'];
    $create = $_POST['create'];
    $edit = $_POST['edit'];
    $delete = $_POST['delete'];

    mysqli_query($DBCONNECTION,"INSERT INTO permissions (userid, reed1, create1, edit1, delete1) VALUES ('$userid', '$visit', '$create', '$edit', '$delete')");

    $facultyId = $_POST['faculty'];
    $departmentId = $_POST['department'];
    $classId = $_POST['class'];
    $fatherName = $_POST['fatherName'];
    $hometown = $_POST['hometown'];
    $livesin = $_POST['livesin'];
    $year = $_POST['year'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $gendre = $_POST['gendre'];
    $nic = $_POST['nic'];
    $phone = $_POST['phone'];
    $image = $_FILES['image']['name'];
    $imageStudentName = null;
    if (! empty($image)){
        $imageStudentName = time().$_FILES['image']['name'];
        $target3 = "../public/Storage/Student/".$imageStudentName;
        move_uploaded_file($_FILES["image"]["tmp_name"],$target3);
    }else{
        $imageStudentName = 'default.png';
    }
    $school = $_POST['school'];
    $graduationYear = $_POST['graduationYear'];
    $KankorNo = $_POST['KankorNo'];
    $regdate = $_POST['regdate'];

    mysqli_query($DBCONNECTION,"INSERT INTO student (userid, departmentid, facultyid, classid, SfirstName, SfatherName, SlastName, year, mounth, day, gender, pcity, ccity, nic, phone, image, school, graduationYear, KankorNo, regdate) VALUES ('$userid', '$departmentId', '$facultyId', '$classId', '$firstName', '$fatherName', '$lastName', '$year', '$month',' $day','$gendre', '$hometown', '$livesin', '$nic', '$phone', '$imageStudentName', '$school', '$graduationYear', '$KankorNo', '$regdate')");
    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}