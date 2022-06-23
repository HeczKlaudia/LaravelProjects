<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projekt;
use App\Models\Kapcsolattarto;
use Illuminate\Support\Facades\DB;

class ProjektController extends Controller
{
    public function index()
    {

        $kapcsolatok = DB::table('kapcsolattarto')->get();

        /* KAPCSOLATTARTÓK ÖSSZESÍTÉSE NEM MŰKÖDIK */
        $projektek  = Projekt::select('projekt.id', 'projekt.nev', 'projekt.leiras', 'projekt.statusz')
            ->addSelect(DB::raw('count(kapcsolattarto.id) as osszes'))
            ->leftJoin('kapcsolattarto', 'kapcsolattarto.id', '=', 'projekt.kapcsolat_id')
            ->groupBy('projekt.id', 'projekt.nev', 'projekt.leiras', 'projekt.statusz')
            ->get();

        // dd($projektek);
        return view('projectList', compact('projektek', 'kapcsolatok'));
    }

    public function create()
    {

        return view('projectList');
    }

    public function newProject(Request $req)
    {
        $projekt = new Projekt;

        $projekt->nev = $req->input('nev');
        $projekt->leiras = $req->input('leiras');
        $projekt->statusz = $req->input('statusz');
        $projekt->kapcsolat_id = $req->input('kapcsolatok');
        // dd($projekt);
        $projekt->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $projekt = Projekt::find($id);
        //  dd($projekt);
        return response()->json([
            'status' => 200,
            'projekt' => $projekt,
        ]);
    }

    public function update(Request $req)
    {
        $projekt_id = $req->input('projekt_id');
        $projekt = Projekt::find($projekt_id);
        $projekt->nev = $req->input('nev');
        $projekt->leiras = $req->input('leiras');
        $projekt->statusz = $req->input('statusz');
        $projekt->kapcsolat_id = $req->input('kapcsolat_id');
        $projekt->save();
        return redirect()->back('status', 'Projekt módosítva!');
    }

    public function delete($id)
    {
        $data = Projekt::find($id);
        $data->delete();
        return redirect()->back();
    }
}
