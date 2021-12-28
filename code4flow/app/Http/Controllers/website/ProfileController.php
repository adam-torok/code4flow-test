<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\website\UpdateProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\ToSweetAlert;

class ProfileController extends Controller 
{
    public function index(){
        $user = Auth::user();
        return view('website.profile.index')->with('user', $user);
    }

    public function update(UpdateProfileRequest $request){
        $user = Auth::user();
        $user->fill($request->all());
        $user->save();
        toast()->success('Sikeres profilmódosítás','Sikeresen módosítottad a profilodat!');
        return redirect()->route('profile.index');
    }

    public function show($id){
        $user = User::findOrFail($id);
        return view('website.profile.show', compact('user'));
    }

    public function destroy(){
        $user = Auth::user();
        $user->poems()->delete();
        $user->delete();
        Auth::logout();
        alert()->info('Sikeres profil törlés','Sikeresen törölted a profilodat!');
        return redirect()->route('landing');
    }
}
