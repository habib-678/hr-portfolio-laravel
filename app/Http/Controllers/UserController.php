<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function users()
    {
        return view('users');
    }
    public function data(Request $request){
        if($request->ajax()){
            $users = User::query();
            
            return DataTables::eloquent($users)
            // Add Index Column
            ->addIndexColumn()
            // Date Formation
            ->addColumn('created_at', function($user){
                return ($user->created_at)->format('Y-m-d');
            })
            // Add Action Column
            ->addColumn('action', function($user){
                return '
                <a href="'.route('user.edit', $user->id).'" class="btn btn-success btn-sm">Edit</a>
                <button data-id="'.$user->id.'" class="btn btn-danger btn-sm delete-user">Delete</button>
                <a href="'.route('user.view', $user->id).'" class="btn btn-primary btn-sm">View</a>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
        }
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        dd($user);
        // return view('user.edit', compact('user'));
    }
    public function view($id)
    {
        $user = User::findOrFail($id);
        return view('user.view', compact('user'));
    }   
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json([
            'status' => 'success',
            'success' => 'User deleted successfully.'
        ]);
    }
}
