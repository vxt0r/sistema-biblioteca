<?php


class Leitor{
    private int $id;
    private array $livros = [];
    private string $email;

    public function __get($atributo){
        return $this->$atributo;
    }

    public function __set($atributo,$valor){
        if($atributo == 'livros'){
            $this->livros[] = $valor;
        }
        else{
            $this->$atributo = $valor;
        }
    }

    public function recuperarDadosUsuario(int $id_usuario):array{
        $parametros = [$id_usuario];
        $query = 'SELECT * FROM cadastro WHERE id = ?';
        $statement = (new Database)->executarQuery($query,$parametros);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function recuperarLivrosEmp(int $id_usuario):array{ 
       $query = "   SELECT titulo,autor,status_livro,livros.id 
                    FROM emprestimos 
                    INNER JOIN cadastro ON cadastro.id = id_usuario 
                    INNER JOIN livros ON livros.id = id_livro
                    WHERE id_usuario = ? AND status_emp = 'em andamento'";

        $parametros = [$id_usuario];         
        $statement = (new Database)->executarQuery($query,$parametros);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function adicionarLivrosUsuario(array $emprestimos,Leitor $leitor):void{
            foreach($emprestimos as $emprestimo){
                $livro = New Livro();
                $livro->__set('titulo',$emprestimo->titulo);
                $livro->__set('autor',$emprestimo->autor);
                $livro->__set('status',$emprestimo->status_livro);
                $livro->__set('id',$emprestimo->id);
                $leitor->__set('livros',$livro);
            }
    }

    public function registrarEmp(Livro $livro):void{
        $parametros = [$this->id,$livro->__get('id')];
        $query = 'INSERT INTO emprestimos(id_usuario,id_livro) VALUES (?,?)';
        $statement = (new Database)->executarQuery($query,$parametros);
    }

    public function atualizarStatusLivro(Livro $livro,string $estado):void{
        $parametros = [$estado,$livro->__get('id')];
        $query = "UPDATE livros SET status_livro = ? WHERE id = ?";
        $statement = (new Database)->executarQuery($query,$parametros);
    }

    public function pegarEmprestado(Livro $livro):void{
        $this->registrarEmp($livro);
        $this->atualizarStatusLivro($livro,'indisponível');
    }

    public function finalizarEmp(Livro $livro):void{
        $parametros = [$this->id,$livro->__get('id')];
        $query = "  UPDATE emprestimos SET status_emp = 'finalizado' 
                    WHERE id_usuario = ? AND id_livro = ?";
        $statement = (new Database)->executarQuery($query,$parametros);
    }

    public function devolverLivro(Livro $livro):void{
        $this->finalizarEmp($livro);
        $this->atualizarStatusLivro($livro,'disponível');
    }

}