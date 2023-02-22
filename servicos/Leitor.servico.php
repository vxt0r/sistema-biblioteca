<?php

require 'classes/Leitor.php';

class LeitorServico{

    public function buscarLivrosLeitor($id_usuario,$conexao){
        $query = "  SELECT titulo,autor,status_livro,livros.id FROM emprestimos
                    INNER JOIN livros ON id_livro = livros.id 
                    WHERE id_usuario = '$id_usuario' AND status_emp = 'em andamento'
                    ";
        $result = $conexao->query($query) or die($conexao->error);
        $livros = [];
        while($livro = $result->fetch_assoc()){
            $livros[] = $livro;
        }
        return $livros;
    }

    public function registrarEmprestimo($id_leitor,$id_livro,$conexao){
        $query = "INSERT INTO emprestimos(id_usuario,id_livro) VALUES ('$id_leitor','$id_livro')";
        $conexao->query($query) or die($conexao->error);
    }

    public function atualizarStatusEmp($id_leitor,$id_livro,$conexao){
        $query = "UPDATE emprestimos SET status_emp = 'finalizado'
        WHERE id_usuario = '$id_leitor' AND id_livro = '$id_livro'";
        $conexao->query($query) or die($conexao->error);
    }

    public function criarArrayLivrosLeitor($id,$conexao){
        $livros_leitor_db = $this->buscarLivrosLeitor($id,$conexao);
        $livros_leitor = [];

        foreach($livros_leitor_db as $livro_db){
            $livro = new Livro($livro_db['titulo'],$livro_db['autor'],$livro_db['status_livro'],$livro_db['id']);
            $livros_leitor[] = $livro;
        }

        return $livros_leitor;
    }

}
