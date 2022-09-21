<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'user_id', 'address', 'email', 'website', 'phone_number'];

    public function staff(){
        return $this->hasMany(Staff::class);
    }

}
