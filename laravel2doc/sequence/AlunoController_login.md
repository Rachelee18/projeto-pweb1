sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant AlunoController as AlunoController
    participant Aluno as Aluno
    participant DB as Database
    
    C->>R: Request
    R->>+AlunoController: login()
    Note over AlunoController: Process request
    alt Uses database
      AlunoController->>+Aluno: operation()
      Aluno->>+DB: Database query
      DB-->>-Aluno: Return data
      Aluno-->>-AlunoController: Return result
    else Direct response
      Note over AlunoController: Process without database
    end
    AlunoController-->>-R: Return response
    R-->>C: Response
    
    Note over AlunoController: Generic operation flow
  