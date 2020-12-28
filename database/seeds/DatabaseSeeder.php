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
        $this->call([
            RoleTableSeeder::class,
            AgenceTableSeeder::class,
            UserTableSeeder::class,
            GenreTableSeeder::class,
            DossierTableSeeder::class,
            ActionTableSeeder::class,
            AnomalieTableSeeder::class,
            DeblocageTableSeeder::class,
            EcheanceTableSeeder::class,
            GarantieTableSeeder::class,
            ImpayeTableSeeder::class,
            CreditTableSeeder::class,
            SituationTableSeeder::class,
            ClientTableSeeder::class,
        ]);
    }
}
