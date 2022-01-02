<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\company_category;

class CompanyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

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

    }
}
