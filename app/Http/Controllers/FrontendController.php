<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Testimonial;
use App\Models\Project;
use App\Models\Contact;

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

    ########## Contact Page ##########
    public function contact(){
        return view('frontend.contact');
    }
    public function contactSubmit(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject ?? null;
        $contact->message = $request->message;
        $contact->save();

        return response()->json([
            'success' => true,
            'message' => 'Thank you for contacting us!'
        ]);
    }


    ########## Projects Page ##########
    public function projects(){
        $projects = Project::latest()->paginate(6);
        return view('frontend.projects', compact('projects'));
    }
}
