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
        $datas = Bumdes::getAllBumdes();
        return view('admin.bumdes', compact('datas'));
    }

    public function pengurusView()
    {
        $datas['pengurus'] = Bumdes::join('penguruses', 'id_bumdes', '=', 'bumdes.id')->get();
        $datas['bumdes'] = Bumdes::getAllBumdes();
        return view('admin.pengurus', compact('datas'));
    }

    public function unitView()
    {
        $datas['unit'] = Bumdes::join('units', 'id_bumdes', '=', 'bumdes.id')->get();
        $datas['bumdes'] = Bumdes::getAllBumdes();
        return view('admin.unit', compact('datas'));
    }

    public function modalView()
    {
        $datas = Modal::join('bumdes', 'id_bumdes', '=', 'bumdes.id')->get();
        return view('admin.modal', compact('datas'));
    }

    public function hasilView()
    {
        $datas = Hasil::join('bumdes', 'id_bumdes', '=', 'bumdes.id')->get();
        return view('admin.hasil', compact('datas'));
    }

    public function jualView()
    {
        $datas['jual'] = Jual::join('units', 'id_unit', '=', 'units.id');
        $datas['jual'] = $datas['jual']->join('bumdes', 'id_bumdes', '=', 'bumdes.id')->get();
        $datas['unit'] = Unit::getAllUnit();
        return view('admin.jual', compact('datas'));
    }

    public function userView()
    {
        $datas = User::getAllUser();
        return view('admin.user', compact('datas'));
    }
}
