<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'comment_text'=>$this->like_unlike,
            'comment_image'=>$this->liker_id,
            'commenter_id'=>$this->post_id,
            'post_id'=>$this->poster_id,
            'poster_id'=>$this->poster_id,
            'created_at'=>$this->created_at
        ];
    }
}
