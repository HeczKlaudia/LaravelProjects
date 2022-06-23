<?php

namespace App\Http\Controllers;

use App\Models\Kapcsolattarto;
use Illuminate\Http\Request;
use App\Models\Projekt;

class KapcsolattartoController extends Controller
{
    public function index()
    {
        $projektek = Projekt::with('kapcsolattarto')->get();
        /*  dd($projektek); */
        return view('projects', compact('projektek'));
    }
}
