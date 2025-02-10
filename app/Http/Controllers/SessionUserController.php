<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Validator;

class SessionUserController extends Controller
{
public function login(){
    return view('auth.login');
}

public function destroy(){

Auth::logout();

return redirect('/');


}

public function store(){

    $validated=request()->validate(['email'=>['required','email'],'password'=>['required']]);

    if (! Auth::attempt($validated)){
        throw ValidationException::withMessages(['email'=>'Sorry, these credentials do not match']);
    }
    request()->session()->regenerate();

    return redirect('/jobs');

}



}
