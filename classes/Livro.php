<?php

require 'classes/Database.php';

class Livro{
   
    private string $titulo; 
    private string $autor;
    private string $status; 
    private int $id;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function recuperarLivrosDb():array{
        $query = 'SELECT * FROM livros';
        $statement = (new Database)->executarQuery($query);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}