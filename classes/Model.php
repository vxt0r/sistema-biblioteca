<?php

require 'Conexao.php';
session_start();

if(!isset($_SESSION['logado'])){
    $_SESSION['logado'] = 0;
} 

class Model{

    public function buscarLivros($conexao){
        $query = 'SELECT * FROM livros';
        $result = $conexao->query($query) or die($conexao->error);
        $livros = [];
        while($livro = $result->fetch_assoc()){
            $livros[] = $livro; 
        }
        return $livros;
    }

    public function atualizarStatusLivro($id,$estado,$conexao){
        $query = "UPDATE livros SET status_livro = '$estado' WHERE id ='$id'";
        $result = $conexao->query($query) or die($conexao->error);
    }

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
                header('Location: ../index.php');
            }
        }
    }

    public function buscarLivrosLeitor($id_usuario,$conexao){
        $query = "  SELECT titulo,autor,status_livro,livros.id FROM emprestimos
                    INNER JOIN livros ON id_livro = livros.id 
                    WHERE id_usuario = '$id_usuario' AND status_emp = 'em andamento'
                    ";
        $result = $conexao->query($query) or die($conexao->error);
        $livros = [];
        while($livro = $result->fetch_assoc()){
            $livros[] = $livro;
        }
        return $livros;
    }

    public function registrarEmprestimo($id_leitor,$id_livro,$conexao){
        $query = "INSERT INTO emprestimos(id_usuario,id_livro) VALUES ('$id_leitor','$id_livro')";
        $conexao->query($query) or die($conexao->error);
    }

    public function atualizarStatusEmp($id_leitor,$id_livro,$conexao){
        $query = "UPDATE emprestimos SET status_emp = 'finalizado'
        WHERE id_usuario = '$id_leitor' AND id_livro = '$id_livro'";
        $conexao->query($query) or die($conexao->error);
    }

    public function criarArrayLivrosLeitor($id,$conexao){
        $livros_leitor_db = $this->buscarLivrosLeitor($id,$conexao);
        $livros_leitor = [];

        foreach($livros_leitor_db as $livro_db){
            $livro = new Livro($livro_db['titulo'],$livro_db['autor'],$livro_db['status_livro'],$livro_db['id']);
            $livros_leitor[] = $livro;
        }

        return $livros_leitor;
    }

}

$lista_livros = (new Model)-> buscarLivros($conexao);