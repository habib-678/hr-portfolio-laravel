<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;  
use App\Models\Service;  
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    ########### Index #############
    public function index(Request $request){
        if($request->ajax()){
            $projects = Project::with('service');
 
            return DataTables::eloquent($projects)
            ->editColumn('service_id', function ($row) {
                return $row->service?->title ?? '<span class="text-muted">N/A</span>';
            })
            ->editColumn('is_active', function($row){
                 if($row->is_active){
                    return '<span class="badge badge-light-success">Active</span>';
                 }else{
                    return '<span class="badge badge-light-danger">Inactive</span>';
                 }
            })
            ->rawColumns(['service_id', 'is_active'])
            ->make(true);
        }

        $services = Service::all();
        return view('backend.projects.index', compact('services'));
    }

    ########## Storing ###########
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
    ########### Edit #############
    public function edit($id){
        $project = Project::findOrFail($id);

        return response()->json([
            'success' => true,
            'data' => $project,
            'message' => 'edit tab opened'
        ]);
    }

    ########### Update #############
    public function update(Request $request, $id){
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
        $project = Project::findOrFail($id);

        $project->service_id= $request->service_id;
        $project->project_name = $request->project_name;
        $project->slug = Str::slug($project->project_name);
        $project->description = $request->description;
        $project->client_name = $request->client_name;
        $project->preview_link = $request->preview_link;
        $project->is_active = $request->is_active;
        $project->published_at = $request->published_at;
        $project->duration = $request->duration;

        if($request->hasFile('image')){
            if($project->image){
                Storage::disk('public')->delete('projects/'. $project->image);
            }
            $image = $request->file('image');
            $fileName = time().'_'.$image->getClientOriginalName();
            $image->storeAs('projects', $fileName, 'public');

            $project->image = $fileName;
        }

        $project->save();

        return response()->json([
            'success' => true,
            'message' => 'Project Updated Succesfully!'
        ]);

    }

    public function delete($id){
        $project = Project::findOrFail($id);
        if($project->image){
            Storage::disk('public')->delete('projects/'. $project->image);
        }
        $project->delete();

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully!'
        ]);
    }
}
