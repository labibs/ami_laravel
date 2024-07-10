<?php

namespace App\Http\Controllers;

use App\Models\Standar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class StandarController extends Controller
{
    public function index()
    {
        $standar = Standar::where('id', '!=', 1)->where('active', 'Ya')->get();

        return view('standar.index', compact('standar'));
    }
    public function search(Request $request)
    {
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $standar = Standar::where('name', 'like', '%' . $searchQuery . '%')
                     ->orWhere('kode', 'like', '%' . $searchQuery . '%')
                     ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial users_table dan kirimkan sebagai respons AJAX
        return View::make('standar.partials.standar_table', compact('standar'))->render();
    }
    public function create(Request $request)
    {
        //dd($request);
        $standar = new Standar;
        $standar->kode = $request->kode;
        $standar->name = strtoupper($request->name);
        if($request->active == "on"){
            $standar->active = "Ya";
        } else {
            $standar->active = "Tidak";
        }
        $standar->save();
        $standar = Standar::paginate(10);
        Session::flash('success', 'Standar berhasil ditambahkan!');
        return redirect()->route('standar.index', compact('standar'));
    }
    public function updateActive(Request $request, $id)
    {
        $standar = Standar::find($id);
        
        if ($request->has('active') && $request->active == 'on') {
            $standar->active = 'Ya';
            Session::flash('success', 'Standar berhasil diaktifkan!');
        } else {
            $standar->active = 'Tidak';
            Session::flash('success', 'Standar berhasil dinonaktifkan!');
        }
        
        $standar->save();
        $standar = Standar::paginate(10);
        return redirect()->route('standar.index', compact('standar'));
    }
    public function get_data($id)
    {
        $data = Standar::find($id);

        return response()->json([
            'name' => $data->name,
            'kode' => $data->kode,
        ]);

    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $standar = Standar::find($id);
        $standar->name = strtoupper($request->name);
        $standar->kode = $request->kode;
        $standar->save();
        $standar = Standar::paginate(10);
        Session::flash('success', 'Standar berhasil diupdate!');
        return redirect()->route('standar.index', compact('standar'));
    }
    public function delete($id)
    {
        //dd($id);
        $standar = Standar::find($id);
        $standar->delete();
        $standar = Standar::paginate(10);
        Session::flash('success', 'Standar berhasil dihapus!');
        return redirect()->route('standar.index', compact('standar'));
    }
}