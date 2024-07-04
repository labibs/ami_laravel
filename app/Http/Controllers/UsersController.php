<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UsersController extends Controller
{
    public function index()
    {
        // Contoh method index untuk menampilkan semua pengguna
        $users = User::paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman
        return view('users.index', compact('users'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->get('search');

        // Lakukan pencarian di database berdasarkan query yang diterima
        $users = User::where('name', 'like', '%' . $searchQuery . '%')
                     ->orWhere('email', 'like', '%' . $searchQuery . '%')
                     ->paginate(10); // Misalnya menggunakan pagination dengan 10 item per halaman

        // Render view partial users_table dan kirimkan sebagai respons AJAX
        return View::make('users.partials.users_table', compact('users'))->render();
    }

    public function create(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->ketua_grup = $request->ketua_grup;
        $user->grup = $request->grup;
        $user->situs = $request->situs;
        $user->hak_akses = $request->hak_akses;
        if($request->active == "on"){
            $user->active = "Ya";
        } else {
            $user->active = "Tidak";
        }
        $user->email =$request->email;
        $user->password = bcrypt($request->password) ;
        $user->remember_token = bcrypt(60);
        $user->save();
        $users = User::paginate(10);
        Session::flash('success', 'User berhasil ditambahkan!');
        return view('users.index', compact('users'));
    }
    public function updateActive(Request $request, $id)
    {
        $user = User::find($id);
        
        if ($request->has('active') && $request->active == 'on') {
            $user->active = 'Ya';
            Session::flash('success', 'User berhasil diaktifkan!');
        } else {
            $user->active = 'Tidak';
            Session::flash('success', 'User berhasil dinonaktifkan!');
        }
        
        $user->save();
        $users = User::paginate(10);
        return redirect()->route('users.index', compact('users'));
    }

    public function get_data($id)
    {
        $data = User::find($id);

        return response()->json([
            'name' => $data->name,
            'email' => $data->email,
            'password' => $data->password,
            'grup' => $data->grup,
            'ketua_grup' => $data->ketua_grup,
            'situs' => $data->situs,
            'hak_akses' => $data->hak_akses,
        ]);

    }
    public function update(Request $request, $id)
    {
        //dd($request);
        $user = User::find($id);
        $user->name = $request->name;
        $user->ketua_grup = $request->ketua_grup;
        $user->grup = $request->grup;
        $user->situs = $request->situs;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->hak_akses = $request->hak_akses;
        $imag = $request->file('avatar');
        if ($imag) {
            $namafile = 'foto-' . time() . '.' . $imag->getClientOriginalExtension();
            $user->avatar = $namafile;
            $imag->storeAs('/public/images', $namafile); // Simpan file ke dalam direktori "slip/images"
        }
        $user->save();
        $users = User::paginate(10);
        Session::flash('success', 'User berhasil diupdate!');
        return redirect()->route('users.index', compact('users'));
    }
}