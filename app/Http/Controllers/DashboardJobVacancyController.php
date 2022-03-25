<?php

namespace App\Http\Controllers;
use App\Models\department;
use App\Models\job_vacancy;
use App\Models\study_major;
use Illuminate\Http\Request;

class DashboardJobVacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    
        return view('dashboard.lowongan.index',[
            'job_vacancies' => job_vacancy::where('company_id', Auth()->user()->company_detail->id)->get(),
            'title' => 'Dashboard']);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('dashboard.lowongan.create',[
            'departments' => department::all(),
            'study_majors'=>study_major::all(),
            'title' => 'Buat Lowongan',
        ]);
    
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,job_vacancy $job_vacancy)
    {
        $today=date("Y-m-d", time());
        $rules = [

            'branch' =>  'required|string',
            'description' =>  'required|string',
            'job_type' =>  'required|string',
            'location' =>   'required|string',
            'last_education' =>  'required|string',
            'study_major_id' => 'required|integer',
            'min_wages' => 'required|numeric|lt:max_wages',
            'max_wages' => 'required|numeric|gt:min_wages',
            'deadline' =>  'required|date|after:'.$today.'',
            'departement_id' =>  'required|integer',
            'interview' =>  'required|boolean',


        ];
        $uid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
        if($uid == $job_vacancy ->uid_job_vacancy){
            $uid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
        }
        $validatedData = $request->validate($rules);
        $validatedData['company_id'] = auth()->user()->company_detail->id;
        $validatedData['uid_job_vacancy'] = $uid;
        job_vacancy::create($validatedData);
        return redirect()->intended('/dashboard/lowongan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\job_vacancy  $job_vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(job_vacancy $job_vacancy, $id)
    {
          $job = job_vacancy::where('id', $id)->get()->first();
       // dd($id, $job_vacancy, $job);
    
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\job_vacancy  $job_vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(job_vacancy $job_vacancy, $id)
    {
        //

        $job = job_vacancy::where('id', $id)->get()->first();
        return view ('dashboard.lowongan.edit',[
            'job_vacancies' => $job,
            'departments' => department::all(),
            'study_majors'=>study_major::all(),
            'title' => 'Edit Lowongan',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\job_vacancy  $job_vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, job_vacancy $job_vacancy, $id)
    {
        $today=date("Y-m-d", time());
        $rules = [

            'branch' =>  'required|string',
            'description' =>  'required|string',
            'job_type' =>  'required|string',
            'location' =>   'required|string',
            'last_education' =>  'required|string',
            'study_major_id' => 'required|integer',
            'min_wages' => 'required|numeric|lt:max_wages',
            'max_wages' => 'required|numeric|gt:min_wages',
            'deadline' =>  'required|date|after:'.$today.'',
            'departement_id' =>  'required|integer',
            'interview' =>  'required|boolean',


        ];

        $validatedData = $request->validate($rules);
        $validatedData['company_id'] = auth()->user()->company_detail->id;
        job_vacancy::where('id',$id)->update($validatedData);

        return redirect()->intended('/dashboard/lowongan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\job_vacancy  $job_vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(job_vacancy $job_vacancy, $id)
    {
        //
        $job = job_vacancy::where('id', $id)->get()->first();

        job_vacancy::destroy($job->id);

        return redirect('/dashboard/lowongan')->with('Berhasil','Data Lowongan Telah Dihapus');
    }
}
