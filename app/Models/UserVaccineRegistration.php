<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVaccineRegistration extends Model
{
    use HasFactory;

    protected $fillable = [
        'vaccine_center_id', 'name', 'phone_number', 'nid', 'email', 'status'
    ];

    public function vaccineCenter()
    {
        return $this->belongsTo(VaccineCenter::class, 'vaccine_center_id');
    }
}
