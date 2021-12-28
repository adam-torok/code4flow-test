<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Http\Requests\website\StorePoemRequest;
use App\Http\Requests\website\UpdatePoemRequest;
use App\Models\Category;
use App\Models\Poem;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\ToSweetAlert;

class PoemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $poems = Poem::where('user_id', '=', Auth::user()->id)->paginate(10);
        return view('website.poems.index',compact('poems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = Auth::user();
        if($user->isDisabled()){
            toast()->success('Fiókod felvan függesztve!','Sajnálatos módon fiókodat felgüggesztettük. Ez idő alatt nem hothatsz létre új verseket!');
            return redirect()->route('user-poems.index');
        }
        $categories = Category::all();
        return view('website.poems.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePoemRequest $request)
    {
        $poem = new Poem($request->all());
        $poem->user_id = Auth::user()->id;
        $poem->category_id = $request->category;
        $poem->save();
        toast()->success('Sikeresen beküldted a versedet!','Már csak azt kell megvárnod, hogy adminisztrátorunk engedélyezze a publikus megjelenést');
        return redirect()->route('user-poems.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poem = Poem::findOrFail($id);
        $categories = Category::all();
        return view('website.poems.edit',compact('poem', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePoemRequest $request, $id)
    {
        $poem = Poem::findOrFail($id);
        $poem->fill($request->all());
        $poem->category_id = $request->category;
        $poem->save();
        toast()->success('Sikeresen módosítottad a versedet!');
        return redirect()->route('user-poems.edit',$poem->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poem = Poem::findOrFail($id);
        $poem->delete();
        toast()->success('Sikeresen törölted a versedet!');
        return redirect()->route('user-poems.index');
    }
}
