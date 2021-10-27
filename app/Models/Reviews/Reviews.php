<?php

namespace App\Models\Reviews;

use App\Models\CustomerSignup;
use App\Models\Reviews\Reply;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;

    protected $table="reviews";

    protected $fillables=[
        "review_of_cus",
        "comment",
        "rating",
        "aproval_status",
        "delete_status",
    ];



    public function reviewOfCustomer()
    {
        return $this->belongsTo(CustomerSignup::class,'review_of_cus','id');
    }

    public function reply()
    {
        return $this->hasOne(Reply::class,'reply_to_review','id');
    }
}
