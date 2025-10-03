@extends('app')

@section('title', 'Escolher Perfil')

@section('content')
<div class="role-container">
    <h2 class="title">Escolha como deseja acessar o BibWeb</h2>
    <div class="role-options">
        <a href="{{ route('login.aluno') }}" class="role-card student">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="48" height="48">
                    <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 
                        2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 
                        5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                </svg>
            </div>
            <p>Aluno</p>
        </a>

        <a href="{{ route('login.bibliotecario') }}" class="role-card librarian">
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" fill="white" viewBox="0 0 24 24" width="48" height="48">
                    <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 
                        2.3-5 5 2.3 5 5 5zm0 2c-3.3 0-10 1.7-10 
                        5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                </svg>
            </div>
            <p>Bibliotecário</p>
        </a>
    </div>
</div>
@endsection