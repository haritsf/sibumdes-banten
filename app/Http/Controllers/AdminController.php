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

    public function userDelete(Request $request)
    {
        $user = User::find($request->id);

        // Check BUMDes
        if (Bumdes::where('id_user', $user->id)->count() == 0) {
            // Kondisi BUMDes Gaada
            $user->delete();
        } elseif (Bumdes::where('id_user', $user->id)->count() != 0) {
            $bumdes = Bumdes::where('id_user', $user->id)->first();
            if (Pengurus::where('id_bumdes', $bumdes->id)->count() != 0) {
                $pengurus = Pengurus::where('id_bumdes', $bumdes->id)->get();
                if (Modal::where('id_bumdes', $bumdes->id)->count() != 0) {
                    $modal = Modal::where('id_bumdes', $bumdes->id)->get();
                    if (Hasil::where('id_bumdes', $bumdes->id)->count() != 0) {
                        $hasil = Hasil::where('id_bumdes', $bumdes->id)->get();
                        if (Unit::where('id_bumdes', $bumdes->id)->count() != 0) {
                            $unit = Unit::where('id_bumdes', $bumdes->id)->get();
                            foreach ($unit as $unit) {
                                $jual[$unit->id] = Jual::where('id_unit', $unit->id)->get();
                                if ($jual[$unit->id]->count() == 0) {
                                    $unit->delete();
                                } elseif ($jual[$unit->id]->count() != 0) {
                                    foreach ($jual[$unit->id] as $jual) {
                                        $jual->delete();
                                    }
                                    $unit->delete();
                                }
                            }
                        } elseif (Unit::where('id_bumdes', $bumdes->id)->count() == 0) {
                            foreach ($hasil as $hasil) {
                                $hasil->delete();
                            }
                        }
                    } elseif (Hasil::where('id_bumdes', $bumdes->id)->count() == 0) {
                        foreach ($modal as $modal) {
                            $modal->delete();
                        }
                    }
                } elseif (Modal::where('id_bumdes', $bumdes->id)->count() == 0) {
                    foreach ($pengurus as $pengurus) {
                        $pengurus->delete();
                    }
                }
            } elseif (Pengurus::where('id_bumdes', $bumdes->id)->count() == 0) {
                $bumdes->delete();
            }
        }
        // foreach ($unit as $unit) {
            
        // }
        // // dd($jual);



        // if ($modal->count() != 0) {
        //     foreach ($modal as $modal) {
        //         $modal->delete();
        //     }
        // }

        // if ($hasil->count() != 0) {
        //     foreach ($hasil as $hasil) {
        //         $hasil->delete();
        //     }
        // }

        // if ($pengurus->count() == 0) {
        //     $bumdes->delete();
        // } elseif ($pengurus->count() != 0) {
        //     foreach ($pengurus as $pengurus) {
        //         $pengurus->delete();
        //     }
        //     $bumdes->delete();
        // }

        // if ($bumdes->count() == 0) {
        //     $user->delete();
        // } elseif ($bumdes->count() != 0) {
        //     $bumdes->delete();
        //     $user->delete();
        // }
        return redirect()->back()->with('danger', 'User dan Data terkait berhasil dihapus');
    }
}
