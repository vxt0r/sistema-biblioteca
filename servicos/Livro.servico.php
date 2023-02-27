<?php

require 'classes/Livro.php';

class LivroServico{

    public function buscarLivroIndex(array $lista_livros,int $id):array{
        foreach($lista_livros as $livro){
            if($livro->id == $id){
                $livro_busca = [ 
                    $livro->titulo,
                    $livro->autor,
                    $livro->status_livro,
                    $livro->id,
                    $livro->imagem_jpg
                ];
            }
        }
        return $livro_busca;
    } 

    public function buscarLivrosDb(PDO $conexao):array{
        $buscar = 'SELECT * FROM livros';
        $smtm = $conexao->prepare($buscar);
        $smtm->execute();
        return $smtm->fetchAll(PDO::FETCH_OBJ);
    }

    public function atualizarStatusLivro(int $id,string $estado,PDO $conexao):void{
        $atualizar = "UPDATE livros SET status_livro = :estado WHERE id =:id";
        
        $smtm = $conexao->prepare($atualizar);
        $smtm->bindValue(':estado',$estado);
        $smtm->bindValue(':id',$id);
        $smtm->execute();
    }
}

$lista_livros = (new LivroServico)-> buscarLivrosDb($conexao);