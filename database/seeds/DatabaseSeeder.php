<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call([
            Admin_Table_Seeder::class,
            // User_Table_Seeder::class,
            Garages_Table_seeder::class,
            RealeEstate_Type_Table_Seeder::class,
            Tronsactions_Table_Seeder::class,
            Rooms_Table_Seeder::class,
            Properties_Table_Seeder::class,
            Furnisheds_Table_Seeder::class,
            Facads_Table_Seeder::class,
            Etages_Table_Seeder::class,
            Bathes_Table_Seeder::class,
            Category_Table_Seeder::class,
            Sub_Category_Table_Seeder::class,
            Sub_Sub_Category_Table_Seeder::class,
            Wilaya_Table_Seeder::class,
            Dayra_Table_Seeder::class,
            Baladia_Table_Seeder::class,
            Etage_Number_Table_Seeder::class,
            Contra_Table_Seeder::class,
            //-------test data
            Add_Facke_Reale_Estate_Table_Seeder::class,
            Add_Facke_image_to_Reale_Estate_Table_Seeder::class

        ]);
    }
}
