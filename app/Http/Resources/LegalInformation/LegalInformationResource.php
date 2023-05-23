<?php

namespace App\Http\Resources\LegalInformation;

use Illuminate\Http\Resources\Json\JsonResource;

class LegalInformationResource extends JsonResource
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
            'company_name' => $this->company_name,
            'company_address' => $this->company_address,
            'ogrn'  => $this->ogrn,
            'inn'  => $this->inn,
            'kpp'  => $this->kpp,
            'payment_account'  => $this->payment_account,
            'correspondent_account'  => $this->correspondent_account,
            'bic'  => $this->bic,
            'bank'  => $this->bank,
            'ceo'  => $this->ceo
        ];
    }
}
