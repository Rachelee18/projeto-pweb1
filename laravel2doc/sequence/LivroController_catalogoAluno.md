sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant LivroController as LivroController
    participant Livro as Livro
    participant DB as Database
    
    C->>R: Request
    R->>+LivroController: catalogoAluno()
    Note over LivroController: Process request
    alt Uses database
      LivroController->>+Livro: operation()
      Livro->>+DB: Database query
      DB-->>-Livro: Return data
      Livro-->>-LivroController: Return result
    else Direct response
      Note over LivroController: Process without database
    end
    LivroController-->>-R: Return response
    R-->>C: Response
    
    Note over LivroController: Generic operation flow
  