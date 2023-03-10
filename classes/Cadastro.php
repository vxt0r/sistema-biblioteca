<?php

namespace classes;

require_once 'vendor/autoload.php';

use classes\Database;
use PDO;

class Cadastro{

    public function buscarUsuario(string $email):array{
        $parametros = [$email];
        $query = 'SELECT * FROM cadastro WHERE email = ?';
        $statement = (New Database)->executarQuery($query,$parametros);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function entrar(string $email,string $senha):void{
        $usuario = $this->buscarUsuario($email);

        if(password_verify($senha,$usuario[0]->senha)){
            session_start();
            $_SESSION['id_usuario'] = $usuario[0]->id;
            header('location:index.php');
        }
    }

    public function cadastrarUsuario(string $nome,string $email,string $senha):void{
        $hash = password_hash($senha,PASSWORD_DEFAULT);
        $parametros = [$nome,$email,$hash];
        $query = 'INSERT INTO cadastro(nome,email,senha) VALUES (?,?,?)';
        $statement = (New Database)->executarQuery($query,$parametros);
        $this->entrar($email,$senha);
    }

}