<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'full_name' => $this->name,       // Renamed from 'name'
            'contact_email' => $this->email,  // Renamed from 'email'
            'phone_number' => $this->phone ?? 'N/A', // Added a default if null
            'enrolled_course' => $this->course,

            // Notice: We completely omitted created_at and updated_at!
        ];
    }
}
