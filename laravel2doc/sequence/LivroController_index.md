sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant LivroController as LivroController
    participant Livro as Livro
    participant DB as Database
    
    C->>R: GET /resource
    R->>+LivroController: index()
    LivroController->>+Livro: all() / get() / paginate()
    Livro->>+DB: SELECT * FROM table
    DB-->>-Livro: Return records
    Livro-->>-LivroController: Collection of models
    LivroController-->>-R: Return JSON response
    R-->>C: 200 OK with data
    
    Note over LivroController,Livro: This sequence retrieves a list of resources
  