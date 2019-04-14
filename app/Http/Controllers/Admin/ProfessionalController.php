<?php

namespace App\Http\Controllers\Admin;

use App\Professional;
use App\ProfessionalType;
use Illuminate\Support\Facades\Auth;

class ProfessionalController extends Controller
{
    public function index()
    {
        $professionals = Professional::orderBy('id')->with('type')->paginate(10);
        return view('admin.professional.index', compact('professionals'));
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

    public function delete(Professional $professional)
    {
        $professional->delete();
        return redirect("/admin/professionals");
    }
}
