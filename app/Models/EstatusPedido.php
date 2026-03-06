<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EstatusPedido extends Model
{
    protected $table = 'estatus_pedidos';
    
    protected $primaryKey = 'id';

    protected $fillable = ['id','estatus'];


}
