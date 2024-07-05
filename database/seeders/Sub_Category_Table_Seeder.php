<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\SubCategory;

class Sub_Category_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_category=SubCategory::create([
            'ar_name'=>'بدون تصنيف',
            'ar_slug'=>'بدون-تصنيف',
            'category_id'=>1,
            'icon'=>'/'
        ]);
    }
}
