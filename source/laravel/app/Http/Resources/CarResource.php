<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CarResource extends JsonResource
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
            'id' => $this->id,
            'brand' => $this->brand,
            'model' => $this->model,
            'color' => $this->color,
            'doors' => $this->doors,
            'year' => $this->year,
            'km' => $this->km,
            'price' => $this->price,
            'date_create' => Carbon::make($this->created_at)->format('Y-m-d H:i:s'),
        ];
    }
}
