<?php

require_once 'vendor/autoload.php';

use classes\Livro;

session_start();

if(!isset($_SESSION['id_usuario'])){
    header('location: login.php');
}

$livros = (new Livro)->recuperarLivrosDb();

include_once 'includes/index-view.php';


