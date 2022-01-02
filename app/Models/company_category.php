<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class company_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'company_category_name',
    ];

    public function company_detail(){
        return $this->hasMany(company_detail::class);
    }
}
