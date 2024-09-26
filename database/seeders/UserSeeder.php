<?php

namespace Database\Seeders;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         User::factory()
            ->asSuperAdmin()
            ->has(Todo::factory()->count(50))
             ->create([
             'name' => 'Rasyidi',
             'email' => 'rasyidialwee@gmail.com',
            ]);

         User::factory(2)
            ->asUser()
             ->has(Todo::factory()->count(50))
             ->create();
    }
}
