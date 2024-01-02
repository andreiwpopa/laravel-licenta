<?php

namespace App\Http\Controllers;

use App\Models\DepartamentDisciplineLicenta;
use Illuminate\Http\Request;

class DepartamentDisciplineLicentaController extends Controller
{
    public function getByDepartament($departament_id)
    {
        $discipline = DepartamentDisciplineLicenta::where('departament_id', $departament_id)->get();

        return response()->json($discipline);
    }
}
