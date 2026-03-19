<div class="mb-3">
    <label for="nome" class="form-label">Nome do Problema (Categoria)</label>
    <input type="text" class="form-control @error('nome') is-invalid @enderror" id="nome" name="nome" value="{{ old('nome', $categoria->nome ?? '') }}" required>
    @error('nome')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="sla_horas" class="form-label">SLA (Prazo estimado em horas)</label>
    <input type="number" class="form-control @error('sla_horas') is-invalid @enderror" id="sla_horas" name="sla_horas" value="{{ old('sla_horas', $categoria->sla_horas ?? '') }}" required min="1">
    @error('sla_horas')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>