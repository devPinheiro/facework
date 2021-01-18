<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MessageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $bool = $this->receiver_id === auth()->user()->chat_id;
        return [
            'id' => $this->id,
            'message' => $this->message,
            'created_at' => $this->created_at,
            'incoming' => $bool ? true : false,
            'sender' => $bool ? [
                'name' => $this->sender->name
            ] : null,
            'me' => auth()->user()->name
        ];
    }
}
