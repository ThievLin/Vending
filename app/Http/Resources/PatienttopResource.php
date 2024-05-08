<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PatienttopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'count same slot' => $this->total_count_same_slot,
            'Product Name' => $this->p_name,
            'Top Number' => $this->number_top,
        ];
    }
}
