classDiagram
  class Aluno {
    <<Table: alunos>>
    +nome
    +email
    +senha
    +matricula
    +curso
  }
  class Bibliotecario {
    <<Table: bibliotecarios>>
    +nome
    +email
    +senha
  }
  class Emprestimo {
    <<Table: emprestimos>>
    +livro_id
    +aluno_id
    +data_emprestimo
    +data_devolucao
    +status
  }
  class Livro {
    <<Table: livros>>
    +titulo
    +autor
    +ano_publicacao
    +isbn
    +editora
    +quantidade
  }
  class User {
    +name
    +email
    +password
  }
  Emprestimo <-- Livro : livro
  Emprestimo <-- Aluno : aluno
