<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OwnLeadsToCaller extends Model
{
    use HasFactory;

     protected $table="own_leads_to_callers";
     protected $fillable=[

        "cus_m_tb_cus_id",
        "assigned_to_leader"
     ];
}
