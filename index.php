<?php

require 'emprestimo.php';

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
    <!-- <link rel="stylesheet" href="css/index.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="row bg-dark text-white">

    <header class="col-10 col-sm-8 gy-5 mx-auto text-center">
        <p class="display-6">Faça o empréstimo de livros online!</p>
    </header>

    <main class="row col-10 col-sm-8 gy-5 mx-auto">
        
        <section class="col-10 col-sm-2 gy-3 mx-auto text-center">
            <a href="estante.php">Minha estante</a>
        </section>

        <section class="col-10 col-sm-10 gy-3 mx-auto text-center">

            <ul class="row">
            <?php foreach($lista_livros as $livro){?>
                <li class="col-10 col-sm-6 mb-5 list-unstyled">
                    <?php echo $livro['titulo']?>
                    (<?php echo $livro['status_livro']?>)<br>
                    
                    <?php if($livro['status_livro'] == 'disponível'){?>
                        <a href="estante.php?emp=1&id=<?php echo $livro['id']?>">Pegar Emprestado</a>
                    <?php } ?>
                </li>
                <?php } ?>
            </ul>
        </section>
        
    </main>
    
</body>
</html>