<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultass = Fakultas::all();

        return view('fakultas.index', compact('fakultass'));
    }
}