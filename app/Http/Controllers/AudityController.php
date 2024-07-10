<?php

namespace App\Http\Controllers;

use App\Models\Audity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class AudityController extends Controller
{
    public function index()
    {
        $audity = Audity::all();

        return view('audity.index', compact('audity'));
    }
    public function search(Request $request)
    {
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $audity = Audity::where('name', 'like', '%' . $searchQuery . '%')
            ->orWhereHas('fakultas', function ($query) use ($searchQuery) {
            $query->where('name', 'like', '%' . $searchQuery . '%');
            })
            ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial users_table dan kirimkan sebagai respons AJAX
        return View::make('audity.partials.audity_table', compact('audity'))->render();
    }
    public function create(Request $request)
    {
        //dd($request);
        $audity = new Audity;
        $audity->name = $request->name;
        $audity->institusi_id = $request->institusi_id;
        if($request->active == "on"){
            $audity->active = "Ya";
        } else {
            $audity->active = "Tidak";
        }
        $audity->save();
        $audity = Audity::paginate(10);
        Session::flash('success', 'Audity berhasil ditambahkan!');
        return redirect()->route('audity.index', compact('audity'));
    }
    public function updateActive(Request $request, $id)
    {
        $audity = Audity::find($id);
        
        if ($request->has('active') && $request->active == 'on') {
            $audity->active = 'Ya';
            Session::flash('success', 'Audity berhasil diaktifkan!');
        } else {
            $audity->active = 'Tidak';
            Session::flash('success', 'Audity berhasil dinonaktifkan!');
        }
        
        $audity->save();
        $audity = Audity::paginate(10);
        return redirect()->route('audity.index', compact('audity'));
    }
    public function get_data($id)
    {
        $data = Audity::find($id);

        return response()->json([
            'name' => $data->name,
            'institusi_id' => $data->institusi_id,
        ]);

    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $audity = Audity::find($id);
        $audity->name = $request->name;
        $audity->institusi_id = $request->institusi_id;
        $audity->save();
        $audity = Audity::paginate(10);
        Session::flash('success', 'Audity berhasil diupdate!');
        return redirect()->route('audity.index', compact('audity'));
    }
    public function delete($id)
    {
        //dd($id);
        $audity = Audity::find($id);
        $audity->delete();
        $audity = Audity::paginate(10);
        Session::flash('success', 'Audity berhasil dihapus!');
        return redirect()->route('audity.index', compact('audity'));
    }

}