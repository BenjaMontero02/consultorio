<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RolesControlller extends Controller
{
    
    function store(){
        $users = User::get();
        return view('roles', ['users' => $users]);
    }

    function update(Request $request){
        $user = User::FindOrFail($request->id);
        $user->role = $request->role;
        $user->save();

        return to_route('roles');
    }
}
