<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\PostsProject;
use App\Models\Student;
use App\Models\Academic;
use CreateAcademicTable;
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
            PermissionSeeder::class,
            RoleSeeder::class,
            RoleHasPermissionSeeder::class,
            UserSeeder::class,
        ]);
        
        Career::factory(30)->create();
        //$this->call(UserSeeder::class);
        Student::factory(99)->create();
        Academic::factory(50)->create();
        PostsProject::factory(50)->create();

    }
}
