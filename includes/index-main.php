<main class="w-75 mx-auto bg-dark text-white rounded">
    <div class="estante pt-2 bg-primary text-center rounded">
        <a class="h6" href="estante.php">Minha estante</a>
    </div>

    <ul class="py-3 row mx-auto text-center container">

        <?php foreach($livros as $livro){ ?>
            <li class="col-12 col-md-5 mx-auto list-unstyled">

                <span><?php echo $livro->titulo ?></span><br>
                <span><?php echo $livro->autor ?></span><br>
                <span>(<?php echo $livro->status_livro ?>)</span><br><br>
                <img class="w-50 h-50"src="imagens/<?php echo $livro->imagem_jpg?>" alt=""><br><br>

                <?php if($livro->status_livro == 'disponível'){ ?>
                        <form class="" action="estante.php?emp=1" method="POST">
                            <input type="hidden" name="titulo" value="<?php echo $livro->titulo ?>">
                            <input type="hidden" name="autor" value="<?php echo $livro->autor ?>">
                            <input type="hidden" name="id" value="<?php echo $livro->id ?>">
                            <button type="submit">Pegar emprestado</button>
                        </form>
                <?php } ?>
            </li>
        <?php } ?>
    </ul>
    
</main>
