<?php

namespace App\Http\Controllers;

use App\Models\Investigadore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\InvestigadoreRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class InvestigadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $investigadores = Investigadore::paginate();

        return view('investigadore.index', compact('investigadores'))
            ->with('i', ($request->input('page', 1) - 1) * $investigadores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $investigadore = new Investigadore();

        return view('investigadore.create', compact('investigadore'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(InvestigadoreRequest $request): RedirectResponse
    {
        Investigadore::create($request->validated());

        return Redirect::route('investigadores.index')
            ->with('success', 'Investigadore created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $investigadore = Investigadore::find($id);

        return view('investigadore.show', compact('investigadore'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $investigadore = Investigadore::find($id);

        return view('investigadore.edit', compact('investigadore'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(InvestigadoreRequest $request, Investigadore $investigadore): RedirectResponse
    {
        $investigadore->update($request->validated());

        return Redirect::route('investigadores.index')
            ->with('success', 'Investigadore updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Investigadore::find($id)->delete();

        return Redirect::route('investigadores.index')
            ->with('success', 'Investigadore deleted successfully');
    }

    public function add($datos){
        $investigadorNew = Investigadore::create($datos);

        return $investigadorNew->id ?? 0;
    }

    public function findByUsuarioId($usuario_id){
        $investigador = Investigadore::where('usuario_id', $usuario_id)->first();

        return $investigador;
    }
}
