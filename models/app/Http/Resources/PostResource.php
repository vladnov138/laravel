<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'author_id' => $this->user_id,
            'title' => $this->title,
            'content' => $this->content,
            'deleted_at' => $this->deleted_at,
            'created_at' => $this->created_at
        ];
    }
}