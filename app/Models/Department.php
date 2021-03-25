<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function path() {
        return route('department.show', $this);
    }

    public function employee() {
        return $this->hasMany(Employee::class);
    }

    public function getEmployeeCount(){
        return $this->employee()->count();
    }
}
