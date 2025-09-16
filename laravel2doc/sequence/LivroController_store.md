sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant LivroController as LivroController
    participant V as Validator
    participant Livro as Livro
    participant DB as Database
    
    C->>R: POST /resource
    R->>+LivroController: store(request)
    LivroController->>+V: validate(request)
    V-->>-LivroController: validated data
    LivroController->>+Livro: create(data)
    Livro->>+DB: INSERT INTO table
    DB-->>-Livro: Return new record
    Livro-->>-LivroController: New model instance
    LivroController-->>-R: Return JSON response
    R-->>C: 201 Created with data
    
    Note over LivroController,Livro: This sequence creates a new resource
  