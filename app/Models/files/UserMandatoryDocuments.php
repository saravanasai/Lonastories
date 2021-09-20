<?php

namespace App\Models\files;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMandatoryDocuments extends Model
{
    use HasFactory;
    protected $table="user_mandatory_documents";

    protected $fillable=[
        "doc_of_user",
        "Pan_card",
        "Adhar_card",
        "mandatory_doc_status",
    ];
}
