<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $reviews = Testimonial::query();
            return DataTables::eloquent($reviews)->make(true);
        }
        return view('backend.testimonials.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_name' => 'required',
            'designation' => 'required',
            'feedback' => 'required',
            'rating' => 'nullable',
            'is_active' => 'boolean|required',
            'client_image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'company_logo' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $testimonial = new Testimonial;
        $testimonial->client_name = $request->client_name;
        $testimonial->designation = $request->designation;
        $testimonial->feedback = $request->feedback;
        $testimonial->rating = $request->rating;
        $testimonial->is_active = $request->is_active;

        //Client Image
        if($request->hasFile('client_image')){
            $image = $request->file('client_image');
            $fileName = time().'_'.$image->getClientOriginalName();
            $testimonial->client_image = $fileName;

            $image->storeAs('testimonial', $fileName, 'public');
        }
        //Company Logo
        if($request->hasFile('company_logo')){
            $image = $request->file('company_logo');
            $fileName = time().'_'.$image->getClientOriginalName();
            $testimonial->company_logo = $fileName;

            $image->storeAs('testimonial', $fileName, 'public');
        }

        $testimonial->save();

        return response()->json([
            'success'=> true,
            'message'=> 'New Review Added Successfully!'
        ]);
    }
    ########### EDIT ############
    public function edit($id){
        $testimonialData = Testimonial::findOrFail($id);

        return response()->json([
            'success'=> true,
            'rowData'=> $testimonialData
        ]);
    }

    ########### UPDATE ############
    public function update(Request $request, $id){
        $request->validate([
            'client_name' => 'required',
            'designation' => 'required',
            'feedback' => 'required',
            'rating' => 'nullable',
            'is_active' => 'boolean|required',
            'client_image' => 'image|mimes:jpg,png,jpeg|max:2048',
            'company_logo' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $testimonial = Testimonial::findOrFail($id);
        $testimonial->client_name = $request->client_name;
        $testimonial->designation = $request->designation;
        $testimonial->feedback = $request->feedback;
        $testimonial->rating = $request->rating;
        $testimonial->is_active = $request->is_active;

        //Image
        if($request->hasFile('client_image')){
            if($testimonial->client_image){
                Storage::disk('public')->delete('testimonial/'.$testimonial->client_image);
            }
            $image = $request->file('client_image');
            $fileName = time().$image->getClientOriginalName();
            $image->storeAs('testimonial', $fileName, 'public');
            $testimonial->client_image = $fileName;
        }
        //Image
        if($request->hasFile('company_logo')){
            if($testimonial->company_logo){
                Storage::disk('public')->delete('testimonial/'.$testimonial->company_logo);
            }
            $image = $request->file('company_logo');
            $fileName = time().$image->getClientOriginalName();
            $image->storeAs('testimonial', $fileName, 'public');
            $testimonial->company_logo = $fileName;
        }
        $testimonial->save();

        return response()->json([
            'success'=> true,
            'message'=> 'Review Updated Succesfully!'
        ]);



    }

    ########### DELETE ############
    public function destroy($id){
        $testimonialRow = Testimonial::findOrFail($id);

        if($testimonialRow->client_image){
            Storage::disk('public')->delete('testimonial/'.$testimonialRow->client_image);
        }
        if($testimonialRow->company_logo){
            Storage::disk('public')->delete('testimonial/'.$testimonialRow->company_logo);
        }

        $testimonialRow->delete();

        return response()->json([
            "success" => true,
            "message" => "Review Deleted Succesfully!"
        ]);
    }
}
