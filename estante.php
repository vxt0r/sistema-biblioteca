<?php

require_once 'vendor/autoload.php';

use classes\Livro;
use classes\Leitor;

session_start();

if(!isset($_SESSION['id_usuario'])){
    header('location: login.php');
}


$cadastro = (new Leitor)->recuperarDadosUsuario((int)$_SESSION['id_usuario']);//pegar o id do usuario pelo login
$emprestimos = (new Leitor)->recuperarLivrosEmp((int)$_SESSION['id_usuario']);

$leitor = new Leitor();
$leitor->__set('id',(int)$cadastro[0]->id);
$leitor->__set('email',$cadastro[0]->email);
$leitor->adicionarLivrosUsuario($emprestimos,$leitor);

if(!empty($_GET)){

    $livro = new Livro();
    $livro->__set('id',$_POST['id']);
    
    if(isset($_GET['emp'])){
        $livro->__set('titulo',$_POST['titulo']);
        $livro->__set('autor',$_POST['autor']);    
        $leitor->pegarEmprestado($livro);

    }
    elseif(isset($_GET['dev'])){
        $leitor->devolverLivro($livro);
    }

    header('location:estante.php');

}

include_once 'includes/estante-view.php';
