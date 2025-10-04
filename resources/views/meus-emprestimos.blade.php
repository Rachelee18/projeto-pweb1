@extends('app')

@section('title', 'Meus Empréstimos')

@section('content')
<div class="emprestimos-container">
    <h2 class="section-title">Meus Empréstimos</h2>

    @if($emprestimos->isEmpty())
        <p class="no-loans">Você não possui empréstimos ativos.</p>
    @else
        <div class="loan-list">
            @foreach($emprestimos as $emp)
                <div class="loan-card">
                    <img src="{{ $emp->livro->capa_url ?? asset('images/sem-capa.png') }}" alt="Capa do livro">
                    <div class="loan-info">
                        <h4>{{ $emp->livro->titulo }}</h4>
                        <p class="autor">{{ $emp->livro->autor }}</p>
                        <p><strong>Empréstimo:</strong> {{ \Carbon\Carbon::parse($emp->data_emprestimo)->format('d/m/Y') }}</p>
                        <p><strong>Devolução:</strong> 
                            @if($emp->data_devolucao)
                                {{ \Carbon\Carbon::parse($emp->data_devolucao)->format('d/m/Y') }}
                            @else
                                -
                            @endif
                        </p>
                        <p><strong>Status:</strong> 
                            <span class="status {{ strtolower($emp->status) }}">
                                {{ ucfirst($emp->status) }}
                            </span>
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection

@push('styles')
    @vite(['resources/css/meus-emprestimos.css'])
@endpush
