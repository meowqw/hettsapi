<?php

namespace App\Http\Resources\PersonalInformation;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonalInformationResource extends JsonResource
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
            'surname' => $this->surname,
            'name' => $this->name,
            'middle_name' => $this->middle_name,
            'phone' => $this->phone,
            'email' => $this->email,
            'city' => $this->city,
            'region' => $this->region,
            'country' => $this->country,
            'delivery_company' => $this->delivery_company,
            'type_shop' => $this->type_shop
        ];
    }
}
