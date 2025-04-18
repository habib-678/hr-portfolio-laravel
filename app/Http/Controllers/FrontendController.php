<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Project;

class FrontendController extends Controller
{
    public function index(){
        $services = Service::all();
        $reviews = Testimonial::all();
        $projects = Project::all();
        return view('frontend.index', compact('services', 'reviews', 'projects'));
    }
    public function projectByService($id){
        $projects = Project::where('service_id', $id)->get();
        return view('frontend.index', compact('projects'));
    }

}
