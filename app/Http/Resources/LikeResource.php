<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LikeResource extends JsonResource
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
            'id'=> (string)$this->id,
            'like_unlike'=>$this->like_unlike,
            'liker_id'=>$this->liker_id,
            'post_id'=>$this->post_id,
            'poster_id'=>$this->poster_id,
            'created_at'=>$this->created_at
        ];
    }
}
