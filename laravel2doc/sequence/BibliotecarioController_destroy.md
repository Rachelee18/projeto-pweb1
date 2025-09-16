sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant BibliotecarioController as BibliotecarioController
    participant Livro as Livro
    participant DB as Database
    
    C->>R: DELETE /resource/{id}
    R->>+BibliotecarioController: destroy(id)
    BibliotecarioController->>+Livro: find(id)
    Livro->>+DB: SELECT * FROM table WHERE id = ?
    DB-->>-Livro: Return record
    Livro-->>-BibliotecarioController: Model instance
    BibliotecarioController->>+Livro: delete()
    Livro->>+DB: DELETE FROM table WHERE id = ?
    DB-->>-Livro: Success
    Livro-->>-BibliotecarioController: Success
    BibliotecarioController-->>-R: Return JSON response
    R-->>C: 204 No Content
    
    Note over BibliotecarioController,Livro: This sequence removes a resource
  