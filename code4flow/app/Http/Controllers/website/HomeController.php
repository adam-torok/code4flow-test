<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Poem;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('website.home');
    }

    public function poems(){
        $poems = Poem::where('status', '=', 'APPROVED')->simplePaginate(6);
        return view('website.poems', compact('poems'));
    }
}
