sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant EmprestimoController as EmprestimoController
    participant V as Validator
    participant Emprestimo as Emprestimo
    participant DB as Database
    
    C->>R: POST /resource
    R->>+EmprestimoController: store(request)
    EmprestimoController->>+V: validate(request)
    V-->>-EmprestimoController: validated data
    EmprestimoController->>+Emprestimo: create(data)
    Emprestimo->>+DB: INSERT INTO table
    DB-->>-Emprestimo: Return new record
    Emprestimo-->>-EmprestimoController: New model instance
    EmprestimoController-->>-R: Return JSON response
    R-->>C: 201 Created with data
    
    Note over EmprestimoController,Emprestimo: This sequence creates a new resource
  