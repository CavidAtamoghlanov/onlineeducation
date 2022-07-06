<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SosilaMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sosial_media')->insert([
            'name'=>'Instagram',
            'link'=>'https://www.instagram.com/dma.sosial.gov.az',
            'icon'=>'<i class="fab fa-instagram-square fa-2x"></i>',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()


        ]);

        DB::table('sosial_media')->insert([
            'name'=>'Facebook',
            'link'=>'https://www.facebook.com/dma.sosial.gov.az',
            'icon'=>'<i class="fab fa-facebook-square fa-2x p-0"></i>',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()


        ]);

        DB::table('sosial_media')->insert([
            'name'=>'Linkedin',
            'link'=>'https://www.linkedin.com/company/dmasosialgovaz',
            'icon'=>'<i class="fab fa-linkedin fa-2x" ></i>',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()


        ]);
        DB::table('sosial_media')->insert([
            'name'=>'Youtube',
            'link'=>'https://www.youtube.com/channel/UCCTrrJoq_CCCuN1IHE3DbTA',
            'icon'=>'<i class="fab fa-youtube-square fa-2x" ></i>',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()


        ]);

    }
}
