<?php
$hostname ="localhost";
$database ="hewad";
$username ="root";
$password ="";
$DBCONNECTION = mysqli_connect($hostname,$username,$password) or trigger_error(mysqli_error());