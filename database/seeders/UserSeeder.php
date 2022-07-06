<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('users')->insert([
            'name'=>'Cavid',
            'surname'=>'Atamoghlanov',
            'role'=>'admin',
            'picture' => null,
            'email' =>'catamoghlanov@sosial.gov.az',
            'position' => null,
            'subject' => null,
            'password'=>Hash::make('a3184073'), // a3184073
            'status' => 1,
            'deleted_by' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()


        ]);


        DB::table('users')->insert([
            'name'=>'Tunar',
            'surname'=>'Abuzar',
            'role'=>'teacher',
            'picture' => null,
            'email' =>'tunarabuzar@sosial.gov.az',
            'position' => 'BP Art Director',
            'subject' => 'Design',
            'password'=>Hash::make('a3184073'), // a3184073
            'status' => 1,
            'deleted_by' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()


        ]);

        DB::table('users')->insert([
            'name'=>'Elsen',
            'surname'=>'Hesenov',
            'role'=>'student',
            'picture' => null,
            'email' =>'elsen@sosial.gov.az',
            'position' => null,
            'subject' => null,
            'password'=>Hash::make('a3184073'), // a3184073
            'status' => 1,
            'deleted_by' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()


        ]);


    }
}
