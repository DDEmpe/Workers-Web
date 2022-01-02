<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    
    public function job_vacancy(){
        return $this->haMmany(job_vacancy::class);
    }
    
}
