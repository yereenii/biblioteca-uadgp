<?php

namespace App\Http\Controllers;

use App\Models\TiposDocumento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\TiposDocumentoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class TiposDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $tiposDocumentos = TiposDocumento::paginate();

        return view('tipos-documento.index', compact('tiposDocumentos'))
            ->with('i', ($request->input('page', 1) - 1) * $tiposDocumentos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $tiposDocumento = new TiposDocumento();

        return view('tipos-documento.create', compact('tiposDocumento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TiposDocumentoRequest $request): RedirectResponse
    {
        TiposDocumento::create($request->validated());

        return Redirect::route('tipos-documentos.index')
            ->with('success', 'TiposDocumento created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $tiposDocumento = TiposDocumento::find($id);

        return view('tipos-documento.show', compact('tiposDocumento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $tiposDocumento = TiposDocumento::find($id);

        return view('tipos-documento.edit', compact('tiposDocumento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TiposDocumentoRequest $request, TiposDocumento $tiposDocumento): RedirectResponse
    {
        $tiposDocumento->update($request->validated());

        return Redirect::route('tipos-documentos.index')
            ->with('success', 'TiposDocumento updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        TiposDocumento::find($id)->delete();

        return Redirect::route('tipos-documentos.index')
            ->with('success', 'TiposDocumento deleted successfully');
    }
}
