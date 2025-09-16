sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant EmprestimoController as EmprestimoController
    participant Emprestimo as Emprestimo
    participant DB as Database
    
    C->>R: Request
    R->>+EmprestimoController: meusEmprestimos()
    Note over EmprestimoController: Process request
    alt Uses database
      EmprestimoController->>+Emprestimo: operation()
      Emprestimo->>+DB: Database query
      DB-->>-Emprestimo: Return data
      Emprestimo-->>-EmprestimoController: Return result
    else Direct response
      Note over EmprestimoController: Process without database
    end
    EmprestimoController-->>-R: Return response
    R-->>C: Response
    
    Note over EmprestimoController: Generic operation flow
  