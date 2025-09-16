sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant BibliotecarioController as BibliotecarioController
    participant Livro as Livro
    participant DB as Database
    
    C->>R: Request
    R->>+BibliotecarioController: mostrarDeletar()
    Note over BibliotecarioController: Process request
    alt Uses database
      BibliotecarioController->>+Livro: operation()
      Livro->>+DB: Database query
      DB-->>-Livro: Return data
      Livro-->>-BibliotecarioController: Return result
    else Direct response
      Note over BibliotecarioController: Process without database
    end
    BibliotecarioController-->>-R: Return response
    R-->>C: Response
    
    Note over BibliotecarioController: Generic operation flow
  