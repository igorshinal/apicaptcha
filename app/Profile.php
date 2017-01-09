<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;

class Profile extends Model
{
    public function get_user_country($id)
    {
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $country = DB::select('select * from users LEFT JOIN countries ON users.country = countries.code  where id = ?',[$id])[0];
        $lang = DB::select('select * from users LEFT JOIN lang ON users.lang = lang.alpha2 where id = ?',[$id])[0];
        $country = $country['name'];
        $lang = $lang['name'];
        return array($country,$lang);
    }

    public function getUserCaptcha($id)
    {
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $captcha_exist = DB::select('select captcha_id from users where id = ?',[$id])[0];
            return $captcha_exist['captcha_id'];

    }

    public function createUserCaptcha($id)
    {
        $captcha_exist = $this->getUserCaptcha($id);
        if($captcha_exist != 0)
            return false;

        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $captcha_id = DB::table('company')->insertGetId(array('user_id' => $id, 'textcolor' => 'ffffff', 'font' => 'fonts/bellb.ttf'));
        DB::table('users')
            ->where('id', $id)
            ->update(['captcha_id' => $captcha_id]);
        return $captcha_id;
    }
    public function getWord($id)
    {
        DB::setFetchMode(\PDO::FETCH_ASSOC);

        if($this->getUserCaptcha($id) != 0)
        {
            $word = DB::select('select company_code from company where user_id = ?',[$id])[0];
            return $word['company_code'];
        }
            return;
    }
    public function getBackground($id)
    {
        DB::setFetchMode(\PDO::FETCH_ASSOC);

        if($this->getUserCaptcha($id) != 0)
        {
            $background = DB::select('select background from company where user_id = ?',[$id])[0];
            return 'http://'.$_SERVER['SERVER_NAME'].'/'.$background['background'];
        }
        return;
    }
    public function getLogo($id)
    {
        DB::setFetchMode(\PDO::FETCH_ASSOC);

        if($this->getUserCaptcha($id) != 0)
        {
            $logo = DB::select('select logo from company where user_id = ?',[$id])[0];
            return 'http://'.$_SERVER['SERVER_NAME'].'/'.$logo['logo'];
        }
        return;
    }

    public function getSize($id)
    {
        DB::setFetchMode(\PDO::FETCH_ASSOC);

        if($this->getUserCaptcha($id) != 0)
        {
            $size = DB::select('select background_width,background_height,logo_width,logo_height from company where user_id = ?',[$id])[0];
            return $size;
        }
        return;
    }

    public function getColor($id)
    {
        DB::setFetchMode(\PDO::FETCH_ASSOC);

        if($this->getUserCaptcha($id) != 0)
        {
            $color = DB::select('select textcolor from company where user_id = ?',[$id])[0];
            return $color['textcolor'];
        }
        return;
    }


