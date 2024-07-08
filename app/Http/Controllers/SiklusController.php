<?php

namespace App\Http\Controllers;

use App\Models\Siklus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class SiklusController extends Controller
{
    public function index()
    {
        $siklus = Siklus::all();

        return view('siklus.index', compact('siklus'));
    }
    public function search(Request $request)
    {
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $siklus = Siklus::where('name', 'like', '%' . $searchQuery . '%')
                     ->orWhere('description', 'like', '%' . $searchQuery . '%')
                     ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial users_table dan kirimkan sebagai respons AJAX
        return View::make('siklus.partials.siklus_table', compact('siklus'))->render();
    }
    public function create(Request $request)
    {
        //dd($request);
        $siklus = new Siklus;
        $siklus->name = $request->name;
        $siklus->description = $request->description;
        if($request->active == "on"){
            $siklus->active = "Ya";
        } else {
            $siklus->active = "Tidak";
        }
        $siklus->save();
        $siklus = Siklus::paginate(10);
        Session::flash('success', 'Siklus berhasil ditambahkan!');
        return redirect()->route('siklus.index', compact('siklus'));
    }
    public function updateActive(Request $request, $id)
    {
        $siklus = Siklus::find($id);
        
        if ($request->has('active') && $request->active == 'on') {
            $siklus->active = 'Ya';
            Session::flash('success', 'Siklus berhasil diaktifkan!');
        } else {
            $siklus->active = 'Tidak';
            Session::flash('success', 'Siklus berhasil dinonaktifkan!');
        }
        
        $siklus->save();
        $siklus = Siklus::paginate(10);
        return redirect()->route('siklus.index', compact('siklus'));
    }
    public function get_data($id)
    {
        $data = Siklus::find($id);

        return response()->json([
            'name' => $data->name,
            'description' => $data->description,
        ]);

    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $siklus = Siklus::find($id);
        $siklus->name = $request->name;
        $siklus->description = $request->description;
        $siklus->save();
        $siklus = Siklus::paginate(10);
        Session::flash('success', 'Siklus berhasil diupdate!');
        return redirect()->route('siklus.index', compact('siklus'));
    }
    public function delete($id)
    {
        //dd($id);
        $siklus = Siklus::find($id);
        $siklus->delete();
        $siklus = Siklus::paginate(10);
        Session::flash('success', 'Siklus berhasil dihapus!');
        return redirect()->route('siklus.index', compact('siklus'));
    }
}