<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Bumdes;

class Modal extends Model
{
    public $table = 'modals';

    protected $fillable = [
        'id_bumdes', 'sumber', 'bentuk', 'jumlah', 'tahun', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'updated_at' => 'datetime',
    ];

    public static function getAllModal()
    {
        return Modal::all();
    }

    public static function checkModal()
    {
        $getBumdes = Bumdes::where('id_user', '=', Auth::user()->id)->first();
        return Modal::where('id_bumdes', '=', $getBumdes['id'])->exists();
    }

    public static function getByUser()
    {
        $getBumdes = Bumdes::where('id_user', '=', Auth::user()->id)->first();
        return Modal::where('id_bumdes', '=', $getBumdes['id'])->get();
    }

    public static function sumModal()
    {   
        return Modal::getByUser()->sum('jumlah');
    }
}
