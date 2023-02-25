<?php

class Livro{
    public function __construct(
        private string $titulo, 
        private string $autor, 
        private string $status, 
        private int $id){}

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
}