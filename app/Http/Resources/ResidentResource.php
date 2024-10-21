<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ResidentResource extends JsonResource
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
            'nik' => $this->nik,
            'name' => $this->name,
            'image' => "http://127.0.0.1:8000/storage/" . $this->image_path,
            'gender' => $this->gender,
            'birthdate' => $this->birthdate,
            'address' => $this->address,
            'religion' => $this->religion,
            'profession' => $this->profession,
        ];
    }
}
