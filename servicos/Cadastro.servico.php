<?php

require 'classes/Conexao.php';
session_start();

if(!isset($_SESSION['logado'])){
    $_SESSION['logado'] = 0;
} 

class CadastroServico{

    public function buscarCadastro(PDO $conexao):array{
        $buscar= 'SELECT * from cadastro';
        $stmt = $conexao->prepare($buscar);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function cadastrar(string $nome, string $email, string $senha,PDO $conexao):void{
        $cadastros = $this->buscarCadastro($conexao);

        foreach($cadastros as $cadastro){
            if($email == $cadastro->senha){
                die('Esse email já possui cadastro');
            }
        }        
        $hash = password_hash($senha,PASSWORD_DEFAULT);

        $cadastrar = "INSERT INTO cadastro(nome,email,senha) VALUES (:nome,:email,:hashSenha)";
		$stmt = $conexao->prepare($cadastrar);
		$stmt ->bindValue(':nome',$nome);
        $stmt ->bindValue(':email',$email);
        $stmt ->bindValue(':hashSenha',$hash);
		$stmt->execute(); 
        header('Location: login.php');
    }

    public function entrar(string $email,string $senha,PDO $conexao):void{
        $cadastros = $this->buscarCadastro($conexao);
        foreach($cadastros as $cadastro){
            if($email == $cadastro->email && password_verify($senha,$cadastro->senha)){
                $_SESSION['logado'] = 1; 
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $cadastro->id;       
                header('Location: index.php');
            }
        }
    }
}



