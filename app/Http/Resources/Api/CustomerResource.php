<?php

namespace App\Http\Resources\Api;

use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "name" => $this->name,
            "phonenumber" => $this->cus_phonenumber,
            "email" => $this->email,
            "dob" => $this->dob,
            "refered_by" => $this->refered_by,
            "promoCode" => $this->PromoCode,
            "SchoolBuddy_FormStatus" => $this->School_Buddy,
            "CollegeMate_FormStatus" => $this->College_Mate,
            "Colleague_FormStatus" => $this->Colleague,
            "Brother_FormStatus" => $this->Brother,
            "Sister_FormStatus" => $this->Sister,
            "Neighbour_FormStatus" => $this->Neighbour,
            "Boss_FormStatus" => $this->Boss,
            "Landlord_FormStatus" => $this->Landlord,
            "ApartmentSecretary_FormStatus" => $this->Apartment_Secretary,
            "cus_referal_code" => $this->cus_referal_code,
            "cus_referal_code" => $this->cus_referal_code,
            "user_profile_img_status" => $this->user_profile_img_status,
            "user_profile_img" => url('/') . "/userprofile/" . $this->user_profile_img,
            "pr_form_status" => $this->pr_form_status,
            "customer_one_view_status" => $this->customer_one_view_status,
            "Wallet_info" => $this->wallet,
        ];
    }
}
