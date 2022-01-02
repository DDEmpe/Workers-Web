<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class skill_list extends Model
{
    use HasFactory;
    protected $guarded = [
        'id'
    ];

    public function user_detail(){
        return $this->belongsTo(user_detail::class);
    }

}
