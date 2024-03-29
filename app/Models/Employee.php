<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'employeeIdentifier', 'phoneNumber'];

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }
}
