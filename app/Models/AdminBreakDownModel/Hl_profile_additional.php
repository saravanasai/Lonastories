<?php

namespace App\Models\AdminBreakDownModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hl_profile_additional extends Model
{
    use HasFactory;

    protected $table="hl_profile_additionals";
    protected $fillable=[
        "hl_to_enquiery",
        "hl_of_cus",
        "hl_age",
        "hl_property_type",
        "hl_builder_name",
        "hl_property_value",
        "hl_property_area",
        "hl_property_city",
        "hl_gross_salary",
        "hl_net_salary",
        "hl_co_joint",
    ];
}
