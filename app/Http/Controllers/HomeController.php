<?php

namespace App\Http\Controllers;

use App\Models\company_detail;
use Illuminate\Http\Request;
use App\Models\job_vacancy;
use App\Models\User;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->middleware('auth');


    // }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $today=date("Y-m-d", time());

        $search = job_vacancy::join('company_details', 'company_details.id', '=', 'job_vacancies.company_id')->join('users', 'users.id', "=", "company_details.user_id")->where('deadline', '>=' , $today );

        if (request('search') != '') {
            $sear = $search->where('branch', 'like', '%' . request('search') . '%')->paginate(8);
        } elseif (request('search') == '') {
            $sear = job_vacancy::join('company_details', 'company_details.id', '=', 'job_vacancies.company_id')->join('users', 'users.id', "=", "company_details.user_id")->where('deadline', '>=' , $today )->paginate(8);
        }

        // dd($search);
        return view('landing.index', [
            'title' => 'Home',
            'job_vacancies' => $sear,
            //    $search->filter(request(['search', 'branch']))->paginate(8)->withQueryString(),

            'user' => User::all()
        ]);

        //     if(auth()){
        //         $status = auth()->user()->status_id;
        //        if($status == 2){
        //         return view('landing.index', [
        //             'title' => 'Home User',
        //             'job_vacancies' => job_vacancy::all(),
        //             'users' => User::all()
        //         ]);
        //     }else{
        //         return view('landing.index', [ 
        //             'title'=>'Home Company',
        //            'job_vacancies' => job_vacancy::all(),

        //         ]);
        //     }
        //     }else{
        //         return view('landing.index', [ 
        //             'title'=>'Home Company',
        //            'job_vacancies' => job_vacancy::all(),

        //         ]);
        //     }
    }


    public function show($id)
    {
        return view('', []);
    }
}
