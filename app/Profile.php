<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;

class Profile extends Model
{

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
        $captcha_id = DB::table('company')->insertGetId(array('user_id' => $id, 'textcolor' => 'ffffff', 'font' => 'fonts/comic.ttf'));
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

    public function getLogopos($id)
    {
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        if($this->getUserCaptcha($id) != 0)
        {
            $logopos = DB::select('select logopos from company where user_id = ?',[$id])[0];
            return $logopos['logopos'];
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

    public function saveChanges($user_id,$word,$files,$textcolor,$dfont)
    {
        $manager = new ImageManager(array('driver' => 'gd'));
        DB::setFetchMode(\PDO::FETCH_ASSOC);

        $results = DB::select('select * from company where user_id = ? LIMIT 1',[$user_id])[0];

        //Проверки загрузки шрифтов
        if(isset($files['font'])){
            $ext = strtolower(substr($files['font']['name'],-3));
            if($ext == 'ttf' || $ext == 'otf')
            {
                $font = 'fonts/' . $user_id.'.'.$ext;
                move_uploaded_file ($files['font']['tmp_name'] , $font );
            }
            else
            {
                $info['font_error'] = 'Не известный шрифт. Допускается только .ttf и .otf';
                $font = $results['font'];
                if($dfont != 'undefined')
                    $font = 'fonts/'.$dfont;
            }
        }
        else
        {
            $font = $results['font'];
            if($dfont != 'undefined')
                $font = 'fonts/'.$dfont;
        }

        //Проверки загрузки картинки бэкграуна
        if(isset($files['background'])){
            $ext = image_type_to_mime_type(exif_imagetype($files['background']['tmp_name']));
            if($ext == 'image/png' || $ext == 'image/jpeg')
            {
                $uploadbackground = 'images/background/' . $user_id.'.jpg';
                $image = $manager->make($files['background']['tmp_name'])->resize(200,50);
                $image->save($uploadbackground, 100);
            }
            else
            {
                $info['background_error'] = 'Не верный формат изображения бэкраунда. Только .png .jpg .jpeg';
                $uploadbackground = $results['background'];
            }
        }
        else
        {
            $uploadbackground = $results['background'];
        }

        //Проверки загрузки картинки лого
        if(isset($files['logo'])){
            $ext = image_type_to_mime_type(exif_imagetype($files['logo']['tmp_name']));
            if($ext == 'image/png')
            {
                $uploadlogo = 'images/logo/' . $user_id . '.png';
                $image = $manager->make($files['logo']['tmp_name'])->resize(50, 50);
                $image->save($uploadlogo, 100);
            }
            else
            {
                $info['logo_error'] = 'Не верный формат изображения лого. Только .png';
                $uploadlogo = $results['logo'];
            }
        }
        else
        {
            $uploadlogo = $results['logo'];
        }

        DB::table('company')
            ->where('user_id', $user_id)
            ->update([
                'company_code' => $word,
                'background' => $uploadbackground,
                'logo' => $uploadlogo,
                'textcolor' => substr($textcolor,1),
                'font' => $font,
            ]);
        $info['background'] = 'http://'.$_SERVER['SERVER_NAME'].'/'.$uploadbackground;
        $info['logo'] = 'http://'.$_SERVER['SERVER_NAME'].'/'.$uploadlogo;
        return $info;
    }
    
    public function draw($id, $logopos = 0)
    {
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        @$results = DB::select('select * from company where user_id = ? LIMIT 1',[$id])[0];
        if($logopos == 'undefined')
            $logopos = $results['logopos'];
        if($results['background'] == '' || !file_exists($results['background']) )
            return;
        $noise = $results['background'];
        $ext = explode('.',$noise)[1];
        if($ext == 'jpeg' || $ext == 'jpg')
            $img = imagecreatefromjpeg($noise);
        else
            $img = imagecreatefrompng($noise);


        //КРУЖОЧКИ ШУМЫ
//        $linenum = rand(5, 10);
//        for ($i=0; $i<$linenum; $i++)
//        {
//            $color1 = imagecolorallocate($img, rand(0, 256), rand(0, 256), rand(0, 256)); // Случайный цвет c изображения
//            imagefilledellipse($img, rand(0, 200), rand(0, 50), 20, 20, $color1);
//        }


        if($results['logo'] != '' || !file_exists($results['logo']))
        {
            $manager = new ImageManager(array('driver' => 'gd'));
            $realpath = realpath($results['logo']);

            switch($logopos)
            {
                case 0:
                    $image = $manager->make($realpath)->resize(50, 50);
                    $image->save('images/temp/'.$id.'temp.png', 100);
                    $location_x = 1;
                    $location_y = 1;
                    break;
                case 1:
                    $image = $manager->make($realpath)->resize(30, 30);
                    $image->save('images/temp/'.$id.'temp.png', 100);
                    $location_x = 169;
                    $location_y = 19;
                    break;
                case 2:
                    $image = $manager->make($realpath)->resize(30, 30);
                    $image->save('images/temp/'.$id.'temp.png', 100);
                    $location_x = 1;
                    $location_y = 19;
                    break;
                case 3:
                    $image = $manager->make($realpath)->resize(30, 30);
                    $image->save('images/temp/'.$id.'temp.png', 100);
                    $location_x = 1;
                    $location_y = 1;
                    break;
                case 4:
                    $image = $manager->make($realpath)->resize(30, 30);
                    $image->save('images/temp/'.$id.'temp.png', 100);
                    $location_x = 169;
                    $location_y = 1;
                    break;
                case 5:
                    $image = $manager->make($realpath)->resize(50, 50);
                    $image->save('images/temp/'.$id.'temp.png', 100);
                    $location_x = 149;
                    $location_y = 1;
                    break;
                case 6:
                    $image = $manager->make($realpath)->resize(50, 50);
                    $image->save('images/temp/'.$id.'temp.png', 100);
                    $location_x = 75;
                    $location_y = 1;
                    break;
                default:
                    $image = $manager->make($realpath)->resize(50, 50);
                    $image->save('images/temp/'.$id.'temp.png', 100);
                    $location_x = 5;
                    $location_y = 0;
                    break;
            }
            DB::table('company')
                ->where('user_id', $id)
                ->update([
                    'logopos' => $logopos,
                ]);

            $logo_size = getimagesize('images/temp/'.$id.'temp.png');
            $logo = imagecreatefrompng('images/temp/'.$id.'temp.png');
            $offset_src_x = 0;
            $offset_src_y = 0;
            $src_width = $logo_size[0];
            $src_height = $logo_size[1];
            imagecopyresampled($img, $logo, $location_x, $location_y, $offset_src_x, $offset_src_y, $src_width, $src_height, $src_width, $src_height);

        }
        $font_rgb = $this->hex_to_rgb($results['textcolor']);
        $color = imagecolorallocate($img, $font_rgb['red'],$font_rgb['green'],$font_rgb['blue']);
        $color = imagecolortransparent($img,$color);
        imageantialias($img, true);
        $nChars = iconv_strlen($results['company_code']);
        $randStr = strtolower($results['company_code']);
        $font = $results['font'];

        if($nChars)
        {
            if($nChars <= 6)
            {
                $deltaX = 25; //Смещение по Х
                $x = 20;
                $y = 37;
                $size = 35;//Размер шрифта

            }
            if($nChars <= 8 && $nChars > 6)
            {
                $deltaX = 23; //Смещение по Х
                $x = 8;
                $y = 35;
                $size = 29;//Размер шрифта
            }
            if($nChars <= 10 && $nChars > 8)
            {
                $deltaX = 20; //Смещение по Х
                $x = 5;
                $y = 35;
                $size = 21;//Размер шрифта
            }

        }


        for($i=0;$i<$nChars;$i++){
            $angle = rand(-10,-50) + rand(0,75);
            imagettftext($img, $size, $angle, $x, $y, $color, $font, $randStr{$i});
            $x+= $deltaX;
        }
//линии ШУМЫ
//        $linenum = rand(10, 15);
//        for ($i=0; $i<$linenum; $i++)
//        {
//            $color = imagecolorallocate($img, rand(0, 256), rand(0, 256), rand(0, 256)); // Случайный цвет c изображения
//            imageline($img, rand(0, 20), rand(20, 50), rand(190, 220), rand(1, 50), $color);
//        }

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
