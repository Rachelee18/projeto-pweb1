sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant LivroController as LivroController
    participant V as Validator
    participant Livro as Livro
    participant DB as Database
    
    C->>R: PUT /resource/{id}
    R->>+LivroController: update(request, id)
    LivroController->>+V: validate(request)
    V-->>-LivroController: validated data
    LivroController->>+Livro: find(id)
    Livro->>+DB: SELECT * FROM table WHERE id = ?
    DB-->>-Livro: Return record
    Livro-->>-LivroController: Model instance
    LivroController->>+Livro: update(data)
    Livro->>+DB: UPDATE table SET ... WHERE id = ?
    DB-->>-Livro: Success
    Livro-->>-LivroController: Updated model
    LivroController-->>-R: Return JSON response
    R-->>C: 200 OK with data
    
    Note over LivroController,Livro: This sequence updates an existing resource
  