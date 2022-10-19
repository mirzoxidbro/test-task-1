<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    use HasFactory;
    
    protected $fillable = ['passport', 'surname', 'name', 'father_name', 'position', 'phone_number', 'address', 'company_id'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

}
