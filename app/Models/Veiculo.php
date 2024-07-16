<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $table = "veiculos";
    protected $fillable = [
        "placa", 
        "modelo", 
        "cor",
        "id_cliente",
        "hora_entrada",
        "hora_saida" 
    ];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
