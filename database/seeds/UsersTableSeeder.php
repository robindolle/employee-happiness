<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Robin Dollé',
            'email' => 'info@robindolle.be',
            'password' => bcrypt('Guc62XDi')
        ]);
    }
}
