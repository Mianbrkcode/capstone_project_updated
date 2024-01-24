<?php

namespace App\Http\Controllers\sector;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show(){

        $id = Auth::user()->id;
        $profiledata = User::find($id);        
        
        return view('sector.profile', compact('profiledata'));

    }

    




    public function update(Request $request){
        
        $id = Auth::user()->id;
        $user = User::find($id);

        $request->validate([
            'responder_name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id), // Ignore the current user's email
            ],
            // Add more validation rules for other fields
        ]);

        $user->update([
            'responder_name' => $request->input('responder_name'),
            'email' => $request->input('email'),
            // Add more fields as needed
        ]);
        return redirect()->back()->with('success-bt', 'Profile updated successfully');

    }

}
