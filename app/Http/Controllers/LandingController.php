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
        $datas = Unit::join('juals', 'id_unit', '=', 'units.id')->where('units.jenis', '=', 'Wirausaha')->get();
        $bumdes = Bumdes::getAllBumdes();
        return view('wirausaha', ['datas' => $datas, 'bumdes' => $bumdes]);
    }

    public function jasa()
    {
        $datas = Unit::join('juals', 'id_unit', '=', 'units.id')->where('units.jenis', '=', 'Jasa')->get();
        $bumdes = Bumdes::getAllBumdes();
        return view('jasa', ['datas' => $datas, 'bumdes' => $bumdes]);
    }

    public function agribisnis()
    {
        $datas = Unit::join('juals', 'id_unit', '=', 'units.id')->where('units.jenis', '=', 'Agribisnis')->get();
        $bumdes = Bumdes::getAllBumdes();
        return view('agribisnis', ['datas' => $datas, 'bumdes' => $bumdes]);
    }

    public function pariwisata()
    {
        $datas = Unit::join('juals', 'id_unit', '=', 'units.id')->where('units.jenis', '=', 'Pariwisata')->get();
        $bumdes = Bumdes::getAllBumdes();
        return view('pariwisata', ['datas' => $datas, 'bumdes' => $bumdes]);
    }

    public function review()
    {
    }
}
