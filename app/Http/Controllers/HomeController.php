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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $datas['pengurus'] = Pengurus::getByBumdes();
        $datas['unit'] = Unit::getByUser();
        $datas['jual'] = Jual::getByUser()->count();
        $datas['sumModal'] = Modal::sumModal();
        $datas['sumHasil'] = Hasil::sumHasil();
        return view('user.home', compact('datas'));
    }

    public function profileView()
    {
        $data = User::getByAuth();
        return view('user.profile', ['data' => $data]);
    }

    public function bumdesView()
    {
        if (Bumdes::getByUser() == null) {
            $data['bumdes'] = null;
            $data['pengurus'] = null;
            $data['user'] = Auth::user();
            return view('user.bumdes', ['data' => $data]);
        } else {
            $data['bumdes'] = Bumdes::getByUser();
            $data['pengurus'] = Pengurus::getByBumdes();
            $data['user'] = Auth::user();
            return view('user.bumdes', ['data' => $data]);
        }
    }

    public function bumdesCreate(Request $request)
    {
        $bumdes = new Bumdes;
        $bumdes->id_user = $request->id_user;
        $bumdes->nama = $request->bumdes;
        $bumdes->kabupaten = $request->kabupaten;
        $bumdes->kecamatan = $request->kecamatan;
        $bumdes->desa = $request->desa;
        $bumdes->alamat = $request->alamat;
        $bumdes->telp = $request->telp;
        $bumdes->musyawarah = $request->musyawarah;
        $bumdes->perdes = $request->perdes;
        $bumdes->sk = $request->sk;
        $bumdes->created_at = now();
        $bumdes->updated_at = now();
        $bumdes->save();

        $getUser = Bumdes::getByUser()->id;

        $panjang = count($request->nama) + 1;
        for ($i = 1; $i < $panjang; $i++) {
            $pengurus = new Pengurus;
            $pengurus->id_bumdes = $getUser;
            $pengurus->nama = $request->nama[$i - 1];
            $pengurus->jabatan = $request->jabatan[$i - 1];
            $pengurus->created_at = now();
            $pengurus->updated_at = now();
            $pengurus->save();
        }
        return redirect()->back()->with('success', 'Bumdes & Pengurus berhasil disimpan');
    }

    public function pengurusCreate(Request $request)
    {
        $getUser = Bumdes::getByUser()->id;

        $panjang = count($request->nama) + 1;
        for ($i = 1; $i < $panjang; $i++) {
            $pengurus = new Pengurus;
            $pengurus->id_bumdes = $getUser;
            $pengurus->nama = $request->nama[$i - 1];
            $pengurus->jabatan = $request->jabatan[$i - 1];
            $pengurus->created_at = now();
            $pengurus->updated_at = now();
            $pengurus->save();
        }
        return redirect()->back()->with('success', 'Pengurus Baru berhasil disimpan');
    }

    public function pengurusUpdate(Request $request)
    {
        $pengurus = Pengurus::find($request->id);
        $pengurus->nama = $request->nama;
        $pengurus->jabatan = $request->jabatan;
        $pengurus->updated_at = now();
        $pengurus->save();
        return redirect()->back()->with('success', 'Pengurus berhasil diperbarui');
    }

    public function pengurusDelete(Request $request)
    {
        $pengurus = Pengurus::find($request->id);
        $pengurus->delete();
        return redirect()->back()->with('success', 'Pengurus berhasil dihapus');
    }

    public function bumdesUpdate(Request $request)
    {
        $update['bumdes'] = Bumdes::find($request->id);
        $update['bumdes']->nama = $request->nama;
        $update['bumdes']->kabupaten = $request->kabupaten;
        $update['bumdes']->kecamatan = $request->kecamatan;
        $update['bumdes']->desa = $request->desa;
        $update['bumdes']->alamat = $request->alamat;
        $update['bumdes']->telp = $request->telp;
        $update['bumdes']->musyawarah = $request->musyawarah;
        $update['bumdes']->perdes = $request->perdes;
        $update['bumdes']->sk = $request->sk;
        $update['bumdes']->updated_at = now();

        $update['user'] = User::find($request->id_user);
        $update['user']->name = $request->nama;
        $update['user']->email = $request->email;
        $update['user']->updated_at = now();

        $update['bumdes']->save();
        $update['user']->save();
        return redirect()->back()->with('success', 'Bumdes berhasil diperbarui');
    }

    public function unitView()
    {
        $check = Bumdes::checkBumdes();
        $data = Unit::getByUser();
        return view('user.unit', ['data' => $data, 'check' => $check]);
    }

    public function unitCreate(Request $request)
    {
        $bumdes = Bumdes::getByUser()->id;
        $panjang = count($request->nama) + 1;
        for ($i = 1; $i < $panjang; $i++) {
            $unit = new Unit();
            $unit->id_bumdes = $bumdes;
            $unit->nama = $request->nama[$i - 1];
            $unit->jenis = $request->jenis[$i - 1];
            $unit->omset = $request->omset[$i - 1];
            $unit->created_at = now();
            $unit->updated_at = now();
            $unit->save();
        }
        return redirect()->back()->with('success', 'Unit Usaha berhasil disimpan');
    }

    public function modalView()
    {
        $check = Modal::checkModal();
        if ($check == false) {
            $check = Bumdes::checkBumdes();
            $data = null;
            return view('user.modal', ['data' => $data, 'check' => $check]);
        } elseif ($check == true) {
            $check = Bumdes::checkBumdes();
            $data = Modal::getByUser();
            return view('user.modal', ['data' => $data, 'check' => $check]);
        }
    }

    public function modalCreate(Request $request)
    {
        $bumdes = Bumdes::getByUser()->id;
        $panjang = count($request->sumber) + 1;
        for ($i = 1; $i < $panjang; $i++) {
            $modal = new Modal;
            $modal->id_bumdes = $bumdes;
            $modal->sumber = $request->sumber[$i - 1];
            $modal->bentuk = $request->bentuk[$i - 1];
            $modal->jumlah = $request->jumlah[$i - 1];
            $modal->tahun = $request->tahun[$i - 1];
            $modal->created_at = now();
            $modal->updated_at = now();
            $modal->save();
        }
        return redirect()->back()->with('success', 'Permodalan anda berhasil disimpan');
    }

    public function hasilView()
    {
        $check = Hasil::checkHasil();
        if ($check == false) {
            $check = Bumdes::checkBumdes();
            $data = null;
            return view('user.hasil', ['data' => $data, 'check' => $check]);
        } elseif ($check == true) {
            $check = Bumdes::checkBumdes();
            $data = Hasil::getByUser();
            return view('user.hasil', ['data' => $data, 'check' => $check]);
        }
    }

    public function hasilCreate(Request $request)
    {
        $bumdes = Bumdes::getByUser()->id;
        $panjang = count($request->untuk) + 1;
        for ($i = 1; $i < $panjang; $i++) {
            $hasil = new Hasil;
            $hasil->id_bumdes = $bumdes;
            $hasil->untuk = $request->untuk[$i - 1];
            $hasil->persen = $request->persen[$i - 1];
            $hasil->created_at = now();
            $hasil->updated_at = now();
            $hasil->save();
        }
        return redirect()->back()->with('success', 'Pembagian Hasil anda berhasil disimpan');
    }

    public function jualView()
    {
        $check = Jual::checkJual();
        $unit = Unit::getAllUnit();
        if ($check == false) {
            $check = Unit::checkUnit();
            $data = null;
            return view('user.jual', ['data' => $data, 'check' => $check, 'unit' => $unit]);
        } elseif ($check == true) {
            $check = Unit::checkUnit();
            $data = Jual::getByUser();
            // dd($data);
            return view('user.jual', ['data' => $data, 'check' => $check, 'unit' => $unit]);
        }
    }

    public function jualCreate(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);
        $file = $request->file('file');
        $folder_upload = 'images/jual';

        $panjang = count($request->produk) + 1;
        for ($i = 1; $i < $panjang; $i++) {
            $jual = new Jual;
            $jual->id_unit = $request->id_unit[$i - 1];
            $jual->produk = $request->produk[$i - 1];
            $jual->foto = $request->id_unit[$i - 1] . "-" . $file[$i - 1]->getClientOriginalName();
            $jual->harga = $request->harga[$i - 1];
            $jual->lokasi = $request->lokasi[$i - 1];
            $jual->telp = $request->telp[$i - 1];
            $jual->created_at = now();
            $jual->updated_at = now();
            $file[$i - 1]->move($folder_upload, $request->id_unit[$i - 1] . "-" . $file[$i - 1]->getClientOriginalName());
            $jual->save();
        }
        return redirect()->back()->with('success', 'Data Penjualan anda berhasil disimpan');
    }

    public function jualUpdate(Request $request)
    {
        $this->validate($request, [
            'file' => 'required'
        ]);

        $file = $request->file('file');
        $folder_upload = 'images/jual';
        $file->move($folder_upload, $request->id_unit . "-" . $file->getClientOriginalName());

        $update = Jual::find($request->id);
        $update->produk = $request->produk;
        $update->foto = $request->id_unit . "-" . $file->getClientOriginalName();
        $update->harga = $request->harga;
        $update->lokasi = $request->lokasi;
        $update->telp = $request->telp;
        $update->updated_at = now();
        $update->save();
        return redirect()->back()->with('success', 'Data Penjualan berhasil diperbarui');
    }
}
