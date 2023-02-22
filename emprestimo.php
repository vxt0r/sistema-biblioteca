<?php

session_start();
require 'classes/Conexao.php';
require 'servicos/Livro.servico.php';
require 'servicos/Leitor.servico.php';

$livros_leitor = (new LeitorServico)->criarArrayLivrosLeitor($_SESSION['id'],$conexao);
$leitor = new Leitor($_SESSION['id'],$_SESSION['email']);
$leitor->__set('livros',$livros_leitor);


$livro_busca = [];
if(isset($_GET['id'])){

    $livro_busca = (new LivroServico)->buscarLivroIndex($lista_livros,$_GET['id']);
    $livro = new Livro($livro_busca[0],$livro_busca[1],$livro_busca[2],$livro_busca[3]);

    if(isset($_GET['emp'])){
        (new LivroServico)->atualizarStatusLivro($livro->__get('id'),'indisponível',$conexao);
        (new LeitorServico)->registrarEmprestimo($leitor->__get('id'),$livro->__get('id'),$conexao);
    }
    elseif(isset($_GET['dev'])){
        (new LivroServico)->atualizarStatusLivro($livro->__get('id'),'disponível',$conexao);
        (new LeitorServico)->atualizarStatusEmp($leitor->__get('id'),$livro->__get('id'),$conexao);
    }

    $livros_leitor = (new LeitorServico)->criarArrayLivrosLeitor($_SESSION['id'],$conexao);
    $leitor->__set('livros',$livros_leitor);
}


