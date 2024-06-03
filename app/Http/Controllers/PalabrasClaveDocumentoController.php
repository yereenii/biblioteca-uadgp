<?php

namespace App\Http\Controllers;

use App\Models\PalabrasClaveDocumento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PalabrasClaveDocumentoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PalabrasClaveDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $palabrasClaveDocumentos = PalabrasClaveDocumento::paginate();

        return view('palabras-clave-documento.index', compact('palabrasClaveDocumentos'))
            ->with('i', ($request->input('page', 1) - 1) * $palabrasClaveDocumentos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $palabrasClaveDocumento = new PalabrasClaveDocumento();

        return view('palabras-clave-documento.create', compact('palabrasClaveDocumento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PalabrasClaveDocumentoRequest $request): RedirectResponse
    {
        PalabrasClaveDocumento::create($request->validated());

        return Redirect::route('palabras-clave-documentos.index')
            ->with('success', 'PalabrasClaveDocumento created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $palabrasClaveDocumento = PalabrasClaveDocumento::find($id);

        return view('palabras-clave-documento.show', compact('palabrasClaveDocumento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $palabrasClaveDocumento = PalabrasClaveDocumento::find($id);

        return view('palabras-clave-documento.edit', compact('palabrasClaveDocumento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PalabrasClaveDocumentoRequest $request, PalabrasClaveDocumento $palabrasClaveDocumento): RedirectResponse
    {
        $palabrasClaveDocumento->update($request->validated());

        return Redirect::route('palabras-clave-documentos.index')
            ->with('success', 'PalabrasClaveDocumento updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PalabrasClaveDocumento::find($id)->delete();

        return Redirect::route('palabras-clave-documentos.index')
            ->with('success', 'PalabrasClaveDocumento deleted successfully');
    }
}
