<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\company_detail;
use App\Models\User;
use App\Models\user_detail;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Google\Service\Storage as ServiceStorage; { {
    }
}

class RegisterController extends Controller
{

    public function create(Request $request)
    {
        // Rules table user utama
        $rules = [

            'name' => 'required', 'string',
            'email' => 'required', 'string', 'email:dns', 'max:255', 'unique:users',
            'username' => 'required', 'string', 'confirmed', 'unique:users',
            'description' => 'required', 'string',
            'password' => 'required', 'string', 'min:8',
            'address' =>  'string',
            'status_id' => 'required', 'integer',
            'profile_img' => 'file|image',
            'telephone' => 'string',

        ];

        $validatedData = $request->validate($rules);
        $validatedData['password'] = Hash::make($validatedData['password']);

        if ($request->file('profile_img')) {
            Storage::disk("google")->putFileAs("", $request->file("profile_img"), $request->username . '-cover.jpg');
        } else {
            $urlprofile = '';
        }


        $files = Storage::disk('google')->allFiles();
        foreach ($files as $file) {
            $detail = Storage::disk('google')->getMetadata($file);
            if ($detail['name'] == $request->username . '-cover.jpg') {
                $urlprofile = Storage::disk('google')->url($file);
            }
        }

        $validatedData['profile_img'] = $urlprofile;

        $id = User::create($validatedData)->id;
        // kondisi jika akun =
        if ($request->status_id == 3) {
            $rulescompany = [
                'user_id' => 'integer',
                'facebook' => 'string',
                'twitter' => 'string',
                'website' => 'string',
                'instagram' => 'string',
                'company_category_id' => 'required', 'integer',
                'googlemaps' => 'string',
            ];
            $validateddata = $request->validate($rulescompany);
            if ($request->file('profile_img')) {
                Storage::disk("google")->putFileAs("", $request->file("profile_img"), $request->username . '-cover.jpg');
            }
            $files = Storage::disk('google')->allFiles();
            foreach ($files as $file) {
                $detail = Storage::disk('google')->getMetadata($file);
                if ($detail['name'] == $request->username . '-cover.jpg') {
                    $urlprofile = Storage::disk('google')->url($file);
                }
            }

            $validatedData['profile_img'] = $urlprofile;
            $validateddata['user_id'] = $id;
            company_detail::create($validateddata);

            $credentials = ['email' => $request->email, 'password' => $request->password];


            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/home');
            }
        } else if ($request->status_id == 2) {
            $rulesjob = [
                'user_id' => 'integer',
                'gender' => 'required', 'string',
                'last_education' => 'required', 'string',
                'cv_url' => 'string',
                'study_major_id' => 'required', 'string',
                'profession_id' =>  'required', 'string',
            ];

            $validateddata = $request->validate($rulesjob);
            $validateddata['user_id'] = $id;
            user_detail::create($validateddata);
            $credentials = ['email' => $request->email, 'password' => $request->password];


            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/home');
            }
        };
    }

    public function update(Request $request, Auth $user, user_detail $user_detail, company_detail $company_detail)
    {

        $uid = Auth()->user()->id;

        $rules = [

            'name' =>  'String',
            'email' =>  'email:dns|max:255',
            'description' =>  'String',
            'address' =>  'String',
            'profile_img' => 'file|image',
            'telephone' => 'numeric',

        ];

        $oldprofileid = trim($request->oldprofile_img, "https://drive.google.com/uc?id=&export=media");

        // JIKA FILE SAMA MAKA RENAME
        // $files = Storage::disk('google')->allFiles();
        // foreach ($files as $file) {
        //     $detail = Storage::disk('google')->getMetadata($file);
        //     if ($detail['name'] == Auth()->user()->username . '-cover.jpg') {
        //         Storage::disk('google')->rename($file, auth()->user()->username . '-cover.jpg');
        //     }
        // }

        // JIKA ADA REQ IMG DAN SDH ADA FOTONYA, OVERWRITE
        if ($request->file('profile_img')) {
            if ($request->oldprofile_img) {
                Storage::disk('google')->delete($oldprofileid);
            }
            Storage::disk("google")->putFileAs("", $request->file("profile_img"), auth()->user()->username . '-cover.jpg');
        } else {
            $urlprofile = '';
        }

        $files = Storage::disk('google')->allFiles();
        foreach ($files as $file) {
            $detail = Storage::disk('google')->getMetadata($file);
            if ($detail['name'] == auth()->user()->username . '-cover.jpg') {
                $urlprofile = Storage::disk('google')->url($file);
            }
        }

        $validatedData = $request->validate($rules);
        $validatedData['profile_img'] = $urlprofile;
        User::where('id', $uid)->update($validatedData);

        //  kondisi jika akun =
        if ($request->status_id == 3) {

            $rulescompany = [
                '`user_id`' => 'integer',
                'facebook' => 'string',
                'twitter' => 'string',
                'website' => 'string',
                'instagram' => 'string',
                'company_category_id' =>  'integer',
                'googlemaps' => 'string',
            ];

            $validateddata = $request->validate($rulescompany);
            $validateddata['user_id'] = $uid;
            company_detail::where('user_id', $uid)->update($validateddata);
        } else if ($request->status_id == 2) {

            // GET OLD CV URL ID
            $oldCVid = trim($request->oldcv_url, "https://drive.google.com/uc?id=&export=media");

            if ($request->file('cv_url')) {
                if ($request->oldcv_url) {
                    Storage::disk('google')->delete($oldcv_url);
                }
                Storage::disk("google")->putFileAs("", $request->file("cv_url"), auth()->user()->username . '-cv.pdf');
            } else {
                $urlcv = '';
            }


            // GET CV URL
            $files = Storage::disk('google')->allFiles();
            foreach ($files as $file) {
                $detail = Storage::disk('google')->getMetadata($file);
                if ($detail['name'] == auth()->user()->username . '-cv.pdf') {
                    $urlcv = Storage::disk('google')->url($file);
                }
            }

            $rulesjob = [
                'user_id' => 'integer',
                'gender' =>  'string',
                'last_education' =>  'string',
                'cv_url' => 'file|mimes:pdf',
                'study_major_id' =>  'string',
                'profession_id' =>   'string',
            ];

            $validateddata = $request->validate($rulesjob);
            $validateddata['user_id'] = $uid;
            $validateddata['cv_url'] = $urlcv;
            user_detail::where('user_id', $uid)->update($validateddata);
        };

        return redirect('/profile');
    }
}
