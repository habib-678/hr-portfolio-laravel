<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::create([
            "client_name" => "Habib",
            "designation" => "Chief Executive Officer",
            "feedback" => "We have worked with Clevpro on various projects and found them to provide quality services and expertise for our programming needs. It's rare to find a service provider with such professional dedication - you are a valued service provider to our company!",
            "rating" => 4.5,
            "client_image" => "default.img",
            "company_logo" => "default.img",
        ]);
    }
}
