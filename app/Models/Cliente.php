<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "clientes";
    protected $fillable = [
        "nome", 
        "senha", 
        "email",
        "telefone",
        "cadastrado",
        "alterado" 
    ];
    public $timestamps = false;

    public function veiculos()
    {
        return $this->hasMany(Veiculo::class, 'id_cliente');
    }
}
