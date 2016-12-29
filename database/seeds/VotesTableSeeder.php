<?php

use App\Vote;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 100) as $index)
        {
            Vote::create([
                'vote' => $faker->randomElement(array('smile', 'meh', 'frown')),
                'created_at' => $faker->dateTimeBetween('-1 month', 'now')
            ]);
        }
    }
}
