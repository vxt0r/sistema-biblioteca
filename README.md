# Sistema de controle de empréstimos de livros
- O usuário pode se cadastrar e alugar os livros que estiverem disponíveis
- Ao alugar um livro, ele fica indisponível pra outros usuários até sua devolução
- Uso de 3 Tabelas: cadastro (id, nome, email, senha), livro (id, titulo, autor, status) e empréstimo (id, id_usuario, id_livro, status)