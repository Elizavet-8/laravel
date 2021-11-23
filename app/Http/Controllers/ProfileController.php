<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $profile = Profile::paginate(30);

        return ProfileResource::collection($profile);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        return view('profile.profile-create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
            'json' => 'required',
            'integer' => 'required',

        ], [
            'name.required' => "Ты не достоин создавать профиль без имени!!",
            'name.string' => "ТЕКСТ Б*Я!"
        ]);

        if ($validate->fails()) {
            return route('/create')
                ->withErrors($validate);
        }


        $tmp = (object)$request->all();

        $tmp->boolean = $tmp->boolean == "on" ? true : false;
        $tmp->user_id = (int)$tmp->user_id;


        Profile::create((array)$tmp);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);

        if (is_null($profile))
            return back();

        return view('profile.profile', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $profile = Profile::find($id);

        return view('profile.profile-edit', compact('profile', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        //
        $tmp = (object)$request->all();

        $tmp->boolean = $tmp->boolean == "on" ? true : false;


        $profile->update((array)$tmp);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Profile $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $profile->delete();

        return redirect('/profile');
    }
}
