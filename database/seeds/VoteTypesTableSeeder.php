<?php

use App\VoteType;
use Illuminate\Database\Seeder;

class VoteTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        VoteType::create([
            'name' => 'Smile',
            'description' => 'I had a fantastic day.',
            'color' => 'success',
            'icon' => 'fa-smile-o'
        ]);

        VoteType::create([
            'name' => 'Meh',
            'description' => 'I had a good day.',
            'color' => 'warning',
            'icon' => 'fa-meh-o'
        ]);

        VoteType::create([
            'name' => 'Frown',
            'description' => 'I had a bad day.',
            'color' => 'danger',
            'icon' => 'fa-frown-o'
        ]);
    }
}
