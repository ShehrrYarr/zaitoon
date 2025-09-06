<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MobileResource extends JsonResource
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
            'id'              => $this->id,
            'added_at'        => $this->created_at,
            'mobile_name'     => $this->mobile_name_id ? ($this->mobileName->name ?? $this->mobile_name) : $this->mobile_name,
            'company'         => $this->company->name ?? null,
            'group'           => $this->group->name ?? null,
            'imei_number'     => $this->imei_number,
            'sim_lock'        => $this->sim_lock,
            'color'           => $this->color,
            'storage'         => $this->storage,
            // prices
            // 'cost_price' is intentionally omitted
            'selling_price'   => $this->selling_price,
            // battery info
            'battery_health'  => $this->battery_health,
            'battery_cycle'   => $this->battery_cycle,
            // misc
            'description'     => $this->description,
            'availability'    => $this->availability,
            'is_transfer'     => (bool) $this->is_transfer,
            'is_approve'      => $this->is_approve,
            'sold_at'         => $this->sold_at ,
            // owner info (IDs only to keep it light)
            'user_id'         => $this->user_id,
            'original_owner_id' => $this->original_owner_id,
        ];
    
    }
}
