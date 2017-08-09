<?php

namespace Homemate\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Image;
use Homemate\UserProfile;
use Homemate\UserInformation;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    //
    private function get_user_profile() {
        $user = Auth::user();
        return UserProfile::where('user_id', '=', $user->id)->first();
    }
    
    private function get_user_info() {
        $user = Auth::user();
        return UserInformation::where('user_id', '=', $user->id)->first();
    }
    
    public function profile() {
        return view('profile', array('user' => Auth::user(), 
            'userProfile' => $this::get_user_profile(),
            'userInfo' => $this::get_user_info()));
    }
    
    public function update_avatar(Request $request) {
        //Handle the user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save('storage/avatars/'.$filename);
            $user = Auth::user();
            $oldFilename = $user->avatar;
            if($oldFilename != 'default.jpg'){
                Storage::delete('/public/avatars/'.$oldFilename);
            }
            $user->avatar = $filename;
            $user->save();
        }
        return view('profile', array('user' => Auth::user(), 
            'userProfile' => $this::get_user_profile(), 
            'userInfo' => $this::get_user_info()));
    }
    
    public function update_profile(Request $request) {
        if($request->has('self_summary')){
            $selfSummary = $request->input('self_summary');
            
            $userProfile = $this::get_user_profile();
            $userProfile->self_summary = $selfSummary;
            $userProfile->save();
        }
        
        if($request->has('homemate_preference')){
            $homematePreference = $request->input('homemate_preference');
            
            $userProfile = $this::get_user_profile();
            $userProfile->homemate_preference = $homematePreference;
            $userProfile->save();
        }
        
        if($request->has('house_preference')){
            $housePreference = $request->input('house_preference');
            
            $userProfile = $this::get_user_profile();
            $userProfile->house_preference = $housePreference;
            $userProfile->save();
        }
        return view('profile', array('user' => Auth::user(), 
            'userProfile' => $this::get_user_profile(), 
            'userInfo' => $this::get_user_info()));
    }
    
    public function update_info(Request $request) {
        
    }
}
