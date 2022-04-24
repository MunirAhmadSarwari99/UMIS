<?php
include_once ('../database/DBConnect.php');
include_once ('../database/Flash.php');
mysqli_select_db($DBCONNECTION, $database);
if (! empty($_POST['Question']) && ! empty($_POST['Score']) &&! empty($_POST['examid']) &&! empty($_POST['FirstAnswer']) && ! empty($_POST['SecondAnswer']) && ! empty($_POST['ThirdAnswer']) && ! empty($_POST['FourthAnswer']) && ! empty($_POST['RightAnswer'])){
    $Question = $_POST['Question'];
    $FirstAnswer = $_POST['FirstAnswer'];
    $SecondAnswer = $_POST['SecondAnswer'];
    $ThirdAnswer = $_POST['ThirdAnswer'];
    $FourthAnswer = $_POST['FourthAnswer'];
    $RightAnswer = $_POST['RightAnswer'];
    $Score = $_POST['Score'];
    $examid = $_POST['examid'];

    mysqli_query($DBCONNECTION, "INSERT INTO examaq (onlineExamid, Question, Answer1, Answer2, Answer3, Answer4, RightAnswer, Score) VALUES ('$examid', '$Question', '$FirstAnswer', '$SecondAnswer', '$ThirdAnswer', '$FourthAnswer', '$RightAnswer', '$Score')") or die(mysqli_error($DBCONNECTION));
//    mysqli_error($DBCONNECTION);
    $flash = new Flash();
    $flash->setFlash("Your information has been saved", "success");
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}