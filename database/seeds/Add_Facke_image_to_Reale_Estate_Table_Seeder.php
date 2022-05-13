<?php

use Illuminate\Database\Seeder;

class Add_Facke_image_to_Reale_Estate_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //------- apartment images
        DB::table('images')->insert([
            'reale_estate_id'=>'1',
            'image'=>'1_0.png',
            'index'=>'0'
        ]);
        DB::table('images')->insert([
            'reale_estate_id'=>'1',
            'image'=>'1_1.png',
            'index'=>'0'
        ]);
        //------- home images
        DB::table('images')->insert([
            'reale_estate_id'=>'2',
            'image'=>'2_0.png',
            'index'=>'0'
        ]);
        DB::table('images')->insert([
            'reale_estate_id'=>'2',
            'image'=>'2_1.png',
            'index'=>'0'
        ]);
        //------- studio images
        DB::table('images')->insert([
            'reale_estate_id'=>'3',
            'image'=>'3_0.png',
            'index'=>'0'
        ]);
        DB::table('images')->insert([
            'reale_estate_id'=>'3',
            'image'=>'3_1.png',
            'index'=>'0'
        ]);
        //------- farme images
        DB::table('images')->insert([
            'reale_estate_id'=>'4',
            'image'=>'4_0.png',
            'index'=>'0'
        ]);
        DB::table('images')->insert([
            'reale_estate_id'=>'4',
            'image'=>'4_1.png',
            'index'=>'0'
        ]);
        //------- land images
        DB::table('images')->insert([
            'reale_estate_id'=>'5',
            'image'=>'5_0.png',
            'index'=>'0'
        ]);
        DB::table('images')->insert([
            'reale_estate_id'=>'5',
            'image'=>'5_1.png',
            'index'=>'0'
        ]);
        //------- shop images
        DB::table('images')->insert([
            'reale_estate_id'=>'6',
            'image'=>'6_0.png',
            'index'=>'0'
        ]);
        DB::table('images')->insert([
            'reale_estate_id'=>'6',
            'image'=>'6_1.png',
            'index'=>'0'
        ]);

        //------- shop images
        DB::table('images')->insert([
            'reale_estate_id'=>'7',
            'image'=>'7_0.png',
            'index'=>'0'
        ]);
        DB::table('images')->insert([
            'reale_estate_id'=>'7',
            'image'=>'7_1.png',
            'index'=>'0'
        ]);

    }
}
