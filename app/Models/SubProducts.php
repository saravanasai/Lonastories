<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubProducts extends Model
{
    use HasFactory;


    protected $fillable=[
        "subproductname",
        "product_id"
    ];

    protected $table="subproducts";

    public function subproductof()
    {
        return $this->belongsTo(Products::class,'product_id');
    }


}
