<?php 
    session_start();
    unset($_SESSION['username']);
    unset($_SESSION['userrole']);
    unset($_SESSION['userid']);
    
    header('Location: index.php');
?>