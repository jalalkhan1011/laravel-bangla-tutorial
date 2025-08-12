<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    protected $fillable = ['student_name', 'student_image', 'parent_image', 'slug', 'student_email', 'student_address'];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $student->slug = Str::slug($student->student_name, '-') . '-' . uniqid();
        });

        static::updating(function ($student) {
            $student->slug = Str::slug($student->student_name, '-') . '-' . uniqid();
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
