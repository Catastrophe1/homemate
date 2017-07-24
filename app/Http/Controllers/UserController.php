<?php

namespace Homemate\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use Homemate\UserProfile;

class UserController extends Controller
{
    //
    public function profile() {
        $user = Auth::user();
        $userProfile = UserProfile::where('user_id', '=', $user->id)->first();
        return view('profile', array('user' => Auth::user(), 'userProfile' => UserProfile::find($userProfile->id)));
    }
    
    public function update_avatar(Request $request) {
        //Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save(public_path('/uploads/avatars/'.$filename));
            
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
            $userProfile = UserProfile::where('user_id', '=', $user->id)->first();
        }
        return view('profile', array('user' => Auth::user(), 'userProfile' => UserProfile::find($userProfile->id)));
    }
    
    public function update_self_summary(Request $request) {
        if($request->has('self_summary')){
            $selfSummary = $request->input('self_summary');
            
            $user = Auth::user();
            $userProfile = UserProfile::where('user_id', '=', $user->id)->first();
            $userProfile->self_summary = $selfSummary;
            $userProfile->save();
        }
        return view('profile', array('user' => Auth::user(), 'userProfile' => UserProfile::find($userProfile->id)));
    }
}
