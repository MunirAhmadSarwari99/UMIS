<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$faculty = mysqli_query($DBCONNECTION,"SELECT * FROM faculty ORDER BY id ASC");
$facultys = mysqli_query($DBCONNECTION,"SELECT * FROM faculty ORDER BY id ASC");