<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'endereco',
    ];

    //relação com veículos
    public function veiculos()
    {
        return $this->hasMany(Veiculo::class);
    }

    //relação com ordens de serviço
    public function ordensServico()
    {
        return $this->hasMany(OrdemServico::class);
    }
}
