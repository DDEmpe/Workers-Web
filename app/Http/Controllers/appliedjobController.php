<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\apply_job;

class appliedjobController extends Controller
{
    public function index()
    {
        $applied = apply_job::join('job_vacancies', 'job_vacancies.id', '=', 'apply_jobs.job_vacancy_id')->where('user_id', auth()->user()->id)->get();

        return view('dashboard.lamaran.index', [
            'lamarans' => $applied,
            'title' => 'lamaranku'
        ]);
    }

    public function delete($uid){
        $apply = apply_job::where('uid', $uid)->get()->first();
 
         apply_job::destroy($apply->id);
 
         return redirect('/dashboard/applied_job')->with('Berhasil','Data Pelamar Telah Dihapus');

        return back()->with('success', 'Lamaran di hapus!');
    }
}
