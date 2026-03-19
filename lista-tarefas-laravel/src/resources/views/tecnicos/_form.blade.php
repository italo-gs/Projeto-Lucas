<div class="mb-3">
    <label for="nome" class="form-label">Nome Completo</label>
    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $tecnico->nome ?? '') }}" required>
    @error('nome')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="email" class="form-label">E-mail</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $tecnico->email ?? '') }}" required>
    @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="especialidade" class="form-label">Especialidade (Ex: Redes, Hardware, Software)</label>
    <input type="text" class="form-control @error('especialidade') is-invalid @enderror" id="especialidade" name="especialidade" value="{{ old('especialidade', $tecnico->especialidade ?? '') }}" required>
    @error('especialidade')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>