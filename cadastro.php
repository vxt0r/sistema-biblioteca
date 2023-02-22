<?php

require 'servicos/Cadastro.servico.php';

if(isset($_GET['cadastrar'])){
    (new CadastroServico) -> cadastrar($_POST['nome'],$_POST['email'],$_POST['senha'],$conexao);
}

elseif(isset($_GET['entrar'])){
    (new CadastroServico) -> entrar($_POST['email'],$_POST['senha'],$conexao);
}

