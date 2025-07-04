<?php

namespace App\Http\Controllers;

use App\Models\Blog;
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
        $latestBlogs = Blog::where('is_published', 1)->latest()->limit(4)->get();   
        return view('frontend.index', compact('services', 'reviews', 'latestBlogs'));
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

    ########## Blogs Page ##########
    public function blogs(){
        $blogs = Blog::where('is_published', 1)->latest()->paginate(6);
        return view('frontend.blogs', compact('blogs'));
    }
    public function showBlog($slug){
        $blog = Blog::where('slug', $slug)->firstOrFail();
        return view('frontend.blog-details', compact('blog'));
    }
}
