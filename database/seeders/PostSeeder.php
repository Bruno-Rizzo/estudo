<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    
    public function run()
    {
        Post::create([
            'title'       => 'Primeiro Post',
            'description' => 'Este é o primeiro post de teste',
            'author'      => 'Bruno Rizzo',
        ]);

        Post::create([
            'title'       => 'Segundo Post',
            'description' => 'Este é o segundo post de teste',
            'author'      => 'Luíza Cristina',
        ]);

        Post::create([
            'title'       => 'Terceiro Post',
            'description' => 'Este é o terceiro post de teste',
            'author'      => 'Luíza Cristina',
        ]);

        Post::create([
            'title'       => 'Quarto Post',
            'description' => 'Este é o quarto post de teste',
            'author'      => 'Ananda Cristina',
        ]);
    }
}
