<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    
    protected $dateFormat = 'Ymd H:i:s';
    protected $table = 'productos';
    //Relación uno a muchos

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    //muchos a muchos
    public function inventories(){
        return $this->belongsToMany('App\Models\Inventory');
    }

    public function statu(){
        return $this->belongsTo('App\Models\Statu');
    }
}
