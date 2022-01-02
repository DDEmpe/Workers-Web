<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class interview extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function company_detail(){
        return $this->belongsTo(company_detail::class);
    }

    public function job_vacancy(){
        return $this->belongsTo(job_vacancy::class);
    }
}
