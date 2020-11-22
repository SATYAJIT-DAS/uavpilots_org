<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('users')->delete();
        $password = '123456789';
        $password =  Hash::make($password);
        $records = array();
        for ($i = 0; $i < 100; $i++) {
            $records[$i] = [
                'id' => $i + 1,
                'email' => $faker->email,
                'password' => $password,
            ];
        }
        foreach ($records as $key => $record) {
            # code...
            \App\Models\User::create($record);
        }
    }
}