    public function saveChanges($user_id,$word,$files,$background_width,$background_height,$logo_width,$logo_height,$textcolor)
    {
        $manager = new ImageManager(array('driver' => 'gd'));
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $results = DB::select('select * from company where user_id = ? LIMIT 1',[$user_id])[0];

        if(@$_FILES['font']){
            $ext = explode('.',$_FILES['font']['name'])[1];
            if($ext == 'ttf' || $ext == 'TTF' || $ext == 'otf' || $ext == 'OTF')
            {
                $font = 'fonts/' . $user_id.'.'.$ext;
                move_uploaded_file ($_FILES['font']['tmp_name'] , $font );
            }
        }
        else
        {
            $font = $results['font'];
        }
        if(@$_FILES['background']){
            if($background_width == '' && $background_height == '') {
                $size = getimagesize($_FILES['background']['tmp_name']);
                $background_width = $size[0];
                $background_height = $size[1];
            }
            if($background_width > 200)
                $background_width = 200;
            if($background_width < 50)
                $background_width = 50;
            if($background_height > 50)
                $background_height = 50;
            if($background_height < 20)
                $background_height = 20;
            $ext = explode('/',$_FILES['background']['type'])[1];
            $uploadbackground = 'images/background/' . $user_id.'.'.$ext;
            $image = $manager->make($_FILES['background']['tmp_name'])->resize($background_width,$background_height);
            $image->save($uploadbackground, 100);
        }
        else
        {
            $background_width = $results['background_width'];
            $background_height = $results['background_height'];
            $uploadbackground = $results['background'];
        }
        if(@$_FILES['logo']){
            if($logo_width == '' && $logo_height == '') {
                $size = getimagesize($_FILES['logo']['tmp_name']);
                $logo_width = $size[0];
                $logo_height = $size[1];
            }
            if($logo_width > 50)
                $logo_width = 50;
            if($logo_width < 25)
                $logo_width = 25;
            if($logo_height > 50)
                $logo_height = 50;
            if($logo_height < 25)
                $logo_height = 25;
            $ext = explode('/',$_FILES['logo']['type'])[1];
            $uploadlogo = 'images/logo/' . $user_id.'.'.$ext;
            $image = $manager->make($_FILES['logo']['tmp_name'])->resize($logo_width,$logo_height);
            $image->save($uploadlogo, 100);
        }
        else
        {
            $logo_width = $results['logo_width'];
            $logo_height = $results['logo_height'];
            $uploadlogo = $results['logo'];
        }
        DB::table('company')
            ->where('user_id', $user_id)
            ->update([
                'company_code' => $word,
                'background' => $uploadbackground,
                'logo' => $uploadlogo,
                'background_width' => $background_width,
                'background_height' => $background_height,
                'logo_width' => $logo_width,
                'logo_height' => $logo_height,
                'textcolor' => substr($textcolor,1),
                'font' => $font,
            ]);
        $info = array(
            'background' => 'http://'.$_SERVER['SERVER_NAME'].'/'.$uploadbackground,
            'logo' => 'http://'.$_SERVER['SERVER_NAME'].'/'.$uploadlogo,
            'background_width' => $background_width,
            'background_height' => $background_height,
            'logo_width' => $logo_width,
            'logo_height' => $logo_height,
        );
        return $info;
    }
    
    public function draw($id)
    {
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        @$results = DB::select('select * from company where user_id = ? LIMIT 1',[$id])[0];
        if($results['background'] == '')
            return;
        $noise = $results['background'];
        $ext = explode('.',$noise)[1];
        if($ext == 'jpeg' || $ext == 'jpg')
            $img = imagecreatefromjpeg($noise);
        else
            $img = imagecreatefrompng($noise);
        if($results['logo'] != '')
        {
            $logo = imagecreatefrompng($results['logo']);
            $location_x = 5;
            $location_y = 0;
            $offset_src_x = 0;
            $offset_src_y = 0;
            $src_width = $results['logo_width'];
            $src_height = $results['logo_height'];
            imagecopyresampled($img, $logo, $location_x, $location_y, $offset_src_x, $offset_src_y, $src_width, $src_height, $src_width, $src_height);

        }
        $font_rgb = $this->hex_to_rgb($results['textcolor']);
        $color = imagecolorallocate($img, $font_rgb['red'],$font_rgb['green'],$font_rgb['blue']);
        $color = imagecolortransparent($img,$color);
        imageantialias($img, true); //Сглаживание
        $nChars = iconv_strlen($results['company_code']);
        $randStr = $results['company_code'];
        $deltaX = 25; //Смещение по Х
        $x = rand(20, 30);
        $y = 40;
        $font = $results['font'];
        for($i=0;$i<$nChars;$i++){
            $size = rand(25,35);//Размер шрифта
            $angle = -30 + rand(0,60);
            imagettftext($img, $size, $angle, $x, $y, $color, $font, $randStr{$i});
            $x+= $deltaX;
        }
        $manager = new ImageManager(array('driver' => 'gd'));
        $image = $manager->make($img);
        $path =  'images/company/'.$id.'.png';
        $image->save($path, 100);
        return 'http://'.$_SERVER['SERVER_NAME'].'/'.$path;
    }

    public function hex_to_rgb($hex) {
        if(substr($hex,0,1) == '#')
            $hex = substr($hex,1) ;
        if(strlen($hex) == 3) {
            $hex = substr($hex,0,1) . substr($hex,0,1) .
                substr($hex,1,1) . substr($hex,1,1) .
                substr($hex,2,1) . substr($hex,2,1) ;
        }

        $rgb['red'] = hexdec(substr($hex,0,2)) ;
        $rgb['green'] = hexdec(substr($hex,2,2)) ;
        $rgb['blue'] = hexdec(substr($hex,4,2)) ;

        return $rgb ;
    }
}
