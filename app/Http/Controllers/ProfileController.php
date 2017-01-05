<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Profile;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user = new Profile;
        $info = $user->get_user_country(Auth::id());
        return view('profile.profile', ['country' => $info[0], 'lang' => $info[1]]);
    }

    public function edit()
    {
        $user = new Profile;
        $info = $user->get_user_country(Auth::id());
        return view('profile.profile-edit', ['country' => $info[0], 'lang' => $info[1]]);
    }
}
