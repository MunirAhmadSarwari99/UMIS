<?php
include_once ('../database/DBConnect.php');
include_once('../database/Flash.php');
if ((isset($_POST['id'])) && ($_POST['id'] != "")) {
    mysqli_select_db($DBCONNECTION,$database);
    $query = mysqli_query($DBCONNECTION,"SELECT users.id, users.level, users.photo FROM users where  users.id=" . $_POST['id']);
    $row = mysqli_fetch_assoc($query);
    if ($row['id'] != 1){
        if ($row['level'] == 0 || $row['level'] == 1 && ! empty($row['photo']) && $row['photo'] != 'default.png'){
            $query = mysqli_query($DBCONNECTION,"SELECT staff.image FROM staff where  userid=" . $row['id']);
            $rows = mysqli_fetch_assoc($query);
            unlink("../public/Storage/Users/" . $row['photo']);
            if (! empty($rows['image']) && $rows['image'] != 'default.png'){
                unlink("../public/Storage/Staff/" . $rows['image']);
            }
        }
        if ($row['level'] == 2 && ! empty($row['photo']) && $row['photo'] != 'default.png'){
            $query = mysqli_query($DBCONNECTION,"SELECT teacher.image FROM teacher where  userid=" . $row['id']);
            $rows = mysqli_fetch_assoc($query);
            unlink("../public/Storage/Users/" . $row['photo']);
            if (! empty($rows['image']) && $rows['image'] != 'default.png'){
                unlink("../public/Storage/Teacher/" . $rows['image']);
            }
        }
        if ($row['level'] == 3 && ! empty($row['photo']) && $row['photo'] != 'default.png'){
            $query = mysqli_query($DBCONNECTION,"SELECT student.image FROM student where  userid=" . $row['id']);
            $rows = mysqli_fetch_assoc($query);
            unlink("../public/Storage/Users/" . $row['photo']);
            if (! empty($rows['image']) && $rows['image'] != 'default.png'){
                unlink("../public/Storage/Student/" . $rows['image']);
            }
        }
        mysqli_query($DBCONNECTION,"DELETE FROM users WHERE id=" . $row['id']);
    }
    $flash = new Flash();
    $flash->setFlash("One row has been deleted.", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}