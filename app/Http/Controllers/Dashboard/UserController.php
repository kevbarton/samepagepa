<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Datatables;

class UserController extends Controller
{
    function index(Request $request){
        return view('admin.users.index');
    }

    function create(Request $request){
        return view('admin.users.create');
    }

    function save(Request $request){
        
        return redirect(route('dashboard.users.index'));
    }

    function edit(Request $request, User $user){
        return view('admin.users.edit',['user'=>$user]);
    }

    function update(Request $request, User $user){
        return redirect(route('dashboard.users.index'));
    }

    function delete(Request $request, User $user){
        $user->delete();
        return redirect(route('dashboard.users.index'));
    }

    function list(Request $request){

    }
}
