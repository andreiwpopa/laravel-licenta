<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class ProfesorController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        return view('admin.profesor.create');
    }
}
