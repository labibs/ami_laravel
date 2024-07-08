<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();

        return view('fakultas.index', compact('fakultas'));
    }
    public function search(Request $request)
    {
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $fakultas = Fakultas::where('name', 'like', '%' . $searchQuery . '%')
                     ->orWhere('dekan', 'like', '%' . $searchQuery . '%')
                     ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial users_table dan kirimkan sebagai respons AJAX
        return View::make('fakultas.partials.fakultas_table', compact('fakultas'))->render();
    }
    public function create(Request $request)
    {
        //dd($request);
        $fakultas = new Fakultas;
        $fakultas->name = $request->name;
        $fakultas->description = $request->description;
        $fakultas->dekan = $request->dekan;
        if($request->active == "on"){
            $fakultas->active = "Ya";
        } else {
            $fakultas->active = "Tidak";
        }
        $imag = $request->file('avatar');
        if ($imag) {
            $namafile = 'foto-' . time() . '.' . $imag->getClientOriginalExtension();
            $fakultas->avatar = $namafile;
            $imag->storeAs('/public/images', $namafile); // Simpan file ke dalam direktori "slip/images"
        }
        $fakultas->save();
        $fakultas = Fakultas::paginate(10);
        Session::flash('success', 'Fakultas berhasil ditambahkan!');
        return redirect()->route('fakultas.index', compact('fakultas'));
    }
    public function updateActive(Request $request, $id)
    {
        $fakultas = Fakultas::find($id);
        
        if ($request->has('active') && $request->active == 'on') {
            $fakultas->active = 'Ya';
            Session::flash('success', 'Fakultas berhasil diaktifkan!');
        } else {
            $fakultas->active = 'Tidak';
            Session::flash('success', 'Fakultas berhasil dinonaktifkan!');
        }
        
        $fakultas->save();
        $fakultas = Fakultas::paginate(10);
        return redirect()->route('fakultas.index', compact('fakultas'));
    }
    public function get_data($id)
    {
        $data = Fakultas::find($id);

        return response()->json([
            'name' => $data->name,
            'description' => $data->description,
            'dekan' => $data->dekan,
        ]);

    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $fakultas = Fakultas::find($id);
        $fakultas->name = $request->name;
        $fakultas->description = $request->description;
        $fakultas->dekan = $request->dekan;
        $imag = $request->file('avatar');
        if ($imag) {
            $namafile = 'foto-' . time() . '.' . $imag->getClientOriginalExtension();
            $fakultas->avatar = $namafile;
            $imag->storeAs('/public/images', $namafile); // Simpan file ke dalam direktori "slip/images"
        }
        $fakultas->save();
        $fakultas = Fakultas::paginate(10);
        Session::flash('success', 'Fakultas berhasil diupdate!');
        return redirect()->route('fakultas.index', compact('fakultas'));
    }
    public function delete($id)
    {
        //dd($id);
        $fakultas = Fakultas::find($id);
        $fakultas->delete();
        $fakultas = Fakultas::paginate(10);
        Session::flash('success', 'Fakultas berhasil dihapus!');
        return redirect()->route('fakultas.index', compact('fakultas'));
    }
}