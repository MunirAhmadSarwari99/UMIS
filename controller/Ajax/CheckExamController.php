<?php
include_once('../../database/DBConnect.php');
session_start();
mysqli_select_db($DBCONNECTION,$database);
if (isset($_POST['AnswerID'])){
    $ID = $_POST['AnswerID'];
    $RightAnswer = mysqli_query($DBCONNECTION,"SELECT examaq.id, examaq.RightAnswer, examaq.Score FROM examaq WHERE examaq.id =" . $ID);
    $StudentID = $_POST['Student'];
    while ($row = mysqli_fetch_assoc($RightAnswer)){
        $AnswerID = $row["id"];
    $RightAnswer = $row['RightAnswer'];
    $Score = $row["Score"];
    $SubjectID = $_POST["SubjectID"];
        if (isset($_POST["answer"])){
            if ($_POST["answer"] == $row["RightAnswer"]){
                mysqli_query($DBCONNECTION,"INSERT INTO getexam (examAQid, studentid, SubjectID, Scores) VALUES ('$AnswerID', '$StudentID', '$SubjectID', '$Score')");
            }else{
                mysqli_query($DBCONNECTION,"INSERT INTO getexam (examAQid, studentid, SubjectID, Scores) VALUES ('$AnswerID', '$StudentID', '$SubjectID', '0')");
            }
        }
    }
}