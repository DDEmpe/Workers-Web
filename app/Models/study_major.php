<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class study_major extends Model
{
    use HasFactory;

    protected $fillable = [
        'study_name',
    ];

    public function user_detail(){
        return $this->hasMany(user_detail::class);
    }

    public function job_vacancy(){
        return $this->hasMany(job_vacancy::class);
    }
}
