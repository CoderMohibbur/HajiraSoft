<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'madrasah_id',
        'date',
        'status',
        'remarks',
        'device',
        'location',
        'verified_by',
        'is_verified',
        'created_by',
    ];

    protected $dates = ['date'];

    // 🔹 Relationships
    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function madrasah()
    {
        return $this->belongsTo(Madrasah::class);
    }

    public function verifiedBy()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // 🔹 Scopes
    public function scopeForDate($query, $date)
    {
        return $query->whereDate('date', $date);
    }

    public function scopeForTeacher($query, $teacherId)
    {
        return $query->where('teacher_id', $teacherId);
    }

    public function scopeForMadrasah($query, $madrasahId)
    {
        return $query->where('madrasah_id', $madrasahId);
    }
}
