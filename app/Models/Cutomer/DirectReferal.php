<?php

namespace App\Models\Cutomer;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DirectReferal extends Model
{
    use HasFactory;
    protected $table="direct_referals";

    protected $fillable=[
        "direct_ref_of_user",
        "refered_cus_name",
        "refered_cus_phonenumber",
        "refered_cus_relationship",
        "refered_url",
        "refered_verification",
        "s_del_dir_ref",
    ];
}
