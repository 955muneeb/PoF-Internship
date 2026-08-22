<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Added 'profile_picture' here so we are fully ready for Day 14 File Uploads!
    protected $fillable = ['name', 'email', 'phone', 'course_id', 'profile_picture'];

    // The relationship linking back to the Course model
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
