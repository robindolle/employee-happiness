<?php

use App\Vote;
use App\VoteType;
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
        $vote_types = VoteType::pluck('id')->all();
        foreach (range(1, 100) as $index)
        {
            Vote::create([
                'vote_type_id' => $faker->randomElement($vote_types),
                'created_at' => $faker->dateTimeBetween('-1 month', 'now')
            ]);
        }
    }
}
