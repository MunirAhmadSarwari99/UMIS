<?php
mysqli_select_db($DBCONNECTION,$database);
$faculty = mysqli_query($DBCONNECTION,"SELECT * FROM faculty ORDER BY id ASC");
$subject = mysqli_query($DBCONNECTION,"SELECT * FROM subject ORDER BY id ASC");
$homework = mysqli_query($DBCONNECTION,"SELECT homework.id, homework.Homework, homework.UploadHomework FROM homework ORDER BY id ASC");