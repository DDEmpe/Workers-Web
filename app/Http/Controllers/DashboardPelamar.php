<?php

namespace App\Http\Controllers;

use App\Models\apply_job;
use App\Models\User;
use App\Models\profession;
use App\Models\study_major;
use Illuminate\Http\Request;

class DashboardPelamar extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->company_detail->id;

        $apply = apply_job::join('users', 'users.id','=','apply_jobs.user_id')->join('job_vacancies','job_vacancies.id','=','apply_jobs.job_vacancy_id')->where('apply_jobs.company_id', $user)->get();
        
     //   dd($apply);
        return view('dashboard.pelamar.index',[
             'apply_jobs'=> $apply,
            'title' => 'Dashboard',
            
        
        ]);



         //   'user' => job_vacancy::join('company_details', 'company_details.id','=','job_vacancies.company_id')->join('users','users.id', "=", "company_details.user_id")->where('uid',$job_vacancy->uid)->get(),

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apply_job  $apply_job
     * @return \Illuminate\Http\Response
     */
    public function show(apply_job $apply_job)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apply_job  $apply_job
     * @return \Illuminate\Http\Response
     */
    public function edit(apply_job $apply_job,$uid )
    {

        $user = auth()->user()->company_detail->id;

        $apply = apply_job::join('users', 'users.id','=','apply_jobs.user_id')->join('job_vacancies','job_vacancies.id','=','apply_jobs.job_vacancy_id')->where('apply_jobs.uid', $uid)->get();
        

        foreach($apply as $app){
            $username = $app->username;
        }

       $appliers = User::where('username', $username )->get()->first();
     //   dd($appliers);
        return view ('dashboard.pelamar.edit',[
            'users' => $appliers,
            'apply'=>$apply,
            'professions' => profession::all(),
            'study_majors' => study_major::all(),
            'title' => 'Data Appliers',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\apply_job  $apply_job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $status)
    {
        $rules = [

            'uid' =>  'required|string',
            'status' => 'required|string',

        ];

        $uid = $request->uid;

        if($request->status=='Accept'){
            $validatedData['accepted'] = 1;
            $validatedData['rejected'] = 0;    
            $validatedData['onwait'] = 0;    
        }elseif($request->status=='Reject'){
            $validatedData['accepted'] = 0;
            $validatedData['rejected'] = 1;    
            $validatedData['onwait'] = 0;      
        };

        apply_job::where('uid',$uid)->update($validatedData);

        return redirect()->intended('/dashboard/pelamar');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apply_job  $apply_job
     * @return \Illuminate\Http\Response
     */
    public function destroy(apply_job $apply_job,$uid)
    {
        //

        $apply = apply_job::where('uid', $uid)->get()->first();

       // dd($apply);

        apply_job::destroy($apply->id);

        return redirect('/dashboard/pelamar')->with('Berhasil','Data Pelamar Telah Dihapus');
    }
}
