<?php

require 'classes/Livro.php';

class LivroServico{

    public function buscarLivroIndex($lista_livros,$id){
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

    public function buscarLivrosDb($conexao){
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

$lista_livros = (new LivroServico)-> buscarLivrosDb($conexao);