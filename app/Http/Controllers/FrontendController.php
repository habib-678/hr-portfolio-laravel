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
        return view('frontend.index', compact('services', 'reviews'));
    }
    public function getProjects($id){
        $projects = Project::where('service_id', $id)->get();
        return view('frontend.partials.project', compact('projects'));
    }

}
