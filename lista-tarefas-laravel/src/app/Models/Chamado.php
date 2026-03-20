<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Chamado extends Model
{
    protected $fillable = [
        'titulo', 'descricao', 'prioridade', 'status', 
        'data_abertura', 'tecnico_id', 'categoria_id'
    ];

    protected $casts = [
        'data_abertura' => 'date',
    ];

    public function tecnico() {
        return $this->belongsTo(Tecnico::class);
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

    // Regra de Negócio: Verifica se o SLA estourou
    public function getSlaEstouradoAttribute()
    {
        if (in_array($this->status, ['resolvido', 'fechado'])) {
        return false;
    }

    // teste para corrigir problema do sistema considerar o SLA estourado
       if (!$this->categoria || !$this->categoria->sla_horas) {
        return false;
    }

    // Use o parse garantindo que o Carbon entenda o fuso horário da aplicação
    $prazoFinal = $this->created_at->addHours($this->categoria->sla_horas);

    return now()->greaterThan($prazoFinal);

    }

}