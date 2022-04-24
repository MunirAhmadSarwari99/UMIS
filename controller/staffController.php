<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT staff.id, staff.userid, users.email, staff.firstName, staff.lastName, staff.gender, staff.image, staff.phone  FROM users INNER JOIN staff ON staff.userid = users.id ORDER BY staff.id ASC");