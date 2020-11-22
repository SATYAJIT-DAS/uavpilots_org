<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('user_data')->delete();
        $records = array();
        for ($i = 0; $i < 100; $i++) {
            $records[$i] = [
                'user_id' => $i + 1,
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
                'description' => $faker->text(10),
                'state' => $faker->state,
                'country' => $faker->country,
                'industry' => $faker->company,
            ];
        }

        foreach ($records as $key => $record) {
            # code...
            \App\Models\UserData::create($record);
        }
    }
}
