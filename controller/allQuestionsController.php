<?php
include_once ('../database/DBConnect.php');
mysqli_select_db($DBCONNECTION,$database);
$Questions = mysqli_query($DBCONNECTION,"SELECT examaq.Question, examaq.Answer1, examaq.Answer2, examaq.Answer3, examaq.Answer4, examaq.RightAnswer, examaq.Score FROM examaq WHERE examaq.onlineExamid =". $_GET['Questions']);