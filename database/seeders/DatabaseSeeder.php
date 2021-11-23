<?php

namespace Database\Seeders;

use App\Models\Photos;
use App\Models\Results;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        User::factory(10)->create();
        Profile::factory(5)->create();
        Results::factory(5)->create();
        Photos::factory(5)->create();
        Schema::enableForeignKeyConstraints();
        //
//        User::factory(5)->create();

    }
}
