sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant AlunoController as AlunoController
    participant Model as Model
    participant DB as Database
    
    C->>R: Request
    R->>+AlunoController: showLoginForm()
    Note over AlunoController: Process request
    alt Uses database
      AlunoController->>+Model: operation()
      Model->>+DB: Database query
      DB-->>-Model: Return data
      Model-->>-AlunoController: Return result
    else Direct response
      Note over AlunoController: Process without database
    end
    AlunoController-->>-R: Return response
    R-->>C: Response
    
    Note over AlunoController: Generic operation flow
  