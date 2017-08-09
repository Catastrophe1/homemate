<?php

namespace Homemate\Http\Controllers;

use Illuminate\Http\Request;

class SettingsController extends Controller
{
    //
    public function settings() {
        return view('settings');
    }
}
