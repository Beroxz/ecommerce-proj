<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class SellerListResource extends JsonResource
{
    public static $wrap = false;

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->user_id,
            'hostSeller_name' => $this->hostSeller_name,
            'hostSeller_last_name' => $this->hostSeller_last_name,
            'store_name' => $this->store_name,
            'store_phone' => $this->store_phone,
            'store_description' => $this->store_description,
            'store_address' => $this->store_address,
            'store_rating' => $this->store_rating,
            'status' => $this->status,
            'store_image_url' => $this->store_image
                ? URL::to(Storage::url($this->store_image))
                : null,
            'store_image_mime' => $this->store_image_mime,
            'store_image_size' => $this->store_image_size,
            'created_by' => $this->creator ? $this->creator->name : null,
            'updated_by' => $this->updater ? $this->updater->name : null,
            'created_at' => (new \DateTime($this->created_at))->format('Y-m-d H:i:s'),
            'updated_at' => (new \DateTime($this->updated_at))->format('Y-m-d H:i:s'),
        ];
    }
}
