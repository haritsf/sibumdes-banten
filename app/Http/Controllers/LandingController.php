<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bumdes;
use App\Jual;
use App\Unit;

class LandingController extends Controller
{
    public function index()
    {
        $datas['allBumdes'] = Bumdes::getAllBumdes();
        $datas['countSerang'] = Bumdes::countSerang();
        $datas['countLebak'] = Bumdes::countLebak();
        $datas['countTangerang'] = Bumdes::countTangerang();
        $datas['countPandeglang'] = Bumdes::countPandeglang();
        return view('landing', ['datas' => $datas]);
    }

    public function wirausaha()
    {
        $datas['wirausaha'] = Unit::getWirausaha();
        return view('wirausaha', ['datas' => $datas]);
    }

    public function jasa()
    {
        // dd(Unit::with('jual')->get());
        $datas = Jual::getAllJual();
        return view('jasa', ['datas' => $datas]);
    }

    public function agribisnis()
    {
        $datas = Jual::getAllJual();
        return view('agribisnis', ['datas' => $datas]);
    }

    public function pariwisata()
    {
        $datas = Jual::getAllJual();
        return view('pariwisata', ['datas' => $datas]);
    }

    public function review() {
    
    }
}
