<?php 
    if(isset($_GET['cadastrar'])){
        $action = 'login.php?cadastrar=1';
        $span = 'Já possui conta ?';
        $link = 'login.php';
        $link_texto = 'Entrar';
        $btn = 'Cadastrar';
    }else{
        $action = 'login.php';
        $span = 'Ainda não possui conta ?';
        $link = 'login.php?cadastrar=1';
        $link_texto = 'Cadastrar';
        $btn = 'Entrar';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>

<body class="row bg-primary">
    <div class="container">
        
        <main class="row col-10 col-sm-8 col-md-6 gy-5 mx-auto bg-dark mt-5 rounded shadow-lg">

           
            <form action="<?php echo $action ?>" class="row col-12 col-sm-10 col-md-8 gy-3 mx-auto mt-3 mb-2 text-white" method="POST">
            
                <?php if(isset($_GET['cadastrar'])){ ?>
                    <div class="col-12 gy-4 mx-auto">
                        <label class="form-label" for="">Nome</label>
                        <input class="form-control" name="nome" type="text">
                    </div>
                <?php } ?>

                <div class="col-12 gy-4 mx-auto">
                    <label class="form-label" for="">Email</label>
                    <input class="form-control" name="email" type="text">
                </div>

                <div class="col-12 gy-4 mx-auto">
                    <label class="form-label" for="">Senha</label>
                    <input class="form-control" name="senha" type="text">
                </div>
                
                
                <div class="col-12 gy-5 mx-auto text-center">
                    <button class="btn btn-light" type="submit"><?php echo $btn ?></button>
                </div>

                <div class="col-12 gy-4 mx-auto text-center">
                    <span><?php echo $span ?>
                        <a href="<?php echo $link ?>"><?php echo $link_texto ?></a>
                    </span>
                </div>

            </form>
        </main>
    </div>
</body>
</html>

        