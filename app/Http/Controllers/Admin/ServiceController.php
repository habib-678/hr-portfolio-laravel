<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ServiceController extends Controller
{
    public function index(Request $request)
    {

        if($request->ajax()){
            $services = Service::query();
 
            return DataTables::eloquent($services)->make(true);
        }
        return view('backend.tables.services');
    }
}
