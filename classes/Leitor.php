<?php

class Leitor{
    private array $livros;
    public function __construct(private $id,private $email){}

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        $this->$atributo = $valor;
    }

    public function buscarLivro($lista_livros,$id){
        foreach($lista_livros as $livro){
            if($livro['id'] == $id){
                $livro_busca = [ 
                    $livro['titulo'],
                    $livro['autor'],
                    $livro['status_livro'],
                    $livro['id']
                ];
            }
        }
        return $livro_busca;
    }

    public function pegarEmprestado($livro){
        $this->livros[] = $livro;
        $livro->__set('status','indisponível');
    }

    // public function devolverLivro($livro){
    //     $this->livros
    // }
}