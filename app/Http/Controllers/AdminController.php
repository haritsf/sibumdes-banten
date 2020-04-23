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
        $datas['pengurus'] = Pengurus::getAll();
        $datas['unit'] = Unit::getAllUnit();
        $datas['sumModal'] = Modal::sumAll();
        $datas['sumHasil'] = Hasil::sumAll();
        return view('admin.home', compact('datas'));
    }
}
