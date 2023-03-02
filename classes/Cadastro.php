<?php

require 'classes/Database.php';

class Cadastro{

    public function entrar($email,$senha){
        $statement = (New Database('cadastro'))->buscar("email = '$email'");
        $usuario =  $statement->fetchAll(PDO::FETCH_OBJ);

        if(password_verify($senha,$usuario[0]->senha)){
            $_SESSION['id_usuario'] = $usuario[0]->id;
            header('location:index.php');
        }else{
            unset($_SESSION['id_usuario']);  
        }
    }

    public function cadastrarUsuario($nome,$email,$senha){
        $hash = password_hash($senha,PASSWORD_DEFAULT);
        (new Database('cadastro'))->cadastrar([
                                        'nome' => $nome,
                                        'email' => $email,
                                        'senha' => $hash
                                    ]);
        $this->entrar($email,$senha);
    }

}