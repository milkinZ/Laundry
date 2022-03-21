<?php
function navbar(){
    if(!isset($_SESSION)){
    session_start();
    }
        if($_SESSION['role']=='admin'){
            include ("header_admin.php");
        }elseif($_SESSION['role']=='kasir'){
            include ("header_kasir.php");
        }elseif($_SESSION["role"]=="owner"){
            include ("header_owner.php");
        }
    }
?>