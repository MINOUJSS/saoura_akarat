<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Facads_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facads')->insert([
            'facads' =>'واجهة واحدة',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('facads')->insert([
            'facads' =>'واجهتين',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('facads')->insert([
            'facads' =>'ثلاث واجهات',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('facads')->insert([
            'facads' =>'أربع واجهات',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
    }
}
