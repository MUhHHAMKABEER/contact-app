<?php

namespace App\Http\Controllers\Settings;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function edit(){

        $user = auth()->user();

        // dd($user);

        return view('settings.profile', compact('user'));

    }

    public function update(ProfileUpdateRequest $request)
    {

        $profileData = $request->handleRequest($request);

        // dd($profileData);


        $request->user()->update($profileData);

        return back()->with('messege', "PROFILE HAS BEEN UPDATED SUCESSFULLY");



    }


}
