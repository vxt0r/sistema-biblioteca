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
<body class="bg-dark text-white">
    <main class="d-flex w-75 flex-column align-items-start mt-5 mb-3 ms-5">
        <h1>Seus Livros:</h1>
        <ul>
            <?php foreach($leitor->__get('livros') as $livro){ ?>
                <li class="my-2">
                    <?php echo $livro->__get('titulo')?>
                    <a href="?dev=1&id=<?php echo $livro->__get('id')?>">Devolver</a>
                </li>

            <?php } ?>
        </ul>
        <a href="index.php">Início</a>
    </main>
</body>
</html>