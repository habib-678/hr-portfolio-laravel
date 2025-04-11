<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
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
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string'
        ]);

        $service = new Service();
        $service->title = $request->title;
        $service->description = $request->description;
        $service->slug = Str::slug($request->title);


        $service->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Service added successfully!'
        ]);
    }

}
