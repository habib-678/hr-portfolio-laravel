<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    ############# Index ##############
    public function index(){
        return view('backend.blogs.index');
    }
}
