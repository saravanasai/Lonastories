<?php

namespace App\Models\Cutomer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeartsGive extends Model
{
    use HasFactory;
    protected $table="hearts_given";

    protected $fillable=[
        "hearts_to_user",
        "hearts_given",

    ];
}
