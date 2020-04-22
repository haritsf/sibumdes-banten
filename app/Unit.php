<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Bumdes;
use Illuminate\Support\Facades\Auth;

class Unit extends Model
{
    public $table = 'units';

    protected $fillable = [
        'id_bumdes', 'nama', 'jenis', 'omset', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];

    public function jual()
    {
        return $this->hasMany('App\Jual', 'id_unit');
    }

    public static function getAllUnit()
    {
        return Unit::all();
    }

    public static function getByUser()
    {
        $getBumdes = Bumdes::where('id_user', '=', Auth::user()->id)->first();
        return Unit::where('id_bumdes', '=', $getBumdes['id'])->get();
    }

    public static function getByJual($jual)
    {
        return Unit::where('id', '=', @$jual->id_unit)->get();
    }

    public static function checkUnit()
    {
        $getBumdes = Bumdes::where('id_user', '=', Auth::user()->id)->first();
        return Unit::where('id_bumdes', '=', $getBumdes['id'])->exists();
    }

    public static function getWirausaha()
    {
        $getWirausaha = Unit::where('jenis', 'Wirausaha')->get();
        return $getWirausaha;
    }

    public static function getJasa()
    {
        $getJasa = Unit::where('jenis', 'Jasa');
        return $getJasa;
    }
}
