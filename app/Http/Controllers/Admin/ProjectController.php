<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;  
use App\Models\Service;  
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $projects = Project::query();
 
            return DataTables::eloquent($projects)
            ->editColumn('service_id', function ($row) {
                return $row->service->title;
            })
            ->rawColumns(['service_id'])
            ->make(true);
        }
        $services = Service::all();
        return view('backend.projects.index', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' =>'required|string',
            'project_name'=> 'required|string',
            'description'=> 'nullable|string',
            'client_name'=> 'nullable|string',
            'image'=> 'nullable|image|mimes:jpg,png,jpeg',
            'preview_link'=> 'nullable|string',
            'is_active'=> 'boolean|required',
            'published_at' => 'required|date',
            'duration'=> 'nullable|string'
        ]);

        $project = new Project();

        $project->service_id= $request->service_id;
        $project->project_name = $request->project_name;
        $project->slug = Str::slug($project->project_name);
        $project->description = $request->description;
        $project->client_name = $request->client_name;
        $project->preview_link = $request->preview_link;
        $project->is_active = $request->is_active;
        $project->published_at = $request->published_at;
        $project->duration = $request->duration;

        //if image available
        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = time().'_'.$image->getClientOriginalName();
            $image -> storeAs('projects', $fileName, 'public');

            $project->image = $fileName;
        }

        $project->save();

        return response()->json([
            'success'=> true,
            'message'=> 'New Project Added!'
        ]);
    }

    public function delete($id){
        $project = Project::findOrFail($id);
        $project->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully!'
        ]);
    }
}
