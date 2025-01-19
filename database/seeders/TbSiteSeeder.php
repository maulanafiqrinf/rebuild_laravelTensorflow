<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\tb_site;

class TbSiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Data dummy
        tb_site::insert([
            [
                'site1' => 'about',
                'site2' => 'What I do!',
                'site3' => 'resume',
                'site4' => 'Education',
                'site5' => 'experience',
                'site6' => 'SoftSKills',
                'site7' => 'HardSkills',
                'site8' => 'Portofolio',
                'site9' => 'Sertifikat',
                'site10' => 'Kontak',
                'site11' => 'Im always open to discussing produuct',
            ],
        ]);
    }
}
