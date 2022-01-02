<?php

namespace Database\Seeders;

use App\Models\company_category;
use App\Models\profession;
use App\Models\study_major;
use App\Models\user_status;
use App\Models\department;
use Illuminate\Database\Seeder;
 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        department::create([
            'departement_name' => 'Tidak Ada'
        ]);

        department::create([
            'departement_name' => 'Produksi'
        ]);

        department::create([
            'departement_name' => 'Riset Dan Pengembangan'
        ]);

        department::create([
            'departement_name' => 'Marketing'
        ]);

        department::create([
            'departement_name' => 'Sumber Daya Manusia'
        ]);

        department::create([
            'departement_name' => 'Akuntansi dan Ekonomi'
        ]);
        
        department::create([
            'departement_name' => 'IT'
        ]);

        study_major::create([

            'study_name'=>'Komputer'
        ]); 
        
        study_major::create([

            'study_name'=>'Dokter'
        ]); 
        
        study_major::create([

            'study_name'=>'Farmasi'
        ]);

        company_category::create([
            'company_category_name' => 'IT'
        ]);
        
        company_category::create([
            'company_category_name' => 'Jasa'
        ]);

        company_category::create([
            'company_category_name' => 'Perbankan'
        ]);

        company_category::create([
            'company_category_name' => 'Media Massa'
        ]);

        company_category::create([
            'company_category_name' => 'Hukum'
        ]);
        
        company_category::create([
            'company_category_name' => 'Pariwisata'
        ]);

        company_category::create([
            'company_category_name' => 'Telekomunikasi'
        ]);

        company_category::create([
            'company_category_name' => 'Pemerintahan'
        ]);

        company_category::create([
            'company_category_name' => 'Energi dan pertambangan'
        ]);

        company_category::create([
            'company_category_name' => 'Seni'
        ]);

        company_category::create([
            'company_category_name' => 'Kreatif'
        ]);

        company_category::create([
            'company_category_name' => 'Desain'
        ]);

        company_category::create([
            'company_category_name' => 'Teknik dan industri'
        ]);

        company_category::create([
            'company_category_name' => 'Penulisan'
        ]);
        
        company_category::create([
            'company_category_name' => 'Bahasa dan penerjemah'
        ]);

        company_category::create([
            'company_category_name' => 'Keuangan'
        ]);

        company_category::create([
            'company_category_name' => 'Pendidikan'
        ]);

        user_status::create([

            'status'=>'Admin'
        ]);

        user_status::create([

            'status'=>'JobSeeker'
        ]);

        user_status::create([

            'status'=>'Company'
        ]);

        profession::create([
            'profession_name' => 'Tidak Ada'
        ]); 

        profession::create([
            'profession_name' => 'Programmer'
        ]); 

        profession::create([
            'profession_name' => 'Guru'
        ]); 

        profession::create([
            'profession_name' => 'Dokter'
        ]); 

        profession::create([
            'profession_name' => 'Apoteker'
        ]); 

        profession::create([
            'profession_name' => 'Arsitektur'
        ]); 

        profession::create([
            'profession_name' => 'Ankuntan'
        ]); 

        profession::create([
            'profession_name' => 'Nelayan'
        ]); 

        profession::create([
            'profession_name' => 'Sopir'
        ]); 

        //\App\Models\User::factory(10)->create();
    }
}
