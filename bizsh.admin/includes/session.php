<?php
    session_start();
    if(!isset($_SESSION['islogin'])){
         echo '<script>window.location.href="index"</script>';
    }
?>