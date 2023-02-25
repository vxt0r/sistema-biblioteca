<?php

require 'classes/Leitor.php';

class LeitorServico{

    public function buscarLivrosLeitor(int $id_usuario,PDO $conexao):array{
        $buscar = " SELECT titulo,autor,status_livro,livros.id FROM emprestimos
                    INNER JOIN livros ON id_livro = livros.id 
                    WHERE id_usuario = :id_usuario AND status_emp = 'em andamento'";

        $stmt = $conexao->prepare($buscar);
        $stmt->bindValue(':id_usuario',$id_usuario);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function registrarEmprestimo(int $id_leitor,int $id_livro,PDO $conexao):void{
        $cadastrar = "INSERT INTO emprestimos(id_usuario,id_livro) VALUES (:id_leitor,:id_livro)";
        $stmt = $conexao->prepare($cadastrar);
        
        $stmt->bindValue(':id_leitor',$id_leitor);
        $stmt->bindValue(':id_livro',$id_livro);
        
        $stmt->execute();
        
    }

    public function atualizarStatusEmp(int $id_leitor,int $id_livro,PDO $conexao):void{
        $atualizar = "UPDATE emprestimos SET status_emp = 'finalizado'
        WHERE id_usuario = :id_leitor AND id_livro = :id_livro";

        $stmt = $conexao->prepare($atualizar);
        $stmt->bindValue(':id_leitor',$id_leitor);
        $stmt->bindValue(':id_livro',$id_livro);
        $stmt->execute();
    }

    public function criarArrayLivrosLeitor(int $id,PDO $conexao):array{
        $livros_leitor_db = $this->buscarLivrosLeitor($id,$conexao);
        $livros_leitor = [];

        foreach($livros_leitor_db as $livro_db){
            $livro = new Livro(
                $livro_db->titulo,
                $livro_db->autor,
                $livro_db->status_livro,
                $livro_db->id
            );

            $livros_leitor[] = $livro;
        }

        return $livros_leitor;
    }

}
