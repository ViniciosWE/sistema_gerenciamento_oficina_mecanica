<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peca extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'descricao',
        'preco',
        'quantidade_estoque',
    ];

    // relação com Ordens de Serviço Peça 
    public function ordensServico()
    {
        return $this->belongsToMany(OrdemServico::class, 'ordem_servico_peca')
            ->withPivot('quantidade', 'preco_unitario')
            ->withTimestamps();
    }
}
