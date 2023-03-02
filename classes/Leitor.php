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

    public function recuperarDadosUsuario($id_usuario){
        $statement = (new Database('cadastro'))->buscar('id = '.$id_usuario);
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function recuperarLivrosEmp($id_usuario){ 
       $query = "   SELECT titulo,autor,status_livro,livros.id 
                    FROM emprestimos 
                    INNER JOIN cadastro ON cadastro.id = id_usuario 
                    INNER JOIN livros ON livros.id = id_livro
                    WHERE id_usuario = '$id_usuario' 
                    AND status_emp = 'em andamento'";
        $statement = (new Database('emprestimos'))->executar($query);

        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function adicionarLivrosUsuario($emprestimos,$leitor){
            foreach($emprestimos as $emprestimo){
                $livro = New Livro();
                $livro->__set('titulo',$emprestimo->titulo);
                $livro->__set('autor',$emprestimo->autor);
                $livro->__set('status',$emprestimo->status_livro);
                $livro->__set('id',$emprestimo->id);
                $leitor->__set('livros',$livro);
            }
    }

    public function pegarEmprestado($livro){
        (new Database('emprestimos'))->cadastrar([
                                            'id_usuario'=> $this->id,
                                            'id_livro' => $livro->__get('id')
                                        ]);
        (new Database('livros'))->atualizar('id = ' . $livro->__get('id'),[
                                        'status_livro' => 'indisponível']);
    }

    public function devolverLivro($livro){
        (new Database('emprestimos'))->atualizar(
            'id_livro = ' . $livro->__get('id') . ' AND id_usuario = '. $this->id
            ,['status_emp' => 'finalizado']);

        (new Database('livros'))->atualizar('id = ' . $livro->__get('id'),[
                                        'status_livro' => 'disponível']);
    }

}