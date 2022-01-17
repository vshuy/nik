<?php

use Illuminate\Database\Seeder;
use Database\Seeders\CategorySeeder;

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
            BrandSeeder::class,
            CategorySeeder::class,
            MemoriesSeeder::class,
            PermissionTableSeeder::class,
            PostCategorySeeder::class,
            RamsSeeder::class,
            UserSeeder::class,
        ]);
    }
}
