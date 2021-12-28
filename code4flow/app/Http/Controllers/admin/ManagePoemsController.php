<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UpdatePoemRequest;
use App\Models\Category;
use App\Models\Poem;
use App\Notifications\PoemStatusChange;
use Carbon\Carbon;

class ManagePoemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newPoems = Poem::whereBetween('created_at', [Carbon::now()->subDays(5), Carbon::now()])->get();
        $poems = Poem::paginate(10);
        return view('admin.poems.index',compact('poems', 'newPoems'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $poem = Poem::findOrFail($id);
        return view('admin.poems.edit',compact('poem', 'categories'));
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

        switch ($request->status) {
            case 'WAITING':
                $poem->status = $poem->setWaiting();
                break;
            case 'APPROVED':
                    $poem->status = $poem->setApproved();
                    break;
            case 'DECLINED':
                $poem->status = $poem->setDeclined();
                break;
        }

        $user = $poem->user;
        $user->notify((new PoemStatusChange($poem)));
        $poem->save();
        alert()->success('Sikeresen szerkesztetted '. $poem->title . ' verset');
        return redirect()->route('admin:poems.edit',$poem->id);
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
        alert()->success('Sikeresen törölted a verset!');
        return redirect()->route('admin:poems.index');
    }
}
