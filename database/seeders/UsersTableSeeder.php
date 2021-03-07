<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            DB::table('users')->insert([
                'givenName' => $faker->name,
                'email' => $faker->email,
                'familyName' => $faker->name,
                'created_at'=> now(),
                'password'=>$faker->password,
            ]);
        }
    }
}
