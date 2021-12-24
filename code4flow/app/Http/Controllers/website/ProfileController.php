<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\website\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(){
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

    public function show(User $user){
        return view('website.profile.show', compact('user'));
    }

    public function delete(){
        $user = Auth::user();
        $user->poems()->delete();
        $user->delete();
        Auth::logout();
        return redirect()->route('landing')->with('success', 'Sikeres fióktörlés');
    }
}
