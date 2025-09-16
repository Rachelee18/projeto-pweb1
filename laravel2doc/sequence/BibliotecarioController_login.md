sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant BibliotecarioController as BibliotecarioController
    participant Bibliotecario as Bibliotecario
    participant DB as Database
    
    C->>R: Request
    R->>+BibliotecarioController: login()
    Note over BibliotecarioController: Process request
    alt Uses database
      BibliotecarioController->>+Bibliotecario: operation()
      Bibliotecario->>+DB: Database query
      DB-->>-Bibliotecario: Return data
      Bibliotecario-->>-BibliotecarioController: Return result
    else Direct response
      Note over BibliotecarioController: Process without database
    end
    BibliotecarioController-->>-R: Return response
    R-->>C: Response
    
    Note over BibliotecarioController: Generic operation flow
  