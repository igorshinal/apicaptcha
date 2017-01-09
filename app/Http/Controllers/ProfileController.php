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
        return view('profile.profile');
    }

    public function create()
    {
        $profile = new Profile;
        $profile->createUserCaptcha(Auth::id());
        return redirect('profile/captcha/');
    }

    public function captcha()
    {
        $profile = new Profile;
        $captcha = $profile->getUserCaptcha(Auth::id());
        $word = $profile->getWord(Auth::id());
        $background = $profile->getBackground(Auth::id());
        $logo = $profile->getLogo(Auth::id());
        $logopos = $profile->getLogopos(Auth::id());
        $draw = $profile->draw(Auth::id(),$logopos);
        $color = $profile->getColor(Auth::id());
        return view('profile.profile-captcha', [
            'cid' => $captcha,
            'err' => '',
            'word' => $word,
            'background' => $background,
            'logo' => $logo,
            'draw' => $draw,
            'color' => $color,
        ]);
    }

    public function save(Request $request)
    {
        $word = $request->input('word');
        $textcolor = $request->input('textcolor');
        $dfont = $request->input('dfont');
        $logopos = $request->input('logopos');
        $user_id = Auth::id();
        $profile = new Profile;
        $info = $profile->saveChanges($user_id,$word,$_FILES,$textcolor,$dfont);
        $draw = $profile->draw(Auth::id(), $logopos);
        $info['draw'] = $draw;
        return json_encode($info);
    }
}
