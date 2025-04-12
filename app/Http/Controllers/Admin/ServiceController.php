<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    ############### Service Index ###############
    public function index(Request $request)
    {

        if($request->ajax()){
            // Fetching data from the Service model
            $services = Service::query();
 
            return DataTables::eloquent($services)
            // Formating Date
            ->addColumn('created_at', function($services){
                return ($services->created_at)->format('Y-m-d');
            })
            ->make(true);
        }
        return view('backend.services.index');
    }

    ############### Service Store ###############
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Storing Data in the Database
        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->slug = Str::slug($request->title);


        $image = $request->file('image');
        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            // Store the image and get the path
            $filename = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('services', $filename, 'public');
            // Save the image path to the database
            $service->image = $filename;
        }

        $service->save();

        return response()->json([
            'success' => true,
            'message' => 'Service added successfully!'
        ]);
    }

    ############### Service Edit ###############
    public function edit($id)
    {
        // Find the service by ID
        $service = Service::findOrFail($id);

        // Return the service data as JSON
        return response()->json([
            'success' => true,
            'data' => $service
        ]);
    }

    ############### Service Update ###############
    public function update(Request $request, $id){
        // Form Validation
        $request->validate([
            'title'=> 'required|string',
            'description'=> 'required|string',
            'image'=> 'nullable|image|mimes:png,png,jpeg|max:2048'
        ]);

        $service = Service::findOrFail($id);
        $service->title = $request->title;
        $service->description = $request->description;
        $service->slug = Str::slug($request->title);

        // Delete Old and Add Uploaded Image
        if($request->hasFile('image')){
            if($service->image){
                Storage::disk('public')->delete('services/'. $service->image);
            }
            
            // Add New Image
            $fileName = time().'_'.$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('services', $fileName, 'public');

            $service->image = $fileName;
        }
        $service->save();

        return response()->json([
            'success' => true,
            'message' => 'Update Successfull!'
        ]);
        
    }
    
    ############### Service DELETE ###############
    public function destroy($id){
        // Find the service by ID
        $service = Service::findOrFail($id);

        // Delete the image from storage if it exists
        if ($service->image) {
            Storage::disk('public')->delete('services/' . $service->image);
        }

        // Delete the service from the database
        $service->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully!'
        ]);
    }

}
