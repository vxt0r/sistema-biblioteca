<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="bg-primary">
    <div class="container text-white">
        <header class="my-5 text-center">
            <span class="h5">Escolha algum livro disponível e alugue digitalmente!</span>
        </header>

        <main class="w-75 mx-auto bg-dark rounded">
            <div class="estante pt-2 text-center rounded">
                <a class="h6" href="estante.php">Minha estante</a>
            </div>

            <ul class="py-3 row mx-auto text-center container">

                <?php foreach($livros as $livro){ ?>
                    <li class="col-12 col-md-5 mx-auto mb-5 list-unstyled">

                        <span><?php echo $livro->titulo ?></span><br>
                        <span><?php echo $livro->autor ?></span><br>
                        <span>(<?php echo $livro->status_livro ?>)</span><br><br>
                        <img class="w-50 h-50"src="imagens/<?php echo $livro->imagem_jpg?>" alt=""><br><br>

                        <?php if($livro->status_livro == 'disponível'){ ?>
                                <form class="" action="estante.php?emp=1" method="POST">
                                    <input type="hidden" name="titulo" value="<?php echo $livro->titulo ?>">
                                    <input type="hidden" name="autor" value="<?php echo $livro->autor ?>">
                                    <input type="hidden" name="id" value="<?php echo $livro->id ?>">
                                    <button class="btn btn-primary rounded"type="submit">
                                        Pegar emprestado
                                    </button>
                                </form>
                        <?php } ?>
                    </li>
                <?php } ?>
            </ul>
        </main>

        <footer class="text-center mt-3 mb-5">
            <a class="h5" href="logout.php">Sair</a>
        </footer>
    </div>
</body>
</html>