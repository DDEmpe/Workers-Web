<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class profession extends Model
{
    use HasFactory;

    protected $fillable =[
        'profession_name'
    ];

    public function user_detail(){
        return $this->hasOne(user_detail::class);
    }

}
