<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Etage_Number_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('etage_numbers')->insert([
            'etage_number' =>'-3',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('etage_numbers')->insert([
            'etage_number' =>'-2',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('etage_numbers')->insert([
            'etage_number' =>'-1',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('etage_numbers')->insert([
            'etage_number' =>'0',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('etage_numbers')->insert([
            'etage_number' =>'1',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('etage_numbers')->insert([
            'etage_number' =>'2',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('etage_numbers')->insert([
            'etage_number' =>'3',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('etage_numbers')->insert([
            'etage_number' =>'4',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('etage_numbers')->insert([
            'etage_number' =>'5',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('etage_numbers')->insert([
            'etage_number' =>'+5',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
    }
}
