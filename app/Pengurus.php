<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Bumdes;

class Pengurus extends Model
{
    public $table = 'penguruses';

    protected $fillable = [
        'id_bumdes', 'nama', 'jabatan', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];

    public static function getByBumdes()
    {
        $getBumdes =  Bumdes::where('id_user', '=', Auth::user()->id)->first();
        return Pengurus::where('id_bumdes', '=', $getBumdes['id'])->get();
    }
}
