<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\interview;
use App\Models\job_vacancy;


class DashboardInterview extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('dashboard.interview.index',[
            'collection' => interview::where('company_id', Auth()->user()->company_detail->id)->get(),
            'title' => 'Interview']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        return view('dashboard.interview.create',[
            'title' => 'Create Interview',
            'collection'=> job_vacancy::where('interview',0)->where('company_id', Auth()->user()->company_detail->id)->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,interview $interview )
    {
        $today=date("Y-m-d", time());

        $rules = [
            'job_vacancy_id' => 'required|integer',
            'interview_date' =>  'required|date|after:'.$today.'',
            'address' =>   'required|string',
            'notes' =>  'required|string',
            'kategori_id' => 'required|integer'
        ];


        $message = [ 
            'job_vacancy_id.required' => 'Mohon Piih Lowongan untuk membuat jadwal interview',
            'interview_date.after' => 'Mohon pilih hari setelah hari ini',
            'interview_date.required' => 'Mohon tentukan tanggal untuk jadwal interview',
            'address.required' => 'Mohon isi alamat untuk interview',
            'kategori_id.required' => 'Mohon Pilih Jenis Interview',
            'notes.required' => 'Mohon Isi Catatan'
        ];

        $job_id = $request->job_vacancy_id;

      $validateddata['interview']=1;

      $validatedData = $request->validate($rules,$message);
        if($request->kategori_id==1){
            $validatedData['online'] = 1;
            $validatedData['offline'] = 0;
        }else{
            $validatedData['online'] = 0;
            $validatedData['offline'] = 1;
        }

        $uid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8);
        if($uid == $interview ->uid_interview){
            $uid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 8);
        }
        $validatedData['company_id'] = auth()->user()->company_detail->id;
        $validatedData['uid_interview'] = $uid;
       // dd($validatedData);
        job_vacancy::where('id',$job_id)->update($validateddata);
        interview::create($validatedData);
        return redirect('/dashboard/interview')->with('message', 'Interview Telah Berhasil Dibuat!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('dashboard.interview.edit', [
            'title' => 'Edit Interview',
            'jobvacancies'=> job_vacancy::where('company_id', Auth()->user()->company_detail->id)->get(),
            'collection' => interview::where('company_id', Auth()->user()->company_detail->id)->get(),
            'id' => $id
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, interview $interview)
    {
        $today=date("Y-m-d", time());
        //
        $rules = [
            'job_vacancy_id' => 'required|integer',
            'interview_date' =>  'required|date|after:'.$today.'',
            'address' =>   'required|string',
            'notes' =>  'required|string',
            'kategori_id' => 'required|integer'
        ];

        $rulesI = [
            'job_vacancy_id' => 'required|integer',
            'interview_date' =>  'required|date|after:'.$today.'',
            'address' =>   'required|string',
            'notes' =>  'required|string',
        ];


        $message = [ 
            'job_vacancy_id.required' => 'Mohon Piih Lowongan untuk membuat jadwal interview',
            'interview_date.after' => 'Mohon pilih hari setelah hari ini',
            'interview_date.required' => 'Mohon tentukan tanggal untuk jadwal interview',
            'address.required' => 'Mohon isi alamat untuk interview',
            'kategori_id.required' => 'Mohon Pilih Jenis Interview',
            'notes.required' => 'Mohon Isi Catatan'
        ];
        
        $validatedData = $request->validate($rules,$message);
        $validatedata =  $request->validate($rulesI);
        if($request->kategori_id==1){
            $validatedata['online'] = 1;
            $validatedata['offline'] = 0;
        }else{
            $validatedata['online'] = 0;
            $validatedata['offline'] = 1;
        }
        $validatedata['company_id'] = auth()->user()->company_detail->id;
        interview::where('id',$interview->id)->update($validatedata);
        return redirect('/dashboard/interview')->with('message', 'Interview Telah Berhasil Diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data=interview::where('id',$id)->get();
       // dd($data);       
        foreach($data as $dat){
            $job_id = $dat->job_vacancy_id;
        };
        //dd($job_id);
       // $job_id = $request->job_vacancy_id;
       $validateddata['interview']=0;

        job_vacancy::where('id',$job_id)->update($validateddata);

        interview::destroy($id);
        return redirect('/dashboard/interview')->with('message', 'Interview has been deleted!');
    }
}
