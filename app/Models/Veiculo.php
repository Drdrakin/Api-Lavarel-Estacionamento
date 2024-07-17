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
        "deletado",
        "hora_entrada",
        "hora_saida" 
    ];

    //Essa linha é necessário pois o laravel espera que de padrão as colunas created_at e updated_at existam, mas
    //nesse projeto como não foi usado migrations, o banco criado direto no MySQL Worbench não constou com esses campos
    public $timestamps = false;

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
