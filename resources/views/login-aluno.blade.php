@extends('app')

@section('title', 'Login do Aluno')

@section('content')
<div class="login-container">
    <div class="login-box">
        <h2 class="title">Acesso do Estudante</h2>

        @if($errors->any())
            <div class="error-box">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('login.aluno.submit') }}" method="POST" class="login-form">
            @csrf
            <div class="input-group">
                <input type="email" name="email" placeholder="Email institucional" required>
            </div>
            <div class="input-group">
                <input type="password" name="senha" placeholder="Senha" required>
            </div>
            <button type="submit" class="btn">Entrar</button>
        </form>
    </div>
</div>
@endsection

@push('styles')
    @vite(["resources/css/login.css"])
@endpush