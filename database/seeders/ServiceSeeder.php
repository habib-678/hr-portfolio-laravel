<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Service;
use Illuminate\Support\Facades\Hash;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create(
            [
                'title' => 'Web Development',
                'slug' => 'web-development',
                'description' => 'We offer top-notch web development services to help you build a strong online presence.',
                'image' => '',
                'icon' => '',
            ]
            );
    }
}
