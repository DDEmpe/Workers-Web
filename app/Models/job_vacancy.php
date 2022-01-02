<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Professions;

class job_vacancy extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function company_detail(){
        return $this->belongsTo(company_detail::class, "company_id");
    }

    public function interview(){
        return $this->hasOne(interview::class);
    }

    public function department(){
        return $this->belongsTo(department::class, 'departement_id');
        }
    
    public function study_major(){
        return $this->belongsTo(study_major::class);
    }

    public function apply_job(){
        return $this->hasMany(apply_job::class);
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('branch', 'like', '%' . $search . '%');
        });
    }
    
}
