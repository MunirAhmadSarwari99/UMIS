<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$query = mysqli_query($DBCONNECTION,"SELECT * FROM users ORDER BY id ASC");