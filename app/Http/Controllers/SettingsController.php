<?php

namespace Homemate\Http\Controllers;

use Illuminate\Http\Request;
use Homemate\UserInformation;

class SettingsController extends Controller
{
    //
    private function get_user_info() {
        $user = Auth::user();
        return UserInformation::where('user_id', '=', $user->id)->first();
    }
    
    public function settings() {
        return view('settings');
    }
    
    public function update_info(Request $request) {
        if ($request->has('gender')){
            $userInfo = $this::get_user_info();
            switch ($request->input('gender')){
                case Female:
                    $userInfo->gender = 1;
                case Male:
                    $userInfo->gender = 2;
                default:
                    $userInfo->gender = 0;
            }
            $userInfo->save();
        }
        if ($request->has('months')){
            $userInfo->birth_month = $request->input('months');
            $userInfo->save();
        }
        if ($request->has('days')){
            $userInfo->birth_day = $request->input('days');
            $userInfo->save();
        }
        if ($request->has('years')){
            $userInfo->birth_year = $request->input('years');
            $userInfo->save();
        }
        return redirect('settings');
    }
}
