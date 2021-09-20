<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeleCallerEnquiery extends Model
{
    use HasFactory;

    protected $table="tele_caller_enquieries";
    protected $fillable=[
        "cus_id",
        "cus_first_name",
        "cus_last_name",
        "cus_Phone_number",
        "cus_email",
        "tl_table_assign_to",
        "Final_assign_after_more_info_telecaller_table"

    ];
}
