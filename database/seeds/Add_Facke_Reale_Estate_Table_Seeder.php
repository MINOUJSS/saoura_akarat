<?php

use Illuminate\Database\Seeder;

class Add_Facke_Reale_Estate_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //----------add apartment شقة------------
        DB::table('real_eestates')->insert([
            'name'=>'Amine',
            'phone'=>'0662752052',
            'type' =>'شقة',
            'rooms'=>'F2',
            'baths'=>'1',
            'etages'=>'الطابق الأول',
            // 'etage_number'=>'NULL',
            // 'facad'=>'NULL',
            'furnished'=>'مفروش',
            'property'=>'ملكية',
            'transaction'=>'للكراء',
            'price'=>'5000',
            'wilaya'=>'بشار',
            'dayra'=>'بشار',
            'baladia'=>'بشار',
            // 'address'=>'NULL',
            // 'google_map_code'=>'NULL',
            // 'description'=>'NULL',
            // 'rolls'=>'NULL',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        //----------add home منزل------------
        DB::table('real_eestates')->insert([
            'name'=>'Amine',
            'phone'=>'0662752052',
            'type' =>'منزل',
            // 'rooms'=>'NULL',
            'baths'=>'1',
            // 'etages'=>'NULL',
            // 'etage_number'=>'NULL',
            // 'facad'=>'NULL',
            'furnished'=>'مفروش',
            'property'=>'ملكية',
            'transaction'=>'للكراء',
            'price'=>'5000',
            'wilaya'=>'بشار',
            'dayra'=>'بشار',
            'baladia'=>'بشار',
            // 'address'=>'NULL',
            // 'google_map_code'=>'NULL',
            // 'description'=>'NULL',
            // 'rolls'=>'NULL',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        //----------add studio ستيديو------------
        DB::table('real_eestates')->insert([
            'name'=>'Amine',
            'phone'=>'0662752052',
            'type' =>'ستيديو',
            'rooms'=>'F1',
            'baths'=>'1',
            'etages'=>'الطابق الأول',
            // 'etage_number'=>'NULL',
            // 'facad'=>'NULL',
            'furnished'=>'مفروش',
            'property'=>'ملكية',
            'transaction'=>'للكراء',
            'price'=>'5000',
            'wilaya'=>'بشار',
            'dayra'=>'بشار',
            'baladia'=>'بشار',
            // 'address'=>'NULL',
            // 'google_map_code'=>'NULL',
            // 'description'=>'NULL',
            // 'rolls'=>'NULL',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        //----------add farme مزرعة------------
        DB::table('real_eestates')->insert([
            'name'=>'Amine',
            'phone'=>'0662752052',
            'type' =>'مزرعة',
            // 'rooms'=>'NULL',
            // 'baths'=>'1',
            // 'etages'=>'NULL',
            // 'etage_number'=>'NULL',
            // 'facad'=>'NULL',
            // 'furnished'=>'مفروش',
            // 'property'=>'ملكية',
            'transaction'=>'للكراء',
            'price'=>'5000',
            'wilaya'=>'بشار',
            'dayra'=>'بشار',
            'baladia'=>'بشار',
            // 'address'=>'NULL',
            // 'google_map_code'=>'NULL',
            // 'description'=>'NULL',
            // 'rolls'=>'NULL',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        //----------add land أرض------------
        DB::table('real_eestates')->insert([
            'name'=>'Amine',
            'phone'=>'0662752052',
            'type' =>'أرض',
            // 'rooms'=>'NULL',
            // 'baths'=>'1',
            // 'etages'=>'NULL',
            // 'etage_number'=>'0',
            'facad'=>'واجهة واحدة',
            // 'furnished'=>'مفروش',
            'property'=>'ملكية',
            'transaction'=>'للكراء',
            'price'=>'5000',
            'wilaya'=>'بشار',
            'dayra'=>'بشار',
            'baladia'=>'بشار',
            // 'address'=>'NULL',
            // 'google_map_code'=>'NULL',
            // 'description'=>'NULL',
            // 'rolls'=>'NULL',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        //----------add home محل------------
        DB::table('real_eestates')->insert([
            'name'=>'Amine',
            'phone'=>'0662752052',
            'type' =>'محل',
            // 'rooms'=>'NULL',
            // 'baths'=>'1',
            'etages'=>'الطابق الأرضي',
            // 'etage_number'=>'NULL',
            // 'facad'=>'NULL',
            // 'furnished'=>'مفروش',
            // 'property'=>'ملكية',
            'transaction'=>'للكراء',
            'price'=>'5000',
            'wilaya'=>'بشار',
            'dayra'=>'بشار',
            'baladia'=>'بشار',
            // 'address'=>'NULL',
            // 'google_map_code'=>'NULL',
            // 'description'=>'NULL',
            // 'rolls'=>'NULL',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        //----------add bureau مكتب------------
        DB::table('real_eestates')->insert([
            'name'=>'Amine',
            'phone'=>'0662752052',
            'type' =>'مكتب',
            // 'rooms'=>'NULL',
            // 'baths'=>'1',
            'etages'=>'الطابق الأرضي',
            // 'etage_number'=>'NULL',
            // 'facad'=>'NULL',
            // 'furnished'=>'مفروش',
            // 'property'=>'ملكية',
            'transaction'=>'للكراء',
            'price'=>'5000',
            'wilaya'=>'بشار',
            'dayra'=>'بشار',
            'baladia'=>'بشار',
            // 'address'=>'NULL',
            // 'google_map_code'=>'NULL',
            // 'description'=>'NULL',
            // 'rolls'=>'NULL',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
    }
}
