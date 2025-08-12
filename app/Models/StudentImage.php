<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StudentImage extends Model
{
    protected $fillable = [
        'student_mul_image',
        'student_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}
