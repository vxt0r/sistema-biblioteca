<?php

require 'classes/Livro.php';

class LivroServico{

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
}

$lista_livros = (new LivroServico)-> buscarLivros($conexao);