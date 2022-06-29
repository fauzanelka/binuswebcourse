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
        if (!\App\Models\User::whereEmail('admin@binuswebcourse.vercel.app')->exists()) {
            \App\Models\User::factory()
                ->create([
                    'name' => 'Admin',
                    'password' => bcrypt('admin'),
                    'email' => 'admin@binuswebcourse.vercel.app',
                    'gender' => 'male',
                    'placeOfBirth' => 'Jakarta',
                    'dateOfBirth' => Carbon::createFromDate('2000/07/02'),
                ])
                ->assignRole('admin');
        }

        if (!\App\Models\User::whereEmail('user@binuswebcourse.vercel.app')->exists()) {
            \App\Models\User::factory()
                ->create([
                    'name' => 'User',
                    'password' => bcrypt('user'),
                    'email' => 'user@binuswebcourse.vercel.app',
                    'gender' => 'male',
                    'placeOfBirth' => 'Jakarta',
                    'dateOfBirth' => Carbon::createFromDate('2000/07/02'),
                ])
                ->assignRole('viewer');
        }

        if (\App\Models\User::all()->count() < 100) {
            \App\Models\User::factory(100)
                            ->create()
                            ->each(function ($user) {
                                $user->assignRole('viewer');
                            });
        }

    }
}
