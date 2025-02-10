<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisteredUserController extends Controller
{
    public function create(){
        return view('auth.register');
    }


    public function store(){
        $validated=request()->validate(['first_name'=>['required'], 'last_name'=>['required'],'email'=>['required','email'],
        'password'=>['required'], Password::default(),'confirmed']);

        $user=User::create($validated);
        
        Auth::login($user);

        return redirect('/jobs');
            
    }
}
