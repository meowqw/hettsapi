<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Http\Resources\Color\ColorResource;
use App\Http\Resources\Size\SizeResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'title' => $this->title,
            'price' => $this->price,
            'image' => $this->image,
            'color' => new ColorResource($this->color),
            'size' => new SizeResource($this->size),
            'category' => new CategoryResource($this->category),
            'description' => $this->description,
            'characteristics' => $this->characteristics
        ];
    }
}
