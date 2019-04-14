<?php

namespace App\Http\Controllers;

use App\Professional;

class ProfessionalController extends Controller
{
    public function index()
    {
        $professionals = Professional::orderBy('id')->with('type')->paginate(10);
        return view('professional.index', compact('professionals'));
    }

    public function show(Professional $professional)
    {
        return view('professional.show', compact('professional'));
    }
}
