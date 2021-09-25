<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable=["productname"];

    public function sub_products(){
        return $this->hasMany(SubProducts::class,'product_id','id');
   }

}
