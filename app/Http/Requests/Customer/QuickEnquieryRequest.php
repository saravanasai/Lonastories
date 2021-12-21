<?php

namespace App\Http\Requests\Customer;

use Illuminate\Contracts\Session\Session;
use Illuminate\Foundation\Http\FormRequest;

class QuickEnquieryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return  true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "Product_intrested"=>"required|numeric",
            "Loan_Amount"=>"required|numeric",
            "Preferred_Bank_Name"=>"required|alpha",
            "City_Name"=>"required|alpha",
            "how_soon"=>"required",
            "enq_date"=>"required",
            "enq_time"=>"required",
            "mode_to_connect"=>"required",
        ];
    }
}
