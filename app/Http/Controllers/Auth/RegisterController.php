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
use Validator;
use Google\Service\Storage as ServiceStorage; { {
    }
}

class RegisterController extends Controller
{

    public function create(Request $request)
    {

        // $pass1 = $request['password'];
        // $pass2 = $request['password2'];
        // Rules table user utama

      //  $id = $validatedData['status_id'];
        // kondisi jika akun =
        if ($request->status_id == 3) {
            $rulesC = [
                'name' => 'required|string',
                'email' => 'required|string|email:dns|max:255|unique:users',
                'username' => 'required|string|unique:users',
                'description' => 'required|string',
                'password' => 'required|string|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/|min:8|max:255|confirmed',
                'address' =>  'string',
                'status_id' => 'required|integer',
                'profile_img' => 'file|image',
                'telephone' => 'string',
            ];

            $RulesCompany1 = [
                'name' => 'required|string',
                'email' => 'required|string|email:dns|max:255|unique:users',
                'username' => 'required|string|unique:users',
                'description' => 'required|string',
                'password' => 'required|string|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/|min:8|max:255|confirmed',
                'password_confirmation' => 'required|string|same:password',
                'address' =>  'string',
                'status_id' => 'required|integer',
                'profile_img' => 'file|image',
                'telephone' => 'string', 
                'facebook' => 'string',
                'twitter' => 'string',
                'website' => 'string',
                'instagram' => 'string',
                'company_category_id' => 'required', 'integer',
                'googlemaps' => 'string',
            ];

            $messagesC = [
                'email.unique'                   => 'Email Sudah Terdaftar.',
                'username.unique'                => 'Username Sudah Terdaftar.',
                'email.email'                    => 'Mohon Menggunakan Email Valid',
                'password.min'                   => 'Password minimal 8 huruf',
                'password.max'                   => 'Password Maksimal 255 huruf',
                'password.regex'                 => 'Password Harus Mengandung minimal 1 huruf besar, 1 huruf kecil, 1 angka dan 1 karakter spesial',
                'password.confirmed'             => 'Password Tidak Sama',
                'password_confirmation.required' => 'Mohon Isi Ulang Password',
                'password_confirmation.same'     => 'Password tidak sama',
                'profile_img.image'              => 'Mohon Upload File Gambar.',
                'name.required'                  => 'Harus Mengisi Nama Perusahaan',
                'email.required'                 => 'Harus Mengisi Email',
                'username.required'              => 'Harus Mengisi Username',
                'description.required'           => 'Harus Mengisi Deskripsi Perusahaan',
                'password.required'              => 'Harus Mengisi Password',
                'company_category_id.required'   => 'Harus Memilih Kategori Perusahaan',
            ];

            $validatedDatax = $request->validate($RulesCompany1,$messagesC);

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
    

            $validatedData = $request->validate($rulesC);
            $validatedData['password'] = Hash::make($validatedData['password']);

            $validatedData['profile_img'] = $urlprofile;
    
            $id= User::create($validatedData)->id;


            $validatedData['profile_img'] = $urlprofile;

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
            $validateddata['user_id'] = $id;
            company_detail::create($validateddata);

            $credentials = ['email' => $request->email, 'password' => $request->password];


            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();
                return redirect()->intended('/home');
            }
        } else if ($request->status_id == 2) {
            $rulesJobStreet = [
                'name' => 'required|string|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|string|email:dns|max:255|unique:users',
                'username' => 'required|string|unique:users',
                'description' => 'required|string',
                'password' => 'required|string|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/|min:8|max:255|confirmed',
                'password_confirmation' => 'required|string|same:password',
                'address' =>  'string',
                'profile_img' => 'file|image',
                'telephone' => 'string',
                'gender' => 'required|string',
                'last_education' => 'required|string',
                'cv_url' => 'string',
                'study_major_id' => 'required|string',
                'profession_id' =>  'required|string',
            ];
            $messagesJ = [
                'email.unique'            => 'Email Sudah Terdaftar.',
                'username.unique'         => 'Username Sudah Terdaftar.',
                'name.regex'              => 'Mohon hanya menggunakan huruf',
                'email.email'             => 'Mohon Menggunakan Email Valid',
                'password.min'            => 'Password minimal 8 huruf',
                'password.max'            => 'Password Maksimal 255 huruf',
                'password.confirmed'      => 'Password Tidak Sama',
                'password.regex'          => 'Password Harus Mengandung minimal 1 huruf besar, 1 huruf kecil, 1 angka dan 1 karakter spesial',
                'password_confirmation.required' => 'Mohon Isi Ulang Password',
                'password_confirmation.same'     => 'Password tidak sama',
                'profile_img.image'       => 'Mohon Upload File Gambar.',
                'name.required'           => 'Harus Mengisi Nama Lengkap',
                'email.required'          => 'Harus Mengisi Email',
                'username.required'       => 'Harus Mengisi UserName',
                'description.required'    => 'Harus Mengisi Deskripsi',
                'password.required'       => 'Harus Mengisi Password',
                'gender.required'         => 'Harus Memilih Jenis Kelamin',
                'last_education.required' => 'Harus Memilih Pendidikan Terakhir',
                'study_major_id.required' => 'Harus Memilih Jurusan',
                'profession_id.required'  => 'Harus Memilih Profesi',

            ];

            $validatedDatax = $request->validate($rulesJobStreet,$messagesJ);

            $rulesjob = [
                'user_id' => 'integer',
                'gender' => 'required|string',
                'last_education' => 'required|string',
                'cv_url' => 'string',
                'study_major_id' => 'required|string',
                'profession_id' =>  'required|string',
            ];

            $rulesJ = [
                'name' => 'required|string|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|string|email:dns|max:255|unique:users',
                'username' => 'required|string|unique:users',
                'description' => 'required|string',
                'password' => 'required|string|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!@$#%]).*$/|min:8|max:255|confirmed',
                'address' =>  'string',
                'status_id' => 'required|integer',
                'profile_img' => 'file|image',
                'telephone' => 'string',
            ];
            
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
    

            $validatedData = $request->validate($rulesJ);
            $validatedData['password'] = Hash::make($validatedData['password']);

            $validatedData['profile_img'] = $urlprofile;
    
            $id= User::create($validatedData)->id;

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

      //  dd($request);
        $uid = Auth()->user()->id;

        // JIKA FILE SAMA MAKA RENAME
        // $files = Storage::disk('google')->allFiles();
        // foreach ($files as $file) {
        //     $detail = Storage::disk('google')->getMetadata($file);
        //     if ($detail['name'] == Auth()->user()->username . '-cover.jpg') {
        //         Storage::disk('google')->rename($file, auth()->user()->username . '-cover.jpg');
        //     }
        // }

        //  kondisi jika akun =
        if ($request->status_id == 3) {

            $rulesC=[
                'name' =>  'required|String',
                'email' =>  'required|string|email:dns|max:255|unique:users,email,'.$uid.'',
                'description' =>  'required|String',
                'address' =>  'required|String',
                'profile_img' => 'file|image',
                'telephone' => 'required|numeric|digits_between:10,13',
                'company_category_id' =>  'required|integer',

            ];

            $message=[
                'name.required' =>  'Mohon Isi Nama Usaha',
                'email.required' =>  'Mohon untun mengisi Email',
                'email.unique' =>  'Email Sudah Dipake',
                'email.email' =>  'Mohon Menggunakan Email Valid',
                'description.required' =>  'Mohon Untuk mengisi Deskripsi Usaha',
                'address.required' =>  'Mohon Untuk Mengisi Alamat Usaha',
                'profile_img.image' => 'Mohon Untuk Mengupload File Gambar',
                'telephone.required' => 'Mohon untuk mengisi nomor telepon',
                'company_category_id.required' =>  'Mohon untuk memilih kategori usaha',
                'telephone.digits_between' => 'Mohon Mengisi Nomor Valid'
            ];

            $validatedData = $request->validate($rulesC,$message);


            $rules = [

                'name' =>  'String|required',
                'email' =>  'required|string|email:dns|max:255|unique:users,email,'.$uid.'',
                'description' =>  'String|required',
                'address' =>  'String|required',
                'profile_img' => 'file|image',
                'telephone' => 'numeric|required',
    
            ];

            $oldprofileid = trim($request->oldprofile_img, "https://drive.google.com/uc?id=&export=media");

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

            $rulescompany = [
                '`user_id`' => 'integer',
                'company_category_id' =>  'integer|required',
            ];
            

           $validateddata = $request->validate($rulescompany);
            if($request->twitter!=null){
                $validateddata['twitter'] = $request->twitter;
            }
            if($request->website!=null){
                $validateddata['website'] = $request->website;

            }           
            if($request->facebook!=null){
                $validateddata['facebook'] = $request->facebook;

            }           
            if($request->instagram!=null){
                $validateddata['instagram'] = $request->instagram;

            }
            if($request->googlemaps!=null){
                $validateddata['googlemaps'] = $request->googlemaps;

            }


            $validateddata['user_id'] = $uid;
            company_detail::where('user_id', $uid)->update($validateddata);

        } else if ($request->status_id == 2) {

            $rulesJ = [
                'name' =>  'required|String|regex:/^[\pL\s\-]+$/u',
                'email' =>  'required|string|email:dns|max:255|unique:users,email,'.$uid.'',
                'description' =>  'required|String',
                'address' =>  'required|String',
                'profile_img' => 'file|image',
                'telephone' => 'required|numeric|digits_between:10,13',
                'gender' =>  'string',
                'last_education' =>  'required|string',
                'cv_url' => 'file|mimes:pdf',
                'study_major_id' =>  'required|string',
                'profession_id' =>   'required|string',

            ];

            $messageJ = [
                'email.unique'            => 'Email Sudah Terdaftar.',
                'name.regex'              => 'Mohon hanya menggunakan huruf',
                'email.email'             => 'Mohon Menggunakan Email Valid',
                'profile_img.image'       => 'Mohon Upload File Gambar',
                'name.required'           => 'Harus Mengisi Nama Lengkap',
                'email.required'          => 'Harus Mengisi Email',
                'address.required'        => 'Harus Mengisi Alamat',
                'telephone.required'      => 'Harus Mengisi Nomor',
                'description.required'    => 'Harus Mengisi Deskripsi',
                'last_education.required' => 'Harus Memilih Pendidikan Terakhir',
                'study_major_id.required' => 'Harus Memilih Jurusan',
                'profession_id.required'  => 'Harus Memilih Profesi',
                'cv_url.mimes'            => 'Harus Mengupload CV dalam Bentuk PDF',
                'telephone.digits_between'       => 'Mohon Mengisi Nomor Valid'

            ];
            
            $validatedDatax = $request->validate($rulesJ,$messageJ);

            $rules = [

                'name' =>  'String',
                'email' =>  'email:dns|max:255',
                'description' =>  'String',
                'address' =>  'String',
                'profile_img' => 'file|image',
                'telephone' => 'numeric',
    
            ];

            $rulesjob = [
                'user_id' => 'integer',
                'gender' =>  'string',
                'last_education' =>  'string',
                'cv_url' => 'file|mimes:pdf',
                'study_major_id' =>  'string',
                'profession_id' =>   'string',
            ];


         $oldprofileid = trim($request->oldprofile_img, "https://drive.google.com/uc?id=&export=media");

             // JIKA ADA REQ IMG DAN SDH ADA FOTONYA, OVERWRITE
        if ($request->file('profile_img')) {
            if ($request->oldprofile_img) {
                Storage::disk('google')->delete($oldprofileid);
            }
            Storage::disk("google")->putFileAs("", $request->file("profile_img"), auth()->user()->username . '-cover.jpg');
        } else {
            $urlprofile = '';
        }

        $filesx = Storage::disk('google')->allFiles();
        foreach ($filesx as $filex) {
            $detail = Storage::disk('google')->getMetadata($filex);
            if ($detail['name'] == auth()->user()->username . '-cover.jpg') {
                $urlprofile = Storage::disk('google')->url($filex);
            }
        }

             // GET OLD CV URL ID
             $oldCVid = trim($request->oldcv_url, "https://drive.google.com/uc?id=&export=media");
               //dd($oldCVid);
             if ($request->file('cv_url')) {
                 if ($request->oldcv_url) {
                     Storage::disk('google')->delete($oldCVid);
                 }
                 Storage::disk("google")->putFileAs("", $request->file("cv_url"), auth()->user()->username . '-cv.pdf');
             } else {
                 $urlcv = '';
             } 
 
             // GET CV URL
             $files = Storage::disk('google')->allFiles();
             foreach ($files as $file) {
                 $details = Storage::disk('google')->getMetadata($file);
                 if ($details['name'] == auth()->user()->username . '-cv.pdf') {
                     $urlcv = Storage::disk('google')->url($file);
                 }
             }

            $validatedData = $request->validate($rules);
            $validatedData['profile_img'] = $urlprofile;
            User::where('id', $uid)->update($validatedData);

            $validateddata = $request->validate($rulesjob);
            $validateddata['user_id'] = $uid;
            $validateddata['cv_url'] = $urlcv;
            user_detail::where('user_id', $uid)->update($validateddata);
        };

        return redirect('/profile');
    }
}
