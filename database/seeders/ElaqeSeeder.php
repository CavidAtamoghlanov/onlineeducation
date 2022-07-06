<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElaqeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sosial_media')->insert([
            'name'=>'Mail',
            'icon'=>'<i class="fa fa-envelope-o" aria-hidden="true"></i>',
            'email'=>'project.dma@sosial.gov.az',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()


        ]);
    }
}
