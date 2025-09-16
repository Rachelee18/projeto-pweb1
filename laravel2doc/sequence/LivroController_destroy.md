sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant LivroController as LivroController
    participant Livro as Livro
    participant DB as Database
    
    C->>R: DELETE /resource/{id}
    R->>+LivroController: destroy(id)
    LivroController->>+Livro: find(id)
    Livro->>+DB: SELECT * FROM table WHERE id = ?
    DB-->>-Livro: Return record
    Livro-->>-LivroController: Model instance
    LivroController->>+Livro: delete()
    Livro->>+DB: DELETE FROM table WHERE id = ?
    DB-->>-Livro: Success
    Livro-->>-LivroController: Success
    LivroController-->>-R: Return JSON response
    R-->>C: 204 No Content
    
    Note over LivroController,Livro: This sequence removes a resource
  