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
        $datas = Unit::join('juals', 'id_unit', '=', 'units.id')->where('units.jenis', '=', 'Wirausaha')->get();;
        return view('wirausaha', ['datas' => $datas]);
    }

    public function jasa()
    {
        $datas = Unit::join('juals', 'id_unit', '=', 'units.id')->where('units.jenis', '=', 'Jasa')->get();
        return view('jasa', ['datas' => $datas]);
    }

    public function agribisnis()
    {
        $datas = Unit::join('juals', 'id_unit', '=', 'units.id')->where('units.jenis', '=', 'Agribisnis')->get();
        return view('agribisnis', ['datas' => $datas]);
    }

    public function pariwisata()
    {
        $datas = Unit::join('juals', 'id_unit', '=', 'units.id')->where('units.jenis', '=', 'Pariwisata')->get();
        return view('pariwisata', ['datas' => $datas]);
    }

    public function review() {
    
    }
}
