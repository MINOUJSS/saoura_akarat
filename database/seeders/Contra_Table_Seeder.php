<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class Contra_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contras')->insert([
            'admin_id' =>'1',
            'content'=>'<h1>السياسة الخصوصية للموقع</h1>',            
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
    }
}
