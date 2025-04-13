<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;  
use Yajra\DataTables\Facades\DataTables;

class ProjectController extends Controller
{
    public function index(Request $request){
        if($request->ajax()){
            $projects = Project::query();
 
            return DataTables::eloquent($projects)
            ->addColumn('created_at', function($projects){
                return ($projects->created_at)->format('D, M Y');
            })
            ->make(true);
        }
        return view('backend.projects.index');
    }
}
