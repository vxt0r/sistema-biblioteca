<?php

require 'classes/Conexao.php';
session_start();

if(!isset($_SESSION['logado'])){
    $_SESSION['logado'] = 0;
} 

class CadastroServico{

    public function buscarCadastro($conexao){
        $query= 'SELECT * from cadastro';
        $result = $conexao->query($query) or die($conexao->error);
        $cadastros = [];
        while($cadastro = $result->fetch_assoc()){
            $cadastros[] = $cadastro;
        }
        return $cadastros;
    }

    public function cadastrar($nome,$email,$senha,$conexao){
        $cadastros = $this->buscarCadastro($conexao);
        foreach($cadastros as $cadastro){
            if($email == $cadastro['email']){
                die('Esse email já possui cadastro');
            }
        }

        $hash = password_hash($senha,PASSWORD_DEFAULT);
        $query = "INSERT INTO cadastro(nome,email,senha) VALUES ('$nome','$email','$hash')";
        $conexao->query($query) or die($conexao->error);
        header('Location: login.php');
    }

    public function entrar($email,$senha,$conexao){
        $cadastros = $this->buscarCadastro($conexao);
        foreach($cadastros as $cadastro){
            if($email == $cadastro['email'] && password_verify($senha,$cadastro['senha'])){
                $_SESSION['logado'] = 1; 
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $cadastro['id'];         
                header('Location: index.php');
            }
        }
    }
}



