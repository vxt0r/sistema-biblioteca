<?php
require 'emprestimo.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha estante</title>
    <link rel="stylesheet" href="css/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="row bg-dark text-white">

    <main class="col-10 col-sm-6 gy-3 mx-auto mt-3">
        <h1 class="col-10 col-sm-8 col-md-6 gy-4 mx-auto text-center">Seus Livros:</h1>

        <ul class="row col-10 col-sm-8 my-5">
            <?php foreach($leitor->__get('livros') as $livro){ ?>
                <li class="col-12 gy-4">
                    <?php echo $livro->__get('titulo')?><br>
                    <a href="?dev=1&id=<?php echo $livro->__get('id')?>">Devolver</a>
                </li>

            <?php } ?>
        </ul>

        <div class="col-10 mx-auto text-center">
            <a href="index.php">Início</a>
        </div>
    </main>
</body>
</html>