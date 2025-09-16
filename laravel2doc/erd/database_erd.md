erDiagram
  aluno {
    int id PK "Primary key"
    string nome
    string email
    string senha
    string matricula
    string curso
    datetime created_at
    datetime updated_at
  }
  bibliotecario {
    int id PK "Primary key"
    string nome
    string email
    string senha
    datetime created_at
    datetime updated_at
  }
  emprestimo {
    int id PK "Primary key"
    int livro_id FK "References livro"
    int aluno_id FK "References aluno"
    string data_emprestimo
    string data_devolucao
    string status
    datetime created_at
    datetime updated_at
  }
  livro {
    int id PK "Primary key"
    string titulo
    string autor
    string ano_publicacao
    string isbn
    string editora
    string quantidade
    datetime created_at
    datetime updated_at
  }
  user {
    int id PK "Primary key"
    string name
    string email
    string password
    datetime created_at
    datetime updated_at
  }
  emprestimo }|--|| livro : "livro"
  emprestimo }|--|| aluno : "aluno"
