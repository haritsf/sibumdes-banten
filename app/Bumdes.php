<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Bumdes extends Model
{
    public $table = 'bumdes';

    protected $fillable = [
        'nama', 'kecamatan', 'alamat', 'telp', 'musyawarah', 'perdes', 'sk',
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];

    public static function getAllBumdes()
    {
        return Bumdes::all();
    }

    public static function countSerang()
    {
        return Bumdes::where('kabupaten', 'Serang')->count();
    }

    public static function countLebak()
    {
        return Bumdes::where('kabupaten', 'Lebak')->count();
    }

    public static function countTangerang()
    {
        return Bumdes::where('kabupaten', 'Tangerang')->count();
    }

    public static function countPandeglang()
    {
        return Bumdes::where('kabupaten', 'Pandeglang')->count();
    }

    public static function getByUser()
    {
        return Bumdes::where('id_user', '=', Auth::user()->id)->first();
    }

    public static function checkBumdes()
    {
        return Bumdes::where('id_user', '=', Auth::user()->id)->exists();
    }
}
