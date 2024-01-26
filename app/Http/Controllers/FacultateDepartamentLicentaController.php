<?php

namespace App\Http\Controllers;

use App\Models\FacultateDepartamentLicenta;
use Illuminate\Http\Request;

class FacultateDepartamentLicentaController extends Controller
{
    public function getByFacultate($facultate_id)
    {
        $departamente = FacultateDepartamentLicenta::where('facultate_id', $facultate_id)->get();

        return response()->json($departamente);
    }
}
