<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
    ];

    // relação com Ordens de Serviço Serviço 
    public function ordensServico()
    {
        return $this->belongsToMany(OrdemServico::class, 'ordem_servico_servico')
            ->withPivot('preco')
            ->withTimestamps();
    }
}
