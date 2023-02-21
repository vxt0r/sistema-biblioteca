<?php

class Livro{
    public function __construct(private $titulo, private $autor, private $status, private $id)
    {}

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }
}