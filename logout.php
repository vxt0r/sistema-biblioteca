<?php
if(!isset($_SESSION['id_usuario'])){
    header('location: login.php');
}
?>