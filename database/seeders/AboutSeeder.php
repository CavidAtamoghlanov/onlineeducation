<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('abouts')->insert([
            'description'=>'Dövlət Məşğulluq Agentliyi (Agentlik) ölkədə əmək münasibətlərinin inkişafı və tam məşğulluğun təmin edilməsi istiqamətində dövlətin iqtisadi və sosial siyasətini icra etmək məqsədilə Azərbaycan Respublikası Əmək və Əhalinin Sosial MÜdafiəsi Nazirliyi (ƏƏSMN) tabeliyində yaradılan publik hüquqi şəxsdir. Müstəqil Azərbaycan tarixində əhalinin məşğulluğunu təmin etmək məqsədilə yaradılan ilk qurum 12 iyun 1991-ci il tarixli 211 nömrəli Qərarına müvafiq olaraq 1 avqust 1991-ci ildə fəaliyyətə başlayan Baş Məşğulluq idarəsi olmuşdur.

            Hazırda Agentlik əhalinin məşğulluğunun təşviq və təmin edilməsi istiqamətində müxtəlif xidmətlərin icra edilməsini həyata keçirir. Aktiv məşğulluq tədbirlərinin təşkili, işsizlikdən sığorta vəsaitinin idarə edilməsi, işaxtaran və işsiz şəxslərin sosial müdafiəsi ilə bağlı tədbirlərin, “Məşğulluq haqqında” Azərbaycan Respublikası Qanununun tələblərinə əməl olunmasına nəzarətin, habelə aidiyyəti dövlət orqanları (qurumları) ilə birlikdə əmək bazarının təhlili və qeyri-formal məşğulluğun aşkar edilməsi və qarşısının alınması ilə bağlı nəzarət tədbirlərinin həyata keçirilməsi, bununla bağlı maarifləndirmə, məlumatlandırma, təbliğat işinin təşkili (bundan sonra – müvafiq sahə) Agentlik tərəfindən göstərilən xidmətlərdəndir.',

            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()


        ]);
    }
}
