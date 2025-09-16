sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant BibliotecarioController as BibliotecarioController
    participant Model as Model
    participant DB as Database
    
    C->>R: Request
    R->>+BibliotecarioController: logout()
    Note over BibliotecarioController: Process request
    alt Uses database
      BibliotecarioController->>+Model: operation()
      Model->>+DB: Database query
      DB-->>-Model: Return data
      Model-->>-BibliotecarioController: Return result
    else Direct response
      Note over BibliotecarioController: Process without database
    end
    BibliotecarioController-->>-R: Return response
    R-->>C: Response
    
    Note over BibliotecarioController: Generic operation flow
  