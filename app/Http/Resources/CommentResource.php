<?php

namespace App\Http\Resources;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     * @throws Exception
     */
    public function toArray($request): array
    {
        return [
            "id" => $this->id,
            "parent_id" => $this->parent_id ?? 0,
            "body" => $this->body,
            "username" => $this->username,
            "created_at" => (new \DateTime($this->created_at))->format("Y-m-d H:i:s"),
            "updated_at" => (new \DateTime($this->updated_at))->format("Y-m-d H:i:s"),
            "replies" => CommentResource::collection($this->whenLoaded('replies')),
        ];
    }
}
