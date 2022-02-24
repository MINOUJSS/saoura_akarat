<?php

use Illuminate\Database\Seeder;

class Tronsactions_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tronsactions')->insert([
            'tronsaction' =>'للبيع',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('tronsactions')->insert([
            'tronsaction' =>'للكراء',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('tronsactions')->insert([
            'tronsaction' =>'للتبديل',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
    }
}
