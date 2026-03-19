<div class="row">
    <div class="col-md-8 mb-3">
        <label class="form-label">Título do Chamado</label>
        <input type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{ old('titulo', $chamado->titulo ?? '') }}" required>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label">Data de Abertura</label>
        <input type="date" class="form-control @error('data_abertura') is-invalid @enderror" name="data_abertura" value="{{ old('data_abertura', isset($chamado) ? $chamado->data_abertura->format('Y-m-d') : date('Y-m-d')) }}" required>
    </div>
</div>

<div class="mb-3">
    <label class="form-label">Descrição do Problema</label>
    <textarea class="form-control @error('descricao') is-invalid @enderror" name="descricao" rows="4" required>{{ old('descricao', $chamado->descricao ?? '') }}</textarea>
</div>

<div class="row">
    <div class="col-md-3 mb-3">
        <label class="form-label">Prioridade</label>
        <select name="prioridade" class="form-select @error('prioridade') is-invalid @enderror" required>
            <option value="baixa" {{ old('prioridade', $chamado->prioridade ?? '') == 'baixa' ? 'selected' : '' }}>Baixa</option>
            <option value="média" {{ old('prioridade', $chamado->prioridade ?? '') == 'média' ? 'selected' : '' }}>Média</option>
            <option value="alta" {{ old('prioridade', $chamado->prioridade ?? '') == 'alta' ? 'selected' : '' }}>Alta</option>
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Status</label>
        <select name="status" class="form-select @error('status') is-invalid @enderror" required>
            <option value="aberto" {{ old('status', $chamado->status ?? '') == 'aberto' ? 'selected' : '' }}>Aberto</option>
            <option value="em_atendimento" {{ old('status', $chamado->status ?? '') == 'em_atendimento' ? 'selected' : '' }}>Em Atendimento</option>
            <option value="resolvido" {{ old('status', $chamado->status ?? '') == 'resolvido' ? 'selected' : '' }}>Resolvido</option>
            <option value="fechado" {{ old('status', $chamado->status ?? '') == 'fechado' ? 'selected' : '' }}>Fechado</option>
        </select>
        @error('status') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Categoria</label>
        <select name="categoria_id" class="form-select @error('categoria_id') is-invalid @enderror" required>
            <option value="">Selecione...</option>
            @foreach($categorias as $cat)
                <option value="{{ $cat->id }}" {{ old('categoria_id', $chamado->categoria_id ?? '') == $cat->id ? 'selected' : '' }}>{{ $cat->nome }} ({{ $cat->sla_horas }}h)</option>
            @endforeach
        </select>
    </div>

    <div class="col-md-3 mb-3">
        <label class="form-label">Técnico Responsável</label>
        <select name="tecnico_id" class="form-select @error('tecnico_id') is-invalid @enderror" required>
            <option value="">Selecione...</option>
            @foreach($tecnicos as $tec)
                <option value="{{ $tec->id }}" {{ old('tecnico_id', $chamado->tecnico_id ?? '') == $tec->id ? 'selected' : '' }}>{{ $tec->nome }}</option>
            @endforeach
        </select>
    </div>
</div>