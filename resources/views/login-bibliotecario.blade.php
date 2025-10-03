@extends('app')

@section('title', 'Login do Bibliotecário')

@section('content')
<div class="login-container">
    <div class="login-box">
        <h2 class="title librarian-title">Acesso da Biblioteca</h2>
        <p class="text-xs text-gray-600 mb-10">
            Bibliotecários e funcionários apenas. 
        </p>

        @if($errors->any())
            <div class="error-box">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.bibliotecario.submit') }}" method="POST" class="login-form">
            @csrf
            <div class="input-group">
                <input type="email" name="email" placeholder="Email institucional" required>
            </div>
            <div class="input-group">
                <input type="password" name="senha" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn librarian-btn">Entrar</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
    @vite(['resources/css/login-biblioteca.css'])
@endpush
