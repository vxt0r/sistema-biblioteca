<?php

require 'classes/Livro.php';

session_start();

if(!isset($_SESSION['id_usuario'])){
    header('location: login.php');
}

$livros = (new Livro)->recuperarLivrosDb();

include_once 'includes/index-view.php';


