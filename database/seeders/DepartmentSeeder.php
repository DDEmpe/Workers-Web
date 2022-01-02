<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
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
    }
}
