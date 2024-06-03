<?php

namespace App\Http\Controllers;

use App\Models\BitacoraConsulta;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\BitacoraConsultaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BitacoraConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $bitacoraConsultas = BitacoraConsulta::paginate();

        return view('bitacora-consulta.index', compact('bitacoraConsultas'))
            ->with('i', ($request->input('page', 1) - 1) * $bitacoraConsultas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $bitacoraConsulta = new BitacoraConsulta();

        return view('bitacora-consulta.create', compact('bitacoraConsulta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BitacoraConsultaRequest $request): RedirectResponse
    {
        BitacoraConsulta::create($request->validated());

        return Redirect::route('bitacora-consultas.index')
            ->with('success', 'BitacoraConsulta created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $bitacoraConsulta = BitacoraConsulta::find($id);

        return view('bitacora-consulta.show', compact('bitacoraConsulta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $bitacoraConsulta = BitacoraConsulta::find($id);

        return view('bitacora-consulta.edit', compact('bitacoraConsulta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BitacoraConsultaRequest $request, BitacoraConsulta $bitacoraConsulta): RedirectResponse
    {
        $bitacoraConsulta->update($request->validated());

        return Redirect::route('bitacora-consultas.index')
            ->with('success', 'BitacoraConsulta updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        BitacoraConsulta::find($id)->delete();

        return Redirect::route('bitacora-consultas.index')
            ->with('success', 'BitacoraConsulta deleted successfully');
    }
}
