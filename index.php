<?php

require 'classes/Livro.php';
require 'logout.php';



$livros = (new Livro)->recuperarLivrosDb();

include_once 'includes/index-header.php';
include_once 'includes/index-main.php';
include_once 'includes/index-footer.php';

