<?php

namespace App\Http\Controllers;

use App\Models\apply_job;
use App\Models\job_vacancy;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
class ApplyJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/job_detail');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/job_detail/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, apply_job $apply_job)
    {
        // dd($request);

        $rules = [
            'company_id' => 'required|integer',
            'job_vacancy_id' =>  'required|integer',
            
        ];

        $uid = auth()->id();
        $apply = $request->job_vacancy_id;

        $ui = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
        if($ui == $apply_job ->uid){
            $ui = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
        }

        $validatedData = $request->validate($rules);
        // dd($validatedData);
        $validatedData['user_id'] = $uid;   
        $validatedData['uid'] = $ui;   

        $con = apply_job::where('user_id', $uid)->where('job_vacancy_id', $apply)->first();

        if($con){
            return redirect()->back()->with('message', 'Sudah Apply ke lowongan ini!');
        }
        apply_job::create($validatedData);
        return redirect()->back()->with('message', 'Telah Berhasil Apply!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\apply_job  $apply_job
     * @return \Illuminate\Http\Response
     */
    public function show(apply_job $apply_job)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\apply_job  $apply_job
     * @return \Illuminate\Http\Response
     */
    public function edit(apply_job $apply_job)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\apply_job  $apply_job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, apply_job $apply_job)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\apply_job  $apply_job
     * @return \Illuminate\Http\Response
     */
    public function destroy(apply_job $apply_job)
    {
        //
    }
}
