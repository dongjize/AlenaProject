<?php

namespace App\Http\Controllers;

use App\Professional;
use App\ProfessionalType;

class ProfessionalController extends Controller
{
    public function index()
    {
        $profTypes = ProfessionalType::all();
        if (request('type_id') != '') {
            $queryType = request('type_id');
            $professionals = Professional::where('type_id', $queryType)->orderBy('id')->with('type')->paginate(10);
        } else {
            $professionals = Professional::orderBy('id')->with('type')->paginate(10);
        }
        return view('professional.index', compact('profTypes', 'professionals'));
    }

    public function show(Professional $professional)
    {
        return view('professional.show', compact('professional'));
    }

}
