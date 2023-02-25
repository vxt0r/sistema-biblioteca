<?php

class Leitor{
    private array $livros;
    public function __construct(private int $id,private string $email){}

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

}