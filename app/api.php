<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\DB;

class api extends Model
{
    public function check($id, $text)
    {
        DB::setFetchMode(\PDO::FETCH_ASSOC);
        $results = DB::select('select word from api where hash = ? LIMIT 1',[$id])[0];
        if($results['word'] == $text)
            return 'true';
        else
            return 'false';
    }

    public function createRandomCaptcha()
    {

        $noise = $this->get_noise();
        $img = imagecreatefrompng($noise);
        $color = $this->get_color($img,$noise);
        imageantialias($img, true); //Сглаживание
        $nChars = rand(5, 8); //Количество символов капчи
        $randStr = $this->generate_random_code($nChars);

        if($nChars > 7)
        {
            $deltaX = 20; //Смещение по Х
            $x = rand(7, 12);
            $y = rand(20, 35);
        }
        else
        {
            if($nChars < 6)
            {
                $deltaX =  rand(30, 40); //Смещение по Х
                $x = rand(40, 50);
                $y = rand(25, 30);
            }
            else
            {
                $deltaX =  rand(25, 30); //Смещение по Х
                $x = rand(15, 20);
                $y = rand(25, 30);
            }

        }
        $hash = md5($x.$y.$deltaX.$nChars.$randStr);
        for($i=0;$i<$nChars;$i++){
            $size = rand(16,30);//Размер шрифта
            $angle = -30 + rand(0,60);
            imagettftext($img, $size, $angle, $x, $y, $color, "fonts/bellb.ttf", $randStr{$i});
            $x+= $deltaX;
        }
        $manager = new ImageManager(array('driver' => 'gd'));
        $image = $manager->make($img);
        $image->save('images/generated/'.$hash.'.png', 100);
        $path =  '/images/generated/'.$hash.'.png';
        DB::insert('insert into api (hash, word, created_at, link) values (?, ?, now(), ?)', [$hash, $randStr,$path]);
        $response = json_encode(['captcha_link' => $path, 'captcha_id' => $hash]);
        return $response;
    }
    public function createCompanyCaptcha()
    {
        $results = DB::select('select company_code from company ORDER BY RAND() LIMIT 1');
        if($results)
        {
            $noise = $this->get_noise();
            $img = imagecreatefrompng($noise);
            $color = $this->get_color($img,$noise);
            imageantialias($img, true); //Сглаживание
            $nChars = iconv_strlen($results[0]->company_code); //Количество символов капчи
            $randStr = $results[0]->company_code;

            //Начальные координаты
            if($nChars > 8)
            {
                $deltaX = 20; //Смещение по Х
                $x = rand(7, 12);
                $y = rand(20, 35);
            }
            else
            {
                if($nChars < 6)
                {
                    $deltaX =  rand(30, 40); //Смещение по Х
                    $x = rand(40, 50);
                    $y = rand(25, 30);
                }
                else
                {
                    $deltaX =  rand(25, 30); //Смещение по Х
                    $x = rand(15, 20);
                    $y = rand(25, 30);
                }

            }
            $hash = md5($x.$y.$deltaX.$nChars.$randStr);
            for($i=0;$i<$nChars;$i++){
                if($nChars > 8)
                    $size = rand(16,20);//Размер шрифта
                else
                {
                    if($nChars < 6)
                        $size = rand(25,40);//Размер шрифта
                    else
                        $size = rand(16,30);//Размер шрифта
                }

                $angle = -30 + rand(0,60);
                imagettftext($img, $size, $angle, $x, $y, $color, "fonts/bellb.ttf", $randStr{$i});
                $x+= $deltaX;
            }

            $manager = new ImageManager(array('driver' => 'gd'));
            $image = $manager->make($img);
            $image->save('images/generated/'.$hash.'.png', 100);
            $path =  '/images/generated/'.$hash.'.png';
            DB::insert('insert into api (hash, word, created_at, link) values (?, ?, now(), ?)', [$hash, $randStr,$path]);
            $response = json_encode(['captcha_link' => $path, 'captcha_id' => $hash]);
            return $response;
        }
        else
        {
            return $this->createRandomCaptcha();
        }
    }

    function generate_random_code($nChars)
    {
        $chars = 'abdefhknrstyz23456789';
        $length = $nChars;
        $numChars = strlen($chars);
        $str = '';
        for ($i = 0; $i < $length; $i++) {
            $str .= substr($chars, rand(1, $numChars) - 1, 1);
        }
        $array_mix = preg_split('//', $str, -1, PREG_SPLIT_NO_EMPTY);
        srand ((float)microtime()*1000000);
        shuffle ($array_mix);
        return implode("", $array_mix);
    }
    function get_noise()
    {
        $noise = array('images/1.png','images/2.png','images/3.png');
        return $noise[array_rand($noise)];
    }
    function get_color($img,$noise)
    {
        if($noise == 'images/2.png' || $noise == 'images/3.png')
            return imagecolorallocate($img, 255, 255, 255);
    }

}
