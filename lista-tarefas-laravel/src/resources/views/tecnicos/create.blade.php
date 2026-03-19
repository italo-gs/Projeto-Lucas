@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Novo Técnico</h2>
    <a href="{{ route('tecnicos.index') }}" class="btn btn-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('tecnicos.store') }}" method="POST">
            @csrf 
            
            @include('tecnicos._form')

            <button type="submit" class="btn btn-success mt-3">Salvar Técnico</button>
        </form>
    </div>
</div>
@endsection