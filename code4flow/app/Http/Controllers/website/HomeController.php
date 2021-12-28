<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Poem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $poems = Poem::where('status', '=', 'APPROVED')->limit(6)->get();
        return view('website.home', compact('poems'));
    }

    public function poems(){
        $poems = Poem::where('status', '=', 'APPROVED')->simplePaginate(6);
        return view('website.poems', compact('poems'));
    }

    public function showNotifications(){
        $notifications = Auth::user()->notifications;
        return view('website.notifications', compact('notifications'));
    }
    
    public function deleteNotifications(){
        Auth::user()->notifications()->delete();
        toast()->success('Sikeresen törölted a értesítéseidet!');
        return redirect()->route('notifications');
    }
}
