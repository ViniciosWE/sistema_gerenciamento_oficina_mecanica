<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'marca',
        'modelo',
        'placa',
        'ano',
    ];

    // relação com Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // relação com Ordens de Serviço
    public function ordensServico()
    {
        return $this->hasMany(OrdemServico::class);
    }
}
