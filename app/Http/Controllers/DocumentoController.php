<?php

namespace App\Http\Controllers;

use App\Models\Documento;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\DocumentoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $documentos = Documento::paginate();

        return view('documento.index', compact('documentos'))
            ->with('i', ($request->input('page', 1) - 1) * $documentos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $documento = new Documento();

        return view('documento.create', compact('documento'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DocumentoRequest $request): RedirectResponse
    {
        Documento::create($request->validated());

        return Redirect::route('documentos.index')
            ->with('success', 'Documento created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $documento = Documento::find($id);

        return view('documento.show', compact('documento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $documento = Documento::find($id);

        return view('documento.edit', compact('documento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DocumentoRequest $request, Documento $documento): RedirectResponse
    {
        $documento->update($request->validated());

        return Redirect::route('documentos.index')
            ->with('success', 'Documento updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Documento::find($id)->delete();

        return Redirect::route('documentos.index')
            ->with('success', 'Documento deleted successfully');
    }
}
