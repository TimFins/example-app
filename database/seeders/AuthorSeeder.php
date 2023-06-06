<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Author;
use Carbon\Carbon;

class AuthorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'first_name' => 'William',
            'last_name' => 'Shakespeare',
            'birthdate' => Carbon::create(1564, 4, 26),
        ]);

        Author::create([
            'first_name' => 'Jane',
            'last_name' => 'Austen',
            'birthdate' => Carbon::create(1775, 12, 16),
        ]);
    }
}
