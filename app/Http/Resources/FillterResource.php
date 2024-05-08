<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FillterResource extends JsonResource
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
            'Date' => $this->date,
            'Product_total' => $this->total_count_same_slot,
            'Product_name'=>$this->p_name,
            'Price_Out'=>$this->price_out,
            'price_In'=>$this->price_in,
            'Sales_date'=>$this->date,
            'Total_salse'=>$this->total_count_same_slot,


        ];
    }
}