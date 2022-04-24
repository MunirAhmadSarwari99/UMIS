<?php
class Flash
{
    public function __construct(){
        if(!isset($_SESSION)){
            session_start();
        }
    }
    public function setFlash($message, $type = 'danger'){
        $_SESSION['flash'] = array(
            'message' => $message,
            'type'    => $type
        );
    }
    public function flash(){
        if(isset($_SESSION['flash'])){
            echo "
            <script>Swal.fire({icon: '" .$_SESSION['flash']['type']. "', title: '" .$_SESSION['flash']['message']. "', showConfirmButton: false, timer: 2000,});</script>";
            unset($_SESSION['flash']);
        }
    }
}