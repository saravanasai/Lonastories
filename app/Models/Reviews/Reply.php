<?php

namespace App\Models\Reviews;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $table="replies";

    protected $fillable=[
        "reply_to_review",
        "reply_message"
    ];
}
