<?php

namespace App\Http\Controllers;

use App\Imports\TargetImport;
use App\Models\Target;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\View;

class TargetController extends Controller
{
    public function index()
    {
        $target = Target::where('id','!=',1)->get();

        return view('target.index', compact('target'));
    }
    public function search(Request $request)
    {
        //dd($request);
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $target = Target::where('tahun', 'like', '%' . $searchQuery . '%')
                    ->orWhere('value', 'like', '%' . $searchQuery . '%')
                    ->orWhereHas('indikator', function ($query) use ($searchQuery) {
                        $query->where('indikator', 'like', '%' . $searchQuery . '%')
                        ->orwhere('kode', 'like', '%' . $searchQuery . '%');
                        })
                    ->orWhereHas('audity', function ($query) use ($searchQuery) {
                        $query->where('name', 'like', '%' . $searchQuery . '%');
                        })
                    
                    ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial target_table dan kirimkan sebagai respons AJAX
        return view('target.partials.target_table', compact('target'))->render();
    }
    public function searchSelectAudity(Request $request)
    {
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $target = Target::whereHas('audity', function ($query) use ($searchQuery) {
                                    $query->where('name', 'like', '%' . $searchQuery . '%');
                                })
                                ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial target_table dan kirimkan sebagai respons AJAX
        return view('target.partials.target_table', compact('target'))->render();
    }
    public function searchSelectIndikator(Request $request)
    {
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $target = Target::whereHas('indikator', function ($query) use ($searchQuery) {
                                    $query->where('kode', 'like', '%' . $searchQuery . '%')
                                    ->where('indikator', 'like', '%' . $searchQuery . '%');
                                })
                                ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial target_table dan kirimkan sebagai respons AJAX
        return view('target.partials.target_table', compact('target'))->render();
    }
    public function create(Request $request)
    {
        //dd($request);
        $target = new Target;
        $target->audity_id = $request->audity_id;
        $target->indikator_id = $request->indikator_id;
        $target->tahun = $request->tahun;
        $target->value = $request->value;
        if($request->active == "on"){
            $target->active = "Ya";
        } else {
            $target->active = "Tidak";
        }
        $target->save();
        $target = Target::paginate(10);
        Session::flash('success', 'Target berhasil ditambahkan!');
        return redirect()->route('target.index', compact('target'));
    }
    public function updateActive(Request $request, $id)
    {
        $target = Target::find($id);
        
        if ($request->has('active') && $request->active == 'on') {
            $target->active = 'Ya';
            Session::flash('success', 'Target berhasil diaktifkan!');
        } else {
            $target->active = 'Tidak';
            Session::flash('success', 'Target berhasil dinonaktifkan!');
        }
        
        $target->save();
        $target = Target::paginate(10);
        return redirect()->route('target.index', compact('target'));
    }
    public function get_data($id)
    {
        $data = Target::find($id);

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
        $target = Target::find($id);
        $target->audity_id = $request->audity_id;
        $target->indikator_id = $request->indikator_id;
        $target->tahun = $request->tahun;
        $target->value = $request->value;
        $target->save();
        $target = Target::paginate(10);
        Session::flash('success', 'Target berhasil diupdate!');
        return redirect()->route('target.index', compact('target'));
    }
    public function delete($id)
    {
        //dd($id);
        $target = Target::find($id);
        $target->delete();
        $target = Target::paginate(10);
        Session::flash('success', 'Target berhasil dihapus!');
        return redirect()->route('target.index', compact('target'));
    }
    public function import(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|mimes:xlsx,xls' // Pastikan file yang diunggah adalah file Excel dengan ekstensi xlsx atau xls
        ]);

        // Ambil file Excel dari request
        $file = $request->file('file_excel');

        // Import data dari file Excel
        Excel::import(new TargetImport, $file);
        $target = Target::paginate(10);
        Session::flash('success', 'Target berhasil diunggah!');
        return redirect()->route('target.index', compact('target'));
    }
}