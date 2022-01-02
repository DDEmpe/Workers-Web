<?php

namespace App\Http\Controllers;
use App\Models\apply_job;

use App\Models\interview;
use Illuminate\Http\Request;

class DashboardInterviewUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = array();
        $status = array();
        $anu=0;
        $applied = apply_job::where('user_id',auth()->user()->id)->where('accepted','1')->get();
        foreach($applied as $item){
            if(interview::where('job_vacancy_id',$item->job_vacancy_id)->get()!=NULL){
                $collection[] = interview::where('job_vacancy_id',$item->job_vacancy_id)->get();
            }
            foreach($collection[$anu] as $col){
                if($col->online==1){
                    $status[]='Online';
                }else{
                    $status[]='Offline';
                }
            }
            $anu += 1;
        };

        return view('dashboard.interview.pelamar.index',[
            'collection' => $collection,
            'title' => 'Interview Anda',
            'anu' => $anu,
            'status' => $status
        ]);
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
     * @param  \App\Models\interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function show(interview $interview, $uid)
    {
       $interview= interview::where('uid_interview',$uid)->get();
       return view('dashboard.interview.pelamar.view',[
        'interview' => $interview,
        'title' => 'Interview',
    ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function edit(interview $interview)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, interview $interview)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\interview  $interview
     * @return \Illuminate\Http\Response
     */
    public function destroy(interview $interview)
    {
        //
    }
}
