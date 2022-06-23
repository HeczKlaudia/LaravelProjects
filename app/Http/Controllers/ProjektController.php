<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projekt;
use Illuminate\Support\Facades\DB;

class ProjektController extends Controller
{

    public function index(Request $request)
    {

        /* hiányzó feladat: kapcsolattartók összesítése projektekkel */

        $search = $request->input('search');

        $project_search = Projekt::query()
            ->select('projekt.id', 'projekt.nev', 'projekt.leiras', 'projekt.statusz')
            ->addSelect(DB::raw('count(kapcsolattarto.id) as osszes'))
            ->leftJoin('kapcsolattarto', 'kapcsolattarto.id', '=', 'projekt.kapcsolat_id')
            ->groupBy('projekt.id', 'projekt.nev', 'projekt.leiras', 'projekt.statusz')
            ->where('projekt.statusz', 'LIKE', "%{$search}%")
            ->orWhere('projekt.nev', 'LIKE', "%{$search}%")
            ->Paginate(10);


        $kapcsolatok = DB::table('kapcsolattarto')->get();

        //     dd($projektek);
        return view('projectList', compact('kapcsolatok', 'project_search'));
    }

    public function newProject(Request $req)
    {
        $projekt = new Projekt;
        $projekt->nev = $req->input('nev');
        $projekt->leiras = $req->input('leiras');
        $projekt->statusz = $req->input('statusz');
        $projekt->kapcsolat_id = $req->input('kapcsolatok');
        $projekt->save();
        return redirect()->back();

        /* hiányzó feladat: validálás, ha nem választ ki státuszt */
    }

    public function edit($id)
    {
        $kapcsolatok = DB::table('kapcsolattarto')->get();
        $projekt = Projekt::find($id);
        return view('editPoject', compact('projekt', 'kapcsolatok'));
    }

    public function update(Request $req, $id)
    {
        $projekt = Projekt::find($id);
        $projekt->nev = $req->input('nev');
        $projekt->leiras = $req->input('leiras');
        $projekt->statusz = $req->input('statusz');
        $projekt->kapcsolat_id = $req->input('kapcsolat_id');
        $projekt->save();
        return redirect()->back();

        /* hiányzó feladat: validáció, ha egy mező üres */

        /* modal-lal nem működik */
    }

    public function delete($id)
    {
        $data = Projekt::find($id);
        $data->delete();
        return redirect()->back();
    }
}
