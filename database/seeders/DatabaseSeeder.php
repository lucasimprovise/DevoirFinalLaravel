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
        // \App\Models\User::factory(10)->create();
        $user = new User;
        $user->name = 'Lucas';;
        $user->email ='lucas.sevault@ynov.com';
        $user->password=bcrypt('289cd6e23c');
        $user->save();
    }
}
