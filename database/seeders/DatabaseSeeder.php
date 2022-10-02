<?php
namespace Database\Seeders;
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
        $this->call(\Database\Seeders\UserTableSeeder::class);
        $this->call(\Database\Seeders\RoleTableSeeder::class);
        $this->call(\Database\Seeders\CategoryTableSeeder::class);
        $this->call(\Database\Seeders\DepartmentTableSeeder::class);
        $this->call(\Database\Seeders\CategoryUserTableSeeder::class);
    }
}
