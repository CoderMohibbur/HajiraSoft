<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Madrasah extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'eiin',
        'institute_code',
        'type',
        'district_id',
        'upazila_id',
        'phone',
        'email',
        'established_at',
        'logo',
        'status',
        'created_by',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
