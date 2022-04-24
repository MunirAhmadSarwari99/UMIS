<?php
include_once ('../../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$attr1 = mysqli_query($DBCONNECTION,"SELECT COUNT(teacherattr.attr) as total1 FROM teacherattr WHERE teacherattr.attr = 0 AND teacherattr.teacherid LIKE '%" .$_POST['query']. "%'");
$attr2 = mysqli_query($DBCONNECTION,"SELECT COUNT(teacherattr.attr) as total2 FROM teacherattr WHERE teacherattr.attr = 2 AND teacherattr.teacherid LIKE '%" .$_POST['query']. "%'");
$attr3 = mysqli_query($DBCONNECTION,"SELECT COUNT(teacherattr.attr) as total3 FROM teacherattr WHERE teacherattr.attr = 3  AND teacherattr.teacherid LIKE '%" .$_POST['query']. "%'");
$row1 = mysqli_fetch_assoc($attr1);
$row2 = mysqli_fetch_assoc($attr2);
$row3 = mysqli_fetch_assoc($attr3);
echo $row1['total1'] + $row2['total2'] + $row3['total3'];