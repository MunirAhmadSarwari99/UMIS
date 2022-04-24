<?php
session_start();
function flash($Message, $Level){
    $_SESSION['flash-message'] = $Message;
    $_SESSION['flash-level'] = $Level;
}