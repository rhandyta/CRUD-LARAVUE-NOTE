<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NoteResouce extends JsonResource
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
            'slug' => $this->slug,
            'subject' => $this->subject->name,
            'subjectId' => $this->subject->id,
            'description' => $this->description,
            'published' => $this->created_at->format('d F, Y'),
            'link' => route('notes.show', $this->slug),
        ];
    }
}
