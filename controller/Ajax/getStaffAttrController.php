<?php
include_once ('../../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$attr1 = mysqli_query($DBCONNECTION,"SELECT COUNT(staffattendance.attr) as total1 FROM staffattendance WHERE staffattendance.attr = 0 AND staffattendance.staffid LIKE '%" .$_POST['query']. "%'");
$attr2 = mysqli_query($DBCONNECTION,"SELECT COUNT(staffattendance.attr) as total2 FROM staffattendance WHERE staffattendance.attr = 2 AND staffattendance.staffid LIKE '%" .$_POST['query']. "%'");
$attr3 = mysqli_query($DBCONNECTION,"SELECT COUNT(staffattendance.attr) as total3 FROM staffattendance WHERE staffattendance.attr = 3  AND staffattendance.staffid LIKE '%" .$_POST['query']. "%'");
$row1 = mysqli_fetch_assoc($attr1);
$row2 = mysqli_fetch_assoc($attr2);
$row3 = mysqli_fetch_assoc($attr3);
echo $row1['total1'] + $row2['total2'] + $row3['total3'];
