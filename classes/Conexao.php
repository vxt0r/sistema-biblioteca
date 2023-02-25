<?php

class Conexao{
    private $host = 'localhost';
    private $db = 'biblioteca';
    private $user = 'phpmyadmin';
    private $pass = '2342';

    public function conectar():PDO{
        try{
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->db",
                "$this->user",
                "$this->pass"
            );
            return $conexao;
        
        }catch(PDOException $e){
                echo '<p>'. $e->getMessage() . '</p>';
        }
    }
}

$conexao = (new Conexao)->conectar();