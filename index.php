<?php

require 'servicos/Emprestimo.servico.php';

if($_SESSION['logado'] == 0){
    header('Location: login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca</title>
</head>
<body>
    <ul>
    <?php foreach($lista_livros as $livro){?>

        <li>
            <?php echo $livro['titulo']?>
            <?php echo $livro['status_livro']?>

            <?php if($livro['status_livro'] == 'disponível'){?>
                <a href="estante.php?emp=1&id=<?php echo $livro['id']?>">Pegar Emprestado</a>
            <?php } ?>
        </li>

    <?php } ?>
    </ul>

    <a href="estante.php">Minha estante</a>
    
</body>
</html>