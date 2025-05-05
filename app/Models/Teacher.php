<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id', 'madrasah_id', 'subject', 'designation',
        'join_date', 'gender', 'nid_number', 'photo',
        'leave_balance', 'remarks', 'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function madrasah()
    {
        return $this->belongsTo(Madrasah::class);
    }
}
