<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemServicoPeca extends Model
{
    use HasFactory;

    protected $table = 'ordem_servico_peca';

    protected $fillable = [
        'ordem_servico_id',
        'peca_id',
        'quantidade',
        'preco_unitario',
    ];

    public function ordemServico()
    {
        return $this->belongsTo(OrdemServico::class);
    }

    public function peca()
    {
        return $this->belongsTo(Peca::class);
    }
}
