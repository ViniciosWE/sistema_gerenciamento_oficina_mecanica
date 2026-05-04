<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    use HasFactory;

    protected $fillable = [
        'cliente_id',
        'veiculo_id',
        'user_id',
        'status',
        'observacoes',
        'valor_total',
    ];

    // relação com Cliente
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // relação com Veículo
    public function veiculo()
    {
        return $this->belongsTo(Veiculo::class);
    }

    // relação com User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // relação com Serviços
    public function servicos()
    {
        return $this->belongsToMany(Servico::class, 'ordem_servico_servico')
            ->withPivot('preco')
            ->withTimestamps();
    }

    // relação com Peças
    public function pecas()
    {
        return $this->belongsToMany(Peca::class, 'ordem_servico_peca')
            ->withPivot('quantidade', 'preco_unitario')
            ->withTimestamps();
    }
}
