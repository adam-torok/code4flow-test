<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\website\UpdateProfileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show(){
        $user = Auth::user();
        return view('website.profile.index')->with('user', $user);
    }

    public function update(UpdateProfileRequest $request){

        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->second_name = $request->second_name;
        $user->save();
        return redirect()->route('profile')->with('success', 'Sikeres adatmodositas');
    }

    public function delete(){

    }
}
