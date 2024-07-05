<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\SubSubCategory;

class Sub_Sub_Category_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sub_sub_category=SubSubCategory::create([
            'ar_name'=>'بدون تصنيف',
            'ar_slug'=>'بدون-تصنيف',
            'sub_category_id'=>1,
            'icon'=>'/'
        ]);
    }
}
