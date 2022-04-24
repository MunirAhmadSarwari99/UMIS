<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT student.id, users.email, student.SfirstName, student.SlastName, student.gender, student.image, student.phone  FROM users INNER JOIN student ON student.userid = users.id ORDER BY student.id ASC");