<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnitKerja;

class UnitKerjaController extends Controller
{
    public function index()
    {
        // select * from unit_kerja
        $units = UnitKerja::all();
        return view('unit-kerja.index', compact('units'));
    }
}
