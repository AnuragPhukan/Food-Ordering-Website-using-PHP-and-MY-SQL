<?php
    
    include('../config/constants.php');
    //Delete all the sessions and redirect
    session_destroy();
    header('location:'.SITEURL.'admin/login.php');
?>