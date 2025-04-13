<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index(Request $request){
        if($request->ajax(){
            dd:($request->all());
        })
        return view('backend.projects.index');
    }
}
