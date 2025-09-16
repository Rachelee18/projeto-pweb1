sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant EmprestimoController as EmprestimoController
    participant Emprestimo as Emprestimo
    participant DB as Database
    
    C->>R: GET /resource
    R->>+EmprestimoController: index()
    EmprestimoController->>+Emprestimo: all() / get() / paginate()
    Emprestimo->>+DB: SELECT * FROM table
    DB-->>-Emprestimo: Return records
    Emprestimo-->>-EmprestimoController: Collection of models
    EmprestimoController-->>-R: Return JSON response
    R-->>C: 200 OK with data
    
    Note over EmprestimoController,Emprestimo: This sequence retrieves a list of resources
  