<?php

namespace App\Http\Controllers;

use App\Imports\PengukuranImport;
use App\Models\Pengukuran;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
class PengukuranController extends Controller
{
    public function index()
    {
        $pengukuran = Pengukuran::all();

        return view('pengukuran.index', compact('pengukuran'));
    }
    public function search(Request $request)
    {
        //dd($request);
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $pengukuran = Pengukuran::where('tahun', 'like', '%' . $searchQuery . '%')
                    ->orWhere('value', 'like', '%' . $searchQuery . '%')
                    ->orWhereHas('indikator', function ($query) use ($searchQuery) {
                        $query->where('indikator', 'like', '%' . $searchQuery . '%')
                        ->orwhere('kode', 'like', '%' . $searchQuery . '%');
                        })
                    ->orWhereHas('audity', function ($query) use ($searchQuery) {
                        $query->where('name', 'like', '%' . $searchQuery . '%');
                        })
                    
                    ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial pengukuran_table dan kirimkan sebagai respons AJAX
        return view('pengukuran.partials.pengukuran_table', compact('pengukuran'))->render();
    }
    public function searchSelectAudity(Request $request)
    {
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $pengukuran = Pengukuran::whereHas('audity', function ($query) use ($searchQuery) {
                                    $query->where('name', 'like', '%' . $searchQuery . '%');
                                })
                                ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial pengukuran_table dan kirimkan sebagai respons AJAX
        return view('pengukuran.partials.pengukuran_table', compact('pengukuran'))->render();
    }
    public function searchSelectIndikator(Request $request)
    {
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $pengukuran = Pengukuran::whereHas('indikator', function ($query) use ($searchQuery) {
                                    $query->where('kode', 'like', '%' . $searchQuery . '%')
                                    ->where('indikator', 'like', '%' . $searchQuery . '%');
                                })
                                ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial pengukuran_table dan kirimkan sebagai respons AJAX
        return view('pengukuran.partials.pengukuran_table', compact('pengukuran'))->render();
    }
    public function create(Request $request)
    {
        //dd($request);
        $pengukuran = new Pengukuran;
        $pengukuran->audity_id = $request->audity_id;
        $pengukuran->indikator_id = $request->indikator_id;
        $pengukuran->tahun = $request->tahun;
        $pengukuran->value = $request->value;
        if($request->active == "on"){
            $pengukuran->active = "Ya";
        } else {
            $pengukuran->active = "Tidak";
        }
        $pengukuran->save();
        $pengukuran = Pengukuran::paginate(10);
        Session::flash('success', 'Pengukuran berhasil ditambahkan!');
        return redirect()->route('pengukuran.index', compact('pengukuran'));
    }
    public function updateActive(Request $request, $id)
    {
        $pengukuran = Pengukuran::find($id);
        
        if ($request->has('active') && $request->active == 'on') {
            $pengukuran->active = 'Ya';
            Session::flash('success', 'Pengukuran berhasil diaktifkan!');
        } else {
            $pengukuran->active = 'Tidak';
            Session::flash('success', 'Pengukuran berhasil dinonaktifkan!');
        }
        
        $pengukuran->save();
        $pengukuran = Pengukuran::paginate(10);
        return redirect()->route('pengukuran.index', compact('pengukuran'));
    }
    public function get_data($id)
    {
        $data = Pengukuran::find($id);

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
        $pengukuran = Pengukuran::find($id);
        $pengukuran->audity_id = $request->audity_id;
        $pengukuran->indikator_id = $request->indikator_id;
        $pengukuran->tahun = $request->tahun;
        $pengukuran->value = $request->value;
        $pengukuran->save();
        $pengukuran = Pengukuran::paginate(10);
        Session::flash('success', 'Pengukuran berhasil diupdate!');
        return redirect()->route('pengukuran.index', compact('pengukuran'));
    }
    public function delete($id)
    {
        //dd($id);
        $pengukuran = Pengukuran::find($id);
        $pengukuran->delete();
        $pengukuran = Pengukuran::paginate(10);
        Session::flash('success', 'Pengukuran berhasil dihapus!');
        return redirect()->route('pengukuran.index', compact('pengukuran'));
    }
    public function import(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|mimes:xlsx,xls' // Pastikan file yang diunggah adalah file Excel dengan ekstensi xlsx atau xls
        ]);

        // Ambil file Excel dari request
        $file = $request->file('file_excel');

        // Import data dari file Excel
        Excel::import(new PengukuranImport, $file);
        $pengukuran = Pengukuran::paginate(10);
        Session::flash('success', 'Pengukuran berhasil diunggah!');
        return redirect()->route('pengukuran.index', compact('pengukuran'));
    }
}