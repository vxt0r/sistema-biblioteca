<?php

require 'servicos/Emprestimo.servico.php';


$livros_leitor = (new LeitorServico)->criarArrayLivrosLeitor($_SESSION['id'],$conexao);
$leitor = new Leitor($_SESSION['id'],$_SESSION['email']);
$leitor->__set('livros',$livros_leitor);


$livro_busca = [];
if(isset($_GET['id'])){

    $livro_busca = $leitor->buscarLivro($lista_livros,$_GET['id']);
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


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha estante</title>
</head>
<body>
    <h1>Seus Livros:</h1>
    <ul>
        <?php foreach($leitor->__get('livros') as $livro){ ?>
            <li>
                <?php echo $livro->__get('titulo')?>
                <a href="?dev=1&id=<?php echo $livro->__get('id')?>">Devolver</a>
            </li>

        <?php } ?>
    </ul>
    <a href="index.php">Início</a>
</body>
</html>