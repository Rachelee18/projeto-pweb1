sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant BibliotecarioController as BibliotecarioController
    participant V as Validator
    participant Livro as Livro
    participant DB as Database
    
    C->>R: PUT /resource/{id}
    R->>+BibliotecarioController: update(request, id)
    BibliotecarioController->>+V: validate(request)
    V-->>-BibliotecarioController: validated data
    BibliotecarioController->>+Livro: find(id)
    Livro->>+DB: SELECT * FROM table WHERE id = ?
    DB-->>-Livro: Return record
    Livro-->>-BibliotecarioController: Model instance
    BibliotecarioController->>+Livro: update(data)
    Livro->>+DB: UPDATE table SET ... WHERE id = ?
    DB-->>-Livro: Success
    Livro-->>-BibliotecarioController: Updated model
    BibliotecarioController-->>-R: Return JSON response
    R-->>C: 200 OK with data
    
    Note over BibliotecarioController,Livro: This sequence updates an existing resource
  