<?php

if(isset($_GET['logout'])){
    if($_GET['logout'] == 1){
        session_destroy();
        header("Location: login.php");
    }
}

?>
