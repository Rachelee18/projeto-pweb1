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
  class AlunoController {
    <<Controller>>
    +showLoginForm()
    +login(Request $request)
    +pesquisarLivros(Request $request)
    +catalogoAluno()
    +logout()
  }
  class BibliotecarioController {
    <<Controller>>
    +showLoginForm()
    +login(Request $request)
    +catalogo()
    +logout()
    +cadastrarLivro(Request $request)
    +selecionarParaAtualizar()
    +edit(Request $request)
    +update(Request $request, $id)
    +mostrarDeletar()
    +destroy(Request $request)
  }
  class Controller {
    <<Controller>>
  }
  class EmprestimoController {
    <<Controller>>
    +index()
    +create()
    +store(Request $request)
    +meusEmprestimos($aluno_id)
  }
  class LivroController {
    <<Controller>>
    +index()
    +create()
    +store(Request $request)
    +edit($id)
    +update(Request $request, $id)
    +destroy($id)
    +catalogoAluno()
    +pesquisar(Request $request)
  }
  Emprestimo <-- Livro : livro
  Emprestimo <-- Aluno : aluno
