<?php

namespace App\Http\Controllers\Admin;

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
//        $professionals = Professional::orderBy('id')->with('type')->paginate(10);
//        return view('admin.professional.index', compact('professionals'));
        return view('admin.professional.index', compact('profTypes', 'professionals'));

    }

    public function show(Professional $professional)
    {
        return view('admin.professional.show', compact('professional'));
    }

    public function create()
    {
        $profTypes = ProfessionalType::all();
        return view('admin.professional.create', compact('profTypes'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:4|max:50|unique:professionals,name',
            'email' => 'required|unique:customers,email|email',
        ]);
        $params = request(['name', 'email', 'type_id', 'charge']);
        $professional = Professional::create($params);
        return redirect("admin/professionals");
    }

    public function destroy(Professional $professional)
    {
        $professional->delete();
        return [
            'error' => 0,
            'msg' => ''
        ];
    }
}
