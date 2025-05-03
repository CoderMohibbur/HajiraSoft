<?php

// app/Models/Upazila.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    protected $fillable = ['name', 'district_id', 'slug', 'code', 'is_active'];

    public function district()
    {
        return $this->belongsTo(District::class);
    }
}
