 <main class="row col-10 col-sm-8 col-md-6 mx-auto mt-5 bg-dark rounded shadow-lg">

        <form class="row col-12 col-sm-10 col-md-8 mx-auto mt-3 mb-2 text-white" action="cadastro.php?cadastrar=1" method="POST">

            <div class="col-12 gy-4 mx-auto">
                <label class="form-label" for="">Nome</label>
                <input class="form-control" name="nome" type="text">
            </div>

            <div class="col-12 gy-4 mx-auto">
                <label class="form-label" for="">Email</label>
                <input class="form-control" name="email" type="text">
            </div>

            <div class="col-12 gy-4 mx-auto">
                <label class="form-label" for="">Senha</label>
                <input class="form-control" name="senha" type="text">
            </div>

            <div class="col-12 gy-5 mx-auto text-center">
                <button class="btn btn-light" type="submit">Cadastrar</button>
            </div>

            <div class="col-12 gy-3 mx-auto text-center">
                <span> Já possui uma conta? <a href="login.php">Entrar</a></span>
            </div>


        </form>
    </main>
</div>
    
</body>
</html>