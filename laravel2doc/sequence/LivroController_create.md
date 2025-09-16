sequenceDiagram
    autonumber
    participant C as Client
    participant R as Route
    participant LivroController as LivroController
    participant V as Validator
    participant Model as Model
    participant DB as Database
    
    C->>R: POST /resource
    R->>+LivroController: create(request)
    LivroController->>+V: validate(request)
    V-->>-LivroController: validated data
    LivroController->>+Model: create(data)
    Model->>+DB: INSERT INTO table
    DB-->>-Model: Return new record
    Model-->>-LivroController: New model instance
    LivroController-->>-R: Return JSON response
    R-->>C: 201 Created with data
    
    Note over LivroController,Model: This sequence creates a new resource
  