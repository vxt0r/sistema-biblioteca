<?php

require_once 'vendor/autoload.php';

use classes\Cadastro;

if(!empty($_POST)){
    if(isset($_GET['cadastrar'])){
        (new Cadastro)->cadastrarUsuario($_POST['nome'],$_POST['email'],$_POST['senha']);
    }
    else{
        (new Cadastro)->entrar($_POST['email'],$_POST['senha']);
    }
}

include_once 'includes/login-view.php';
?>