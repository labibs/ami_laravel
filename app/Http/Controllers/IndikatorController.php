<?php

namespace App\Http\Controllers;

use App\Models\Indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class IndikatorController extends Controller
{
    public function index()
    {
        $indikator = Indikator::all();

        return view('indikator.index', compact('indikator'));
    }
    public function search(Request $request)
    {
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $indikator = Indikator::where('standar_id', 'like', '%' . $searchQuery . '%')
                     ->orWhere('kode', 'like', '%' . $searchQuery . '%')
                     ->orWhere('indikator', 'like', '%' . $searchQuery . '%')
                     ->orWhere('rujukan_paps', 'like', '%' . $searchQuery . '%')
                     ->orWhere('rujukan_papt', 'like', '%' . $searchQuery . '%')
                     ->orWhere('dokumen', 'like', '%' . $searchQuery . '%')
                     ->orWhere('audity', 'like', '%' . $searchQuery . '%')
                     ->orWhere('pemangku_kepentingan', 'like', '%' . $searchQuery . '%')
                     ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial users_table dan kirimkan sebagai respons AJAX
        return View::make('indikator.partials.indikator_table', compact('indikator'))->render();
    }
    public function create(Request $request)
    {
        //dd($request);
        $indikator = new Indikator;
        $indikator->standar_id = $request->standar_id;
        $indikator->kode = $request->kode;
        $indikator->indikator = $request->indikator;
        $indikator->rujukan_paps = $request->rujukan_paps;
        $indikator->rujukan_papt = $request->rujukan_papt;
        $indikator->dokumen = $request->dokumen;
        $indikator->audity = $request->audity;
        $indikator->pemangku_kepentingan = $request->pemangku_kepentingan;
        if($request->active == "on"){
            $indikator->active = "Ya";
        } else {
            $indikator->active = "Tidak";
        }
        $indikator->save();
        $indikator = Indikator::paginate(10);
        Session::flash('success', 'Indikator berhasil ditambahkan!');
        return redirect()->route('indikator.index', compact('indikator'));
    }
    public function updateActive(Request $request, $id)
    {
        $indikator = Indikator::find($id);
        
        if ($request->has('active') && $request->active == 'on') {
            $indikator->active = 'Ya';
            Session::flash('success', 'Indikator berhasil diaktifkan!');
        } else {
            $indikator->active = 'Tidak';
            Session::flash('success', 'Indikator berhasil dinonaktifkan!');
        }
        
        $indikator->save();
        $indikator = Indikator::paginate(10);
        return redirect()->route('indikator.index', compact('indikator'));
    }
    public function get_data($id)
    {
        $data = Indikator::find($id);

        return response()->json([
            'standar_id' => $data->standar->kode,
            'standar' => $data->standar->name,
            'kode' => $data->kode,
            'indikator' => $data->indikator,
            'rujukan_paps' => $data->rujukan_paps,
            'rujukan_papt' => $data->rujukan_papt,
            'dokumen' => $data->dokumen,
            'audity' => $data->audity,
            'pemangku_kepentingan' => $data->pemangku_kepentingan,
        ]);

    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $indikator = Indikator::find($id);
        $indikator->standar_id = $request->standar_id;
        $indikator->kode = $request->kode;
        $indikator->indikator = $request->indikator;
        $indikator->rujukan_paps = $request->rujukan_paps;
        $indikator->rujukan_papt = $request->rujukan_papt;
        $indikator->dokumen = $request->dokumen;
        $indikator->audity = $request->audity;
        $indikator->pemangku_kepentingan = $request->pemangku_kepentingan;
        $indikator->save();
        $indikator = Indikator::paginate(10);
        Session::flash('success', 'Indikator berhasil diupdate!');
        return redirect()->route('indikator.index', compact('indikator'));
    }
    public function delete($id)
    {
        //dd($id);
        $indikator = Indikator::find($id);
        $indikator->delete();
        $indikator = Indikator::paginate(10);
        Session::flash('success', 'Indikator berhasil dihapus!');
        return redirect()->route('indikator.index', compact('indikator'));
    }
}