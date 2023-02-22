<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entrar</title>
    <link rel="stylesheet" href="css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body class="d-flex justify-content-center bg-light">
    <main class="login bg-primary rounded shadow-lg">

        <form class="mx-auto mt-4 mb-2 text-white" action="cadastro.php?entrar=1" method="POST">
            <div class="p-3">
                <label class="form-label" for="">Email</label>
                <input class="form-control" name="email" type="text">
            </div>

            <div class="p-3">
                <label class="form-label" for="">Senha</label>
                <input class="form-control" name="senha" type="text">
            </div>

            <div class="my-4 d-flex justify-content-center">
                <button class="btn btn-dark" type="submit">Entrar</button>
            </div>

        </form>
    </main>
    
</body>
</html>