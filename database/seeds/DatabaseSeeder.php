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
            //Admin_table_seeder::class,
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
            Baladia_Table_Seeder::class

        ]);
    }
}
