<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OfferPdf extends Model
{
    use HasFactory;
     protected $table='offer_pdfs';

     protected $fillable=[
         "pdf_of_enq",
         "pdf_of_cus",
         "pdf_name",
        ];
}
