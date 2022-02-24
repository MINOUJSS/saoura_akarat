<?php

use Illuminate\Database\Seeder;

class Furnisheds_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('furnisheds')->insert([
            'furnisheds' =>'مفروش',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        DB::table('furnisheds')->insert([
            'furnisheds' =>'غير مفروش',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
    }
}
