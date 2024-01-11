<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Enums\LocuriAdmitere;
use App\Models\Facultate;
use App\Models\FacultateDepartamentLicenta;
use App\Models\StudentAdmis;
use App\Models\StudentInformatiiScolaritate;
use App\Models\StudentContextScolaritate;
use App\Models\StudentProfile;
use App\Models\StudentProfileLegal;
use App\Models\StudentProfileMinister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StudentController extends Controller
{
    public function index()
    {
        $students = DB::table('student_profile')
            ->join('student_context_scolaritate', 'student_profile.id', '=', 'student_context_scolaritate.sp_id')
            ->join('facultate', 'student_context_scolaritate.facultate_id', '=', 'facultate.id')
            ->join('facultate_departament_licenta', 'student_context_scolaritate.departament_id', '=', 'facultate_departament_licenta.id')
            ->select('student_profile.nume_complet AS nume', 'student_profile.email AS email', 'facultate.facultate_name as facultate', 'facultate_departament_licenta.departament_name as departament')
            ->paginate(10);

        $facultati = Facultate::all();


        return view('admin.students.index')->with([
            'students' => $students,
            'facultati' => $facultati,
        ]);
    }

    public function indexAdmisi()
    {
        $facultati = Facultate::all();

        return view('admin.students.admisi-index')->with([
            'facultati' => $facultati
        ]);
    }

    public function dashboardStudenti()
    {
        return view('admin.students.panou-principal');
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

        return view('admin.students.index');
    }

    public function genereazaStudentiAdmisi(Request $request)
    {
        $facultateId = $request->input('facultate');
        $departamentId = $request->input('departament');

        $facultate = Facultate::find($facultateId);
        $departament = FacultateDepartamentLicenta::find($departamentId);

        $locuriAdmitere = null;

        foreach(LocuriAdmitere::cases() as $locuri) {
            if ($locuri->name == strtolower($departament->departament_name)) {
                $locuriAdmitere = $locuri->value;
            }
        }

        if($locuriAdmitere !== null) {
            $tableName = strtolower('studenti_admisi_2024-2025');

            if(!Schema::hasTable($tableName)) {
                Schema::create($tableName, function($table) {
                    $table->id();
                    $table->unsignedBigInteger('sp_id');
                    $table->string('nume_complet');
                    $table->string('email');
                    $table->unsignedBigInteger('facultate_id');
                    $table->unsignedBigInteger('departament_id');
                    $table->float('medie_bacalaureat');
                    $table->boolean('loc_confirmat')->default(0);
                    $table->string('promotie');
                    $table->timestamps();

                    $table->foreign('sp_id')->references('id')->on('student_profile');
                    $table->foreign('facultate_id')->references('id')->on('facultate');
                    $table->foreign('departament_id')->references('id')->on('facultate_departament_licenta');
                });
            }

            $studentiAdmisi = DB::table('student_profile')
                ->join('student_context_scolaritate', 'student_profile.id', '=', 'student_context_scolaritate.sp_id')
                ->join('student_informatii_scolaritate', 'student_profile.id', '=', 'student_informatii_scolaritate.sp_id')
                ->select('student_profile.id AS sp_id',
                    'student_profile.nume_complet AS nume_complet',
                    'student_profile.email AS email',
                    'student_context_scolaritate.facultate_id AS facultate_id',
                    'student_context_scolaritate.departament_id AS departament_id',
                    'student_informatii_scolaritate.medie_bacalaureat AS medie_bacalaureat',
                    'student_informatii_scolaritate.promotie AS promotie')
                ->where('facultate_id', $facultateId)
                ->where('departament_id', $departamentId)
                ->orderBy('medie_bacalaureat', 'desc')
                ->take($locuriAdmitere)
                ->get();



            foreach ($studentiAdmisi as $student) {
                DB::table($tableName)->insert([
                    'sp_id' => $student->sp_id,
                    'nume_complet' => $student->nume_complet,
                    'email' => $student->email,
                    'facultate_id' => $student->facultate_id,
                    'departament_id' => $student->departament_id,
                    'medie_bacalaureat' => $student->medie_bacalaureat,
                    'promotie' => $student->promotie
                ]);

            }
            return redirect()->back()->with('message', 'generati');
        } else {
            return redirect()->back()->with('message', 'nu merge');
        }


    }

    public function completeazaLocuri(Request $request)
    {
        $departamentId = $request->departament_id;
        $facultateId = $request->facultate_id;
        $departamentName = FacultateDepartamentLicenta::find($departamentId);
        $locuriAdmitere = null;

        foreach(LocuriAdmitere::cases() as $locuri) {
            if ($locuri->name == strtolower($departamentName->departament_name)) {
                $locuriAdmitere = $locuri->value;
            }
        }

        $locConfirmate = DB::table('studenti_admisi_2024-2025')->where('loc_confirmat', '=', '1')->get()->count();
        $nrLocuriComp = $locuriAdmitere - $locConfirmate;

        $compLocuri = DB::table('student_profile')
            ->join('student_context_scolaritate', 'student_profile.id', '=', 'student_context_scolaritate.sp_id')
            ->join('student_informatii_scolaritate', 'student_profile.id', '=', 'student_informatii_scolaritate.sp_id')
            ->select('student_profile.id AS sp_id',
                'student_profile.nume_complet AS nume_complet',
                'student_profile.email AS email',
                'student_context_scolaritate.facultate_id AS facultate_id',
                'student_context_scolaritate.departament_id AS departament_id',
                'student_informatii_scolaritate.medie_bacalaureat AS medie_bacalaureat',
                'student_informatii_scolaritate.promotie')
            ->where('facultate_id', $facultateId)
            ->where('departament_id', $departamentId)
            ->orderBy('medie_bacalaureat', 'desc')
            ->skip($locuriAdmitere)
            ->take($nrLocuriComp)
            ->get();

        foreach($compLocuri as $compLoc) {
            DB::table('studenti_admisi_2024-2025')->insert([
                'sp_id' => $compLoc->sp_id,
                'nume_complet' => $compLoc->nume_complet,
                'email' => $compLoc->email,
                'facultate_id' => $compLoc->facultate_id,
                'departament_id' => $compLoc->departament_id,
                'medie_bacalaureat' => $compLoc->medie_bacalaureat,
                'promotie' => $compLoc->promotie
            ]);
        }

        return redirect()->back()->with('message', 'locuri completate');
    }

}
