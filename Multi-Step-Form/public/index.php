<?php
    declare(strict_types = 1);
    session_start();
    if(isset($_SESSION['registerd']) && $_SESSION['registered'] == TRUE){
        header("Location: ./../partial/registeredAnnouncement.php");
    }
    require './../partial/readCsv.php';
    require './../registration.php';
    
?>