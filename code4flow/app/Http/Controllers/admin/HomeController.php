<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Poem;
use App\Models\Report;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $newPoems = Poem::whereBetween('created_at', [Carbon::now()->subDays(5), Carbon::now()])->get();
        $newUsers = User::whereBetween('created_at', [Carbon::now()->subDays(5), Carbon::now()])->get();

        $users = User::all();
        $poems = Poem::all();
        $reports = Report::all();
        return view('admin.home', compact('users', 'poems', 'reports', 'newPoems', 'newUsers'));
    }
}
