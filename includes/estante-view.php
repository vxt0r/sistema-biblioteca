<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minha estante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estante.css">
</head>
<body class="bg-primary">
    <div class="container w-75 mt-5 py-3 bg-dark text-center text-white rounded">
        <header class="my-4">
            <span>Seus Livros:</span>
            <br><br>
            <a href="index.php">Início</a>
        </header>
        <main>
            <?php if(empty($leitor->__get('livros'))){?>
                    <span>Você está sem livros, pegue um emprestado!</span>
            <?php } ?>

            <?php foreach($leitor->__get('livros') as $livros_leitor){ ?>
                <li class="row list-unstyled d-flex justify-content-center mx-auto mb-5">
                    <span class="col-12 col-sm-6 mb-2"><?php echo $livros_leitor->__get('titulo') ?></span>

                    <form class="col-12 col-sm-6"action="?dev=1" method="POST">
                        <input type="hidden" name="id" value="<?php echo $livros_leitor->__get('id') ?>">
                        <button class="btn btn-primary"type="submit">Devolver</button>
                    </form>
                </li>
            <?php } ?>
            
        </main>
        <footer></footer>
    </div>
    
</body>
</html>