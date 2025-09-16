sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant EmprestimoController as EmprestimoController
    participant V as Validator
    participant Aluno as Aluno
    participant DB as Database
    
    C->>R: POST /resource
    R->>+EmprestimoController: create(request)
    EmprestimoController->>+V: validate(request)
    V-->>-EmprestimoController: validated data
    EmprestimoController->>+Aluno: create(data)
    Aluno->>+DB: INSERT INTO table
    DB-->>-Aluno: Return new record
    Aluno-->>-EmprestimoController: New model instance
    EmprestimoController-->>-R: Return JSON response
    R-->>C: 201 Created with data
    
    Note over EmprestimoController,Aluno: This sequence creates a new resource
  