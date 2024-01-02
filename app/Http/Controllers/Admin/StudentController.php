<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Facultate;
use App\Models\StudentInformatiiScolaritate;
use App\Models\StudentContextScolaritate;
use App\Models\StudentProfile;
use App\Models\StudentProfileLegal;
use App\Models\StudentProfileMinister;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = '';
        return view('admin.students.index');
    }

    public function createProfile()
    {
        return view('admin.students.create');
    }

    public function storeProfile(Request $request)
    {
        $request->validate([
           'nume_complet' => ['required', 'string', 'max:255'],
           'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.StudentProfile::class],
            'data_nastere' => ['required', 'date'],
            'tara_nastere' => ['string', 'max:255'],
            'judet_nastere' => ['string', 'max:255'],
            'sex' => ['required'],
        ]);

        $studentProfile = StudentProfile::create([
            'nume_complet' => $request->nume_complet,
            'email' => $request->email,
            'data_nastere' => $request->data_nastere,
            'tara_nastere' => $request->tara_nastere,
            'judet_nastere' => $request->judet_nastere,
            'sex' => $request->sex,
        ]);

        session (['id' => StudentProfile::where('email', $request->email)->value('id')]);

        return redirect()->route('admin.students.create-profile-legal')->with('message', 'Profile created successfully');
    }

    public function createProfileLegal()
    {
        $id = session('id');

        return view('admin.students.create-profile-legal', compact('id'));
    }

    public function storeProfileLegal(Request $request)
    {
        $request->validate([
            'mediu' => ['required'],
            'strain' => ['required'],
            'minoritar' => ['required'],
            'cetatenie' => ['required', 'string'],
            'nationalitate' => ['required'],
            'cnp' => ['required','numeric', 'max:13'],
            'serie' => ['required'],
            'stare_civila' => ['required'],
            'situatie_militara' => ['required'],
        ]);

        $studentProfileLegal = StudentProfileLegal::create([
            'sp_id' => $request->id,
            'mediu' => $request->mediu,
            'strain' => $request->strain,
            'minoritar' => $request->minoritar,
            'cetatenie' => $request->cetatenie,
            'nationalitate' => $request->nationalitate,
            'cnp' => $request->cnp,
            'serie' => $request->serie,
            'stare_civila' => $request->stare_civila,
            'situatie_militara' => $request->situatie_militara,
            'nr_livret_militar' => $request->nr_livret_militar,
        ]);


        return redirect()->route('admin.students.create-profile-minister');

    }

    public function createProfileMinister()
    {
        $id = session('id');

        return view('admin.students.create-profile-minister', compact('id'));
    }

    public function storeProfileMinister(Request $request)
    {
        $request->validate([
            'data_aprob_minister' => ['date'],
        ]);


        $studentProfileMinister = StudentProfileMinister::create([
            'sp_id' => $request->id,
            'serie_pasaport' => $request->serie_pasaport,
            'nr_aprob_minister' => $request->nr_aprob_minister,
            'serie_aprob_minister' => $request->serie_aprob_minister,
            'data_aprob_minister' => $request->data_aprob_minister,
        ]);

        return redirect()->route('admin.students.create-informatii-scolaritate');

    }


    public function createInformatiiScolaritate()
    {
        $id = session('id');
        return view('admin.students.create-informatii-scolaritate', compact('id'));

    }

    public function storeInformatiiScolaritate(Request $request)
    {
        $request->validate([
            'categorie_studii' => ['required'],
            'an_absolvire_liceu' => ['required', 'numeric', 'min:4'],
            'medie_bacalaureat' => ['required', 'numeric', 'between:0,10.01'],
            'medie_admitere' => ['numeric', 'between:0,10.01'],
            'promotie' => ['required'],

        ]);

        $informatiiScolaritate = StudentInformatiiScolaritate::create([
            'sp_id' => $request->id,
            'categorie_studii' => $request->categorie_studii,
            'an_absolvire_liceu' => $request->an_absolvire_liceu,
            'medie_bacalaureat' => $request->medie_bacalaureat,
            'olimpic' => $request->olimpic,
            'provenienta'=> $request->provenienta,
            'medie_admitere' => $request->medie_admitere,
            'promotie' => $request->promotie,
        ]);

        return redirect()->route('admin.students.create-context-scolaritate');
    }

    public function createContextScolaritate()
    {
        $id = session('id');
        $facultati = Facultate::all();

        return view('admin.students.create-context-scolaritate')->with([
            'id' => $id,
            'facultati' => $facultati,
        ]);
    }

    public function storeContextScolaritate(Request $request)
    {
        $request->validate([
            'facultate' => ['required'],
            'departament' => ['required'],
            'forma_invatamant' => ['required'],
            'an_studiu' => ['required'],
        ]);

        $contextScolaritate = StudentContextScolaritate::create([
            'sp_id' => $request->id,
            'facultate_id' => $request->facultate,
            'departament_id' => $request->departament,
            'forma_invatamant' => $request->forma_invatamant,
        ]);
    }

}
