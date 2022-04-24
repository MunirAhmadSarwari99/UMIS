<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT teacher.id, users.email, teacher.firstName, teacher.lastName, teacher.gender, teacher.image, teacher.phone  FROM users INNER JOIN teacher ON teacher.userid = users.id ORDER BY teacher.id ASC");