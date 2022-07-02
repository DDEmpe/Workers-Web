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
        // dd($request);
        $today=date("Y-m-d", time());

        $rules = [

            'branch' =>  'required|string|regex:/^[\pL\s\-]+$/u',
            'description' =>  'required|string',
            'job_type' =>  'required|string',
            'location' =>   'required|string',
            'last_education' =>  'required|string',
            'study_major_id' => 'required|integer',
            'min_wages' => 'required|numeric|lt:max_wages|min:500000',
            'max_wages' => 'required|numeric|gt:min_wages|max:100000000',
            'deadline' =>  'required|date|after:'.$today.'',
            'departement_id' =>  'required|integer',
            'interview' =>  'required|boolean',
        ];

        $message = [
            'branch.regex' =>  'Mohon Isi Nama Lowongan Dengan Huruf Saja',
            'branch.required' =>  'Mohon Isi Nama Lowongan',
            'description.required' =>  'Mohon Isi Keterangan Lowongan',
            'job_type.required' =>  'Mohon Pilih Jenis Lowongan',
            'location.required' =>   'Mohon Isi Alamat Lowongan',
            'last_education.required' =>  'Mohon Pilih Minimal Pendidikan',
            'study_major_id.required' => 'Mohon Pilih Jurusan',
            'min_wages.required' => 'Mohon Isi Gaji Minimal',
            'max_wages.required' => 'Mohon Isi Gaji Maksimal',
            'min_wages.lt' => 'Mohon Isi Gaji Minimal Lebih Rendah Dari pada Gaji Maksimal',
            'max_wages.gt' => 'Mohon Isi Gaji Maksimal Lebih Tinggi Dari pada Gaji Minimal',
            'min_wages.min' => 'Gaji Minimal Rp.500.000',
            'max_wages.max' => 'Gaji Maksimal Rp. 100.000.000',
            'deadline.required' =>  'Mohon Pilih Tanggal Batas Post Lowongan',
            'deadline.after' =>  'Mohon Pilih Tanggal Batas Post Lowongan Setelah hari ini',
            'departement_id.required' =>  'Mohon Pilih Bidang Lowongan',
        ];

        $uid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
        if($uid == $job_vacancy ->uid_job_vacancy){
            $uid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 10);
        }
        $validatedData = $request->validate($rules,$message);
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

            'branch' =>  'required|string|regex:/^[\pL\s\-]+$/u',
            'description' =>  'required|string',
            'job_type' =>  'required|string',
            'location' =>   'required|string',
            'last_education' =>  'required|string',
            'study_major_id' => 'required|integer',
            'min_wages' => 'required|numeric|lt:max_wages|min:500000',
            'max_wages' => 'required|numeric|gt:min_wages|max:100000000',
            'deadline' =>  'required|date|after:'.$today.'',
            'departement_id' =>  'required|integer',
            'interview' =>  'required|boolean',
        ];

        $message = [
            'branch.regex' =>  'Mohon Isi Nama Lowongan Dengan Huruf Saja',
            'branch.required' =>  'Mohon Isi Nama Lowongan',
            'description.required' =>  'Mohon Isi Keterangan Lowongan',
            'job_type.required' =>  'Mohon Pilih Jenis Lowongan',
            'location.required' =>   'Mohon Isi Alamat Lowongan',
            'last_education.required' =>  'Mohon Pilih Minimal Pendidikan',
            'study_major_id.required' => 'Mohon Pilih Jurusan',
            'min_wages.required' => 'Mohon Isi Gaji Minimal',
            'max_wages.required' => 'Mohon Isi Gaji Maksimal',
            'min_wages.lt' => 'Mohon Isi Gaji Minimal Lebih Rendah Dari pada Gaji Maksimal',
            'max_wages.gt' => 'Mohon Isi Gaji Maksimal Lebih Tinggi Dari pada Gaji Minimal',
            'min_wages.min' => 'Gaji Minimal Rp.500.000',
            'max_wages.max' => 'Gaji Maksimal Rp. 100.000.000',
            'deadline.required' =>  'Mohon Pilih Tanggal Batas Post Lowongan',
            'deadline.after' =>  'Mohon Pilih Tanggal Batas Post Lowongan Setelah hari ini',
            'departement_id.required' =>  'Mohon Pilih Bidang Lowongan',
        ];

        $validatedData = $request->validate($rules,$message);
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
