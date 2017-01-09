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

    public function captcha()
    {
        $profile = new Profile;
        $captcha = $profile->getUserCaptcha(Auth::id());
        $word = $profile->getWord(Auth::id());
        $background = $profile->getBackground(Auth::id());
        $logo = $profile->getLogo(Auth::id());
        $draw = $profile->draw(Auth::id());
        $size = $profile->getSize(Auth::id());
        $color = $profile->getColor(Auth::id());
        return view('profile.profile-captcha', [
            'cid' => $captcha,
            'err' => '',
            'word' => $word,
            'background' => $background,
            'logo' => $logo,
            'draw' => $draw,
            'background_width' => $size['background_width'],
            'background_height' => $size['background_height'],
            'logo_width' => $size['logo_width'],
            'logo_height' => $size['logo_height'],
            'color' => $color,
        ]);
    }
    
    public function create()
    {
        $profile = new Profile;
        $profile->createUserCaptcha(Auth::id());
        return redirect('profile/captcha/');
    }

    public function save(Request $request)
    {
        $background_width = $request->input('background_width');
        $background_height = $request->input('background_height');
        $logo_width = $request->input('logo_width');
        $logo_height = $request->input('logo_height');
        $word = $request->input('word');
        $textcolor = $request->input('textcolor');
        $user_id = Auth::id();
        $profile = new Profile;
        $info = $profile->saveChanges($user_id,$word,$_FILES,$background_width,$background_height,$logo_width,$logo_height,$textcolor);
        $draw = $profile->draw(Auth::id());
        $info['draw'] = $draw;
        return json_encode($info);
    }
}
