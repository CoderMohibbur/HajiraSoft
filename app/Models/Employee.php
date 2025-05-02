<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
   // app/Models/Employee.php

protected $fillable = [
    'name',
    'email',
    'phone',
    'designation',
];

}
