<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            // 'message'=>'Post Added Successful',
            // 'data' => [
                'id'=> (string)$this->id,
                'post_text'=>$this->post_text,
                'post_image'=>$this->post_image,
                'userid'=>(string)$this->userid,
                'created_at'=>$this->created_at
            // ]
        ];
    }
}
