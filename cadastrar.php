<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faça seu cadastro</title>
</head>
<body>
    <form action="cadastro.php?cadastrar=1" method="POST">

        <label for="">Nome</label>
        <input name="nome" type="text">

        <label for="">Email</label>
        <input name="email" type="text">

        <label for="">Senha</label>
        <input name="senha" type="text">

        <button type="submit">Cadastrar</button>

    </form>
    
</body>
</html>