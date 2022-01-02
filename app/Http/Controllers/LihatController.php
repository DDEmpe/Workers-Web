<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\company_category;
use App\Models\User;

class LihatController extends Controller
{
    public function show($username){
   return view('job_detail.lihat', [ 
                'title'=>'Profil Company',
                'user'=> User::where('username',$username)->get(),
                'company_category'=> company_category::all()
            ]);
        }

}
         
