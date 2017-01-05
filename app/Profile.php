<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
}
