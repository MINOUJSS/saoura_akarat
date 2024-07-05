<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Category;

class Category_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=category::create([
            'ar_name'=>'بدون تصنيف',
            'ar_slug'=>'بدون-تصنيف',
            // 'image'=>'/',
            //'icon'=>'/'
        ]);
    }
}
