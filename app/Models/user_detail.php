<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_detail extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'gender',
        'last_education',
        'cv_url',
        'study_major_id',
        'profession_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function study_major(){
        return $this->belongsTo(study_major::class);
    }


    public function skill_list(){
        return $this->hasMany(skill_list::class);
    }


    public function profession(){
        return $this->belongsTo(profession::class);
    }

    public function apply_job(){
        return $this->hasMany(apply_job::class);
    }
    
}
