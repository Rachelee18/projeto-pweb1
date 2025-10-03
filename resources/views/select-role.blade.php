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
            <p>Estudante</p>
        </a>

        <a href="{{ route('login.bibliotecario') }}" class="role-card librarian">
            <div class="icon">
                <svg class="w-12 h-12 text-gray-800 dark:text-white" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg"
                    width="128" height="128"
                    fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                        d="M12.1429 11v9m0-9c-2.50543-.7107-3.19099-1.39543-6.13657-1.34968-.48057.00746-.86348.38718-.86348.84968v7.2884c0 .4824.41455.8682.91584.8617 2.77491-.0362 3.45995.6561 6.08421 1.3499m0-9c2.5053-.7107 3.1067-1.39542 6.0523-1.34968.4806.00746.9477.38718.9477.84968v7.2884c0 .4824-.4988.8682-1 .8617-2.775-.0362-3.3758.6561-6 1.3499m2-14c0 1.10457-.8955 2-2 2-1.1046 0-2-.89543-2-2s.8954-2 2-2c1.1045 0 2 .89543 2 2Z"/>
                </svg>


            </div>
            <p>Biblioteca</p>
        </a>
    </div>
</div>
@endsection