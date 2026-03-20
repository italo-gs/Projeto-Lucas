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

        $prazoFinal = Carbon::parse($this->data_abertura)->addHours($this->categoria->sla_horas);

        if (now()->greaterThan($prazoFinal)) {
            return true;
        }

        return false;
    }
}