<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class caller extends Model
{
    use HasFactory;

    protected $table="telecaller";


    protected $fillable=[

        "firstname",
        "lastname",
        "phonenumber",
        "power",
        "adharnumber",
        "password",
        "status"

    ];


    public function telecallerenquiery()
    {
        return $this->hasMany(TeleCallerEnquiery::class,'telecaller_id','id');
    }


}
