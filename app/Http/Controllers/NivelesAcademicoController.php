<?php

namespace App\Http\Controllers;

use App\Models\NivelesAcademico;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\NivelesAcademicoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class NivelesAcademicoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $nivelesAcademicos = NivelesAcademico::paginate();

        return view('niveles-academico.index', compact('nivelesAcademicos'))
            ->with('i', ($request->input('page', 1) - 1) * $nivelesAcademicos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $nivelesAcademico = new NivelesAcademico();

        return view('niveles-academico.create', compact('nivelesAcademico'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NivelesAcademicoRequest $request): RedirectResponse
    {
        NivelesAcademico::create($request->validated());

        return Redirect::route('niveles-academicos.index')
            ->with('success', 'NivelesAcademico created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $nivelesAcademico = NivelesAcademico::find($id);

        return view('niveles-academico.show', compact('nivelesAcademico'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $nivelesAcademico = NivelesAcademico::find($id);

        return view('niveles-academico.edit', compact('nivelesAcademico'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NivelesAcademicoRequest $request, NivelesAcademico $nivelesAcademico): RedirectResponse
    {
        $nivelesAcademico->update($request->validated());

        return Redirect::route('niveles-academicos.index')
            ->with('success', 'NivelesAcademico updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        NivelesAcademico::find($id)->delete();

        return Redirect::route('niveles-academicos.index')
            ->with('success', 'NivelesAcademico deleted successfully');
    }
}
