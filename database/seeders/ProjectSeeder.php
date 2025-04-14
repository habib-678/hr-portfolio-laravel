<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create(
            [
                'service_id'   => '3',
                'project_name'  => 'Buildela Website',
                'slug'          => 'buildela-website',
                'description'   => 'A custom Laravel + Bootstrap website for tradespeople.',
                'client_name'   => 'Habib',
                'image'         => 'default.png',
                'preview_link'  => 'https://buildela.com',
                'published_at'  => '10 Jan 2022',
                'is_active'     => true,
                'duration'      => '1 month',
            ]
        );
    }
}
