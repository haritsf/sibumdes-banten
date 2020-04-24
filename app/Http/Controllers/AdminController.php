<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Bumdes;
use App\Hasil;
use App\Jual;
use App\Modal;
use App\Pengurus;
use App\Unit;
use App\User;

class AdminController extends Controller
{
    public function homeView()
    {
        $datas['pengurus'] = Pengurus::getAll()->count();
        $datas['unit'] = Unit::getAllUnit()->count();
        $datas['bumdes'] = Bumdes::getAllBumdes()->count();
        $datas['jual'] = Jual::getAllJual()->count();
        return view('admin.home', compact('datas'));
    }

    public function bumdesView()
    {
        $datas['bumdes'] = Bumdes::getAllBumdes();
        return view('admin.bumdes', compact('datas'));
    }

    public function unitView()
    {
        $datas['unit'] = Bumdes::join('units', 'id_bumdes', '=', 'bumdes.id')->get();
        $datas['bumdes'] = Bumdes::getAllBumdes();
        // dd($datas);
        return view('admin.unit', compact('datas'));
    }
}
