<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@binuswebcourse.vercel.app',
            'gender' => 'male',
            'placeOfBirth' => 'Jakarta',
            'dateOfBirth' => Carbon::createFromDate('2000/07/02'),
        ]);

        \App\Models\User::factory(100)->create();
    }
}
