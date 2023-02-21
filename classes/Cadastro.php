<?php

require 'Model.php';

if(isset($_GET['cadastrar'])){
    (new Model) -> cadastrar($_POST['nome'],$_POST['email'],$_POST['senha'],$conexao);
}

elseif(isset($_GET['entrar'])){
    (new Model) -> entrar($_POST['email'],$_POST['senha'],$conexao);
}

