<?php

namespace App\Http\Controllers\Admin;

use App\Professional;
use Illuminate\Support\Facades\Auth;

class ProfessionalController extends Controller
{
    public function index()
    {
        $admin = Auth::user();
        $professionals = Professional::orderBy('created_at', 'desc');
        return view('admin.professional.index', compact('admin', 'professionals'));
    }

    public function show(Professional $professional)
    {
        return view('admin.professional.show', compact('professional'));
    }

    public function create()
    {
        $admin = Auth::user();
        return view('admin.professional.create', compact('admin'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:4|max:50|unique:professionals,name',
            'email' => 'required|unique:customers,email|email',
        ]);
        $params = request(['name', 'email', 'type', 'charge']);
        $professional = Professional::create($params);
        return redirect("admin/professionals");
    }
}
