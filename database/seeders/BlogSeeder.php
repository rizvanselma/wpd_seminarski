<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::factory()->create([
            'name' => 'Selma Rizvan',
            'email' => 'karadza3006@gmail.com',
        ]);

        Blog::factory(10)->create([
            'author_id' => $user->id
        ]);
    }
}
