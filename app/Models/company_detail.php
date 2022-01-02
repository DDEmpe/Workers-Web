<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'facebook',
        'twitter',
        'website',
        'instagram',
        'company_category_id',
        'googlemaps',
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function job_vacancy(){
        return $this->hasMany(job_vacancy::class);
    }

    public function interview(){
        return $this->hasMany(interview::class);
    }

    public function Company_category(){
        return $this->belongsTo(Company_category::class);
    }

    public function apply_job(){
        return $this->hasMany(apply_job::class);
    }
}