<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Enums\SellerStatus;

class SellerResource extends JsonResource
{
    public static $wrap = false;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->user_id,
            'seller_name' => $this->seller_name,
            'store_name' => $this->store_name,
            'store_phone' => $this->store_phone,
            'store_description' => $this->store_description,
            'store_address' => $this->store_address,
            'store_rating' => $this->store_rating,
            'status' => $this->status === SellerStatus::Active->value,
            'store_image' => $this->store_image,
            'store_image_mime' => $this->store_image_mime,
            'store_image_size' => $this->store_image_size,
            'created_by' => $this->created_by,
            'updated_by' => $this->updated_by,
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s'),
        ];
    }
}
