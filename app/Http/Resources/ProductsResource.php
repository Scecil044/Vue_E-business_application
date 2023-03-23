<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
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
            'title'=>$this->title,
            'image'=>$this->image,
            'slug'=>$this->slug,
            'name'=> $this->name,
            'description'=> $this->description,
            'price'=>$this->price,
            'created_at'=>(new \DateTime($this->created_at))->format('Y-m-d H:i-s'),
            'updated_at'=>(new \DateTime($this->updated_at))->format('Y-m-d H:i-s')

        ];
    }
}
