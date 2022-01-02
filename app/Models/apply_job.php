<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apply_job extends Model
{
    use HasFactory;

    protected $guarded= [
        'id'
    ];


    public function company_detail(){
        return $this->belongsTo(company_detail::class, "company_id");
    }

    public function user(){
        return $this->belongsTo(user::class);
    }

    public function job_vacancy(){
        return $this->HasOne(job_vacancy::class);
    }
}
