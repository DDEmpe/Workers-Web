<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\profession;
use App\Models\study_major;
use App\Models\company_category;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth()->user();
        $status = Auth()->user()->status_id;

        if ($status == 2) {
            return view('profile.profil', [
                'title' => 'User Profile',
            ]);
        } else {
            return view('profile_comp.profilecomp', [
                'title' => 'Company Profile',
                'user' => $user,
            ]);
        }
    }

    public function show()
    {
        $status = Auth()->user()->status_id;
        $user = Auth()->user();

        if ($status == 2) {
            return view('profile.edit', [
                'title' => 'Edit Profil User',
                'professions' => profession::all(),
                'study_majors' => study_major::all(),

            ]);
        } else {
            return view('profile_comp.editprofilecomp', [
                'title' => 'Edit Profil Company',
                'user' => $user,
                'company_categories' => company_category::all(),
            ]);
        }
    }
}
