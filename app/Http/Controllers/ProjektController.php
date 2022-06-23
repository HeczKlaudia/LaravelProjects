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
        $projektek  = Projekt::select('projekt.nev', 'projekt.leiras', 'projekt.statusz', DB::raw('count(kapcsolattarto.id) as osszes'))
            ->leftJoin('kapcsolattarto', 'kapcsolattarto.id', '=', 'projekt.kapcsolat_id')
            ->groupBy('projekt.nev', 'projekt.leiras', 'projekt.statusz')
            ->get();
        // dd($projektek);
        return view('projectList', compact('projektek'));
    }

    public function create()
    {

        return view('projectList');
    }

    public function edit($id)
    {
        $projekt = Projekt::find($id);
      //  dd($projekt);
        return view('projectEdit', compact('projekt'));
    }

    public function update(Request $req, $id)
    {
        
        $data = Projekt::find($id);
        $input = $req->all();
        $data->nev = $input['alvazSzam'];
        $data->leiras = $input['telephely'];
        $data->statusz = $input['napiAr'];
        $data->kapcsolat_id = $input['szin'];
        $data->save();

        return redirect('/adminAutok');
    }

    public function delete($id)
    {
        $data = Projekt::find($id);
        $data->delete();
        return redirect()->back();
    }
}
