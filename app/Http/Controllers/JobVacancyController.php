<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SebastianBergmann\CodeUnit\FunctionUnit;
use App\Models\job_vacancy;

class JobVacancyController extends Controller
{
    


    public function show(job_vacancy $job_vacancy){
        // dd(
        //     job_vacancy::join('company_details', 'company_details.id','=','job_vacancies.company_id')->join('users','users.id', "=", "company_details.user_id")->where('uid',$job_vacancy->uid)->get()
        //  ); 

         return view('job_detail.job_detail', [
            'title'=>'Detail Lowongan',
            'job_vacancy' => $job_vacancy,
            'user' => job_vacancy::join('company_details', 'company_details.id','=','job_vacancies.company_id')->join('users','users.id', "=", "company_details.user_id")->where('uid_job_vacancy',$job_vacancy->uid_job_vacancy)->get(),
            
            
        ]);

    }

}
