<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Hasil extends Model
{
    public $table = 'hasils';

    protected $fillable = [
        'id_bumdes', 'untuk', 'persen', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];

    public static function getAllHasil()
    {
        return Hasil::all();
    }

    public static function checkHasil()
    {
        $getBumdes = Bumdes::where('id_user', '=', Auth::user()->id)->first();
        return Hasil::where('id_bumdes', '=', $getBumdes['id'])->exists();
    }

    public static function getByUser()
    {
        $getBumdes =  Bumdes::where('id_user', '=', Auth::user()->id)->first();
        return Hasil::where('id_bumdes', '=', $getBumdes['id'])->get();
    }

    public static function sumHasil()
    {   
        return Hasil::getByUser()->sum('persen');
    }
    
    public static function sumAll()
    {   
        return Hasil::getAllHasil()->sum('persen');
    }
}
