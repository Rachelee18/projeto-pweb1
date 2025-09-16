sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant AlunoController as AlunoController
    participant Livro as Livro
    participant DB as Database
    
    C->>R: Request
    R->>+AlunoController: catalogoAluno()
    Note over AlunoController: Process request
    alt Uses database
      AlunoController->>+Livro: operation()
      Livro->>+DB: Database query
      DB-->>-Livro: Return data
      Livro-->>-AlunoController: Return result
    else Direct response
      Note over AlunoController: Process without database
    end
    AlunoController-->>-R: Return response
    R-->>C: Response
    
    Note over AlunoController: Generic operation flow
  