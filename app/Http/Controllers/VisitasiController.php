<?php

namespace App\Http\Controllers;

use App\Models\Visitasi;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class VisitasiController extends Controller
{
    public function index()
    {
        $visitasi = Visitasi::all();

        return view('visitasi.index', compact('visitasi'));
    }
    public function search(Request $request)
    {
        //dd($request);
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $visitasi = Visitasi::where('tahun', 'like', '%' . $searchQuery . '%')
                    ->orWhere('value', 'like', '%' . $searchQuery . '%')
                    ->orWhereHas('indikator', function ($query) use ($searchQuery) {
                        $query->where('indikator', 'like', '%' . $searchQuery . '%')
                        ->orwhere('kode', 'like', '%' . $searchQuery . '%');
                        })
                    ->orWhereHas('audity', function ($query) use ($searchQuery) {
                        $query->where('name', 'like', '%' . $searchQuery . '%');
                        })
                    
                    ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial visitasi_table dan kirimkan sebagai respons AJAX
        return view('visitasi.partials.visitasi_table', compact('visitasi'))->render();
    }
    public function searchSelectAudity(Request $request)
    {
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $visitasi = Visitasi::whereHas('audity', function ($query) use ($searchQuery) {
                                    $query->where('name', 'like', '%' . $searchQuery . '%');
                                })
                                ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial visitasi_table dan kirimkan sebagai respons AJAX
        return view('visitasi.partials.visitasi_table', compact('visitasi'))->render();
    }
    public function searchSelectIndikator(Request $request)
    {
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $visitasi = Visitasi::whereHas('indikator', function ($query) use ($searchQuery) {
                                    $query->where('kode', 'like', '%' . $searchQuery . '%')
                                    ->where('indikator', 'like', '%' . $searchQuery . '%');
                                })
                                ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial visitasi_table dan kirimkan sebagai respons AJAX
        return view('visitasi.partials.visitasi_table', compact('visitasi'))->render();
    }
    public function create(Request $request)
    {
        //dd($request);
        $visitasi = new Visitasi();
        $visitasi->audity_id = $request->audity_id;
        $visitasi->indikator_id = $request->indikator_id;
        $visitasi->tahun = $request->tahun;
        $visitasi->value = $request->value;
        if($request->active == "on"){
            $visitasi->active = "Ya";
        } else {
            $visitasi->active = "Tidak";
        }
        $visitasi->save();
        $visitasi = Visitasi::paginate(10);
        Session::flash('success', 'Visitasi berhasil ditambahkan!');
        return redirect()->route('visitasi.index', compact('visitasi'));
    }
    public function updateActive(Request $request, $id)
    {
        $visitasi = Visitasi::find($id);
        
        if ($request->has('active') && $request->active == 'on') {
            $visitasi->active = 'Ya';
            Session::flash('success', 'Visitasi berhasil diaktifkan!');
        } else {
            $visitasi->active = 'Tidak';
            Session::flash('success', 'Visitasi berhasil dinonaktifkan!');
        }
        
        $visitasi->save();
        $visitasi = Visitasi::paginate(10);
        return redirect()->route('visitasi.index', compact('visitasi'));
    }
    public function get_data($id)
    {
        $data = Visitasi::find($id);

        return response()->json([
            'audity_id' => $data->audity_id,
            'indikator_id' => $data->indikator_id,
            'tahun' => $data->tahun,
            'value' => $data->value,
        ]);

    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $visitasi = Visitasi::find($id);
        $visitasi->audity_id = $request->audity_id;
        $visitasi->indikator_id = $request->indikator_id;
        $visitasi->tahun = $request->tahun;
        $visitasi->value = $request->value;
        $visitasi->save();
        $visitasi = Visitasi::paginate(10);
        Session::flash('success', 'Visitasi berhasil diupdate!');
        return redirect()->route('visitasi.index', compact('visitasi'));
    }
    public function delete($id)
    {
        //dd($id);
        $visitasi = Visitasi::find($id);
        $visitasi->delete();
        $visitasi = Visitasi::paginate(10);
        Session::flash('success', 'Visitasi berhasil dihapus!');
        return redirect()->route('visitasi.index', compact('visitasi'));
    }
}