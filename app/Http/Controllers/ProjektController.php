<?php

namespace App\Http\Controllers;

use App\Models\Kapcsolattarto;
use Illuminate\Http\Request;
use App\Models\Projekt;
use Illuminate\Support\Facades\DB;
use App\Notifications\EmailSendWhenEdit;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class ProjektController extends Controller
{

    public function index(Request $request)
    {

        $search = $request->input('search');

        DB::statement("SET SQL_MODE=''");

        $project_search = DB::table('Projekt')
            ->select('projekt.id', 'projekt.nev', 'projekt.leiras', 'projekt.statusz', DB::raw('count(kapcsolattarto.id) as osszes'))
            ->leftJoin('kapcsolattarto', 'kapcsolattarto.id', '=', 'projekt.kapcsolat_id')
            ->groupBy('projekt.nev')
            ->orderBy('projekt.nev', 'ASC')
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

    public function addKapcsolat(Request $req, $id)
    {
        $addKapcsolat = Projekt::find($id);
        //  dd($req);
        $projekt = new Projekt;
        $projekt->nev = $addKapcsolat->nev;
        $projekt->leiras = $addKapcsolat->leiras;
        $projekt->statusz = $addKapcsolat->statusz;
        $projekt->kapcsolat_id = $req->kapcsolatok;
        $projekt->save();

        return redirect()->back();
    }

    public function ujKapcsolat(Request $req)
    {
        $uj_kapcsolat = new Kapcsolattarto();
        $uj_kapcsolat->nev = $req->input('nev');
        $uj_kapcsolat->email = $req->input('email');
        $uj_kapcsolat->save();
        return redirect()->back();
    }

    public function edit($id)
    {
        $projekt = Projekt::find($id);

        $addKapcsolat = DB::table('Kapcsolattarto')
            ->select('*')
            ->get();

        $projekt_kapcs = DB::table('Projekt')
            ->select('kapcsolattarto.nev', 'kapcsolattarto.id')
            ->leftJoin('kapcsolattarto', 'kapcsolattarto.id', '=', 'projekt.kapcsolat_id')
            ->where('projekt.nev', '=', $projekt->nev)
            ->get();

        return view('editPoject', compact('projekt', 'projekt_kapcs', 'addKapcsolat'));
    }

    public function update(Request $req, $id)
    {

        $projekt = Projekt::find($id);

        $data = [
            'body' => 'Adatok módosítva',
            'enrollmentText' => 'allowed',
            'url' => url('/'),
            'thankyou' => 'Thanks'
        ];

        $projekt->nev = $req->input('nev');
        $projekt->leiras = $req->input('leiras');
        $projekt->statusz = $req->input('statusz');
        $projekt->kapcsolat_id = $req->input('kapcsolat_id');
        $projekt->save();
        
        $projekt->notify(new EmailSendWhenEdit($data));

        return redirect()->back();

        /* hiányzó feladat: validáció, ha egy mező üres */

        /* modal-lal nem működik */
    }

    public function deleteKapcsolat($id)
    {
        $projekt = Projekt::select('*')
            ->where('kapcsolat_id', '=', $id);
        //  dd($projekt);
        $projekt->delete();
        return redirect()->back();
    }

    public function delete($id)
    {
        $data = Projekt::find($id);
        $data->delete();
        return redirect()->back();
    }
}
