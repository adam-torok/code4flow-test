<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UpdateUserRequest;
use App\Models\User;
use Carbon\Carbon;

class ManageUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newUsers = User::whereBetween('created_at', [Carbon::now()->subDays(5), Carbon::now()])->orderBy('created_at','desc')->get();
        $users = User::orderBy('created_at','desc')->get();
        return view('admin.users.index',compact('users', 'newUsers'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.show',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->fill($request->all());
        $user->save();
        alert()->success('Sikeresen szerkesztetted '. $user->second_name . ' profilját');
        return redirect()->route('admin:users.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        $user->poems()->delete();
        $user->reports()->delete();
        alert()->success('Sikeresen törölted '. $user->second_name . ' profilját');
        return redirect()->route('admin:users.index');
    }

    // Enable or disable user
    public function toggleUser($id){
        $user = User::findOrFail($id);
        $user->isDisabled() ? $user->is_disabled = false : $user->is_disabled = true;
        $user->save();
        alert()->success('Sikeresen módosítottad '. $user->second_name . ' profilját');
        return redirect()->route('admin:users.show',$id);
    }
}
