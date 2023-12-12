<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Enums\Roles;
use App\Models\StudentProfile;
use App\Models\StudentProfileLegal;
use App\Models\StudentProfileMinister;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::whereNotIn('name', ['admin'])->get();

        return view ('admin.users.create', compact('roles'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role
        ]);

        event(new Registered($user));

        $role = $request->role;
        session(['uid' => User::where('email', $request->email)->value('id')]);

        switch($role) {
            case Roles::PROFESOR->value:
                $user->assignRole('profesor');
                return redirect()->route('');
                break;
            case Roles::STUDENT->value:
                $user->assignRole('student');
                return redirect()->route('admin.users.create-student-profile');
                break;
        }
    }
    public function createStudentProfile()
    {
        $uid = session('uid');

        return view('admin.users.student.create-profile', compact('uid'));
    }

    public function storeStudentProfile(Request $request)
    {
        $request->validate([
            'nume_dupa_casatorie' => ['string', 'max:255'],
            'data_nastere' => ['required', 'date'],
            'tara_nastere' => ['string', 'max:255'],
            'judet_nastere' => ['string', 'max:255'],
            'sex' => ['required'],
        ]);

        $studentProfile = StudentProfile::create([
            'user_id' => $request->id,
            'nume_dupa_casatorie' => $request->nume_dupa_casatorie,
            'data_nastere' => $request->data_nastere,
            'tara_nastere' => $request->tara_nastere,
            'judet_nastere' => $request->judet_nastere,
            'sex' => $request->sex,
        ]);


        return redirect()->route('admin.users.create-student-profile-legal');
    }

    public function createStudentProfileLegal()
    {
        $uid = session('uid');

        return view('admin.users.student.create-profile-legal', compact('uid'));

    }

    public function storeStudentProfileLegal(Request $request)
    {
        $request->validate([
            'mediu' => ['required'],
            'strain' => ['required'],
            'minoritar' => ['required'],
            'cetatenie' => ['required', 'string'],
            'nationalitate' => ['required'],
            'cnp' => ['required', 'max:13'],
            'serie' => ['required'],
            'stare_civila' => ['required'],
            'situatie_militara' => ['required'],
        ]);

        $studentProfileLegal = StudentProfileLegal::create([
            'user_id' => $request->id,
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


        return redirect()->route('admin.users.create-student-profile-minister');

    }

    public function createStudentProfileMinister()
    {
        $uid = session('uid');

        return view('admin.users.student.create-profile-minister', compact('uid'));
    }

    public function storeStudentProfileMinister(Request $request)
    {
        $request->validate([
            'data_aprob_minister' => ['date'],
        ]);


        $studentProfileMinister = StudentProfileMinister::create([
            'user_id' => $request->id,
            'serie_pasaport' => $request->serie_pasaport,
            'nr_aprob_minister' => $request->nr_aprob_minister,
            'serie_aprob_minister' => $request->serie_aprob_minister,
            'data_aprob_minister' => $request->data_aprob_minister,
        ]);

        session()->forget('uid');
    }
}
