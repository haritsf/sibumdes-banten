<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Unit;
use App\Bumdes;

class Jual extends Model
{
    public $table = 'juals';

    protected $fillable = [
        'id_unit', 'produk', 'foto', 'harga', 'lokasi', 'telp', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];

    public static function getAllJual()
    {
        return Jual::all();
    }

    public static function jualJasa(){
        
    }

    public static function checkJual()
    {
        $getBumdes = Bumdes::where('id_user', '=', Auth::user()->id)->first();
        $getUnit = Unit::where('id_bumdes', '=', $getBumdes['id'])->first();
        return Jual::where('id_unit', '=', $getUnit['id'])->exists();
    }

    public static function getByUser()
    {
        $getBumdes = Bumdes::where('id_user', '=', Auth::user()->id)->first();
        $getUnit = Unit::where('id_bumdes', '=', $getBumdes->id)->first();
        // dd($getUnit->toArray());
        return Jual::where('id_unit', '=', $getUnit['id'])->get();
    }
}
