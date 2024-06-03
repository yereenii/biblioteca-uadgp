<?php

namespace App\Http\Controllers;

use App\Models\PalabrasClave;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PalabrasClaveRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PalabrasClaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $palabrasClaves = PalabrasClave::paginate();

        return view('palabras-clave.index', compact('palabrasClaves'))
            ->with('i', ($request->input('page', 1) - 1) * $palabrasClaves->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $palabrasClave = new PalabrasClave();

        return view('palabras-clave.create', compact('palabrasClave'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PalabrasClaveRequest $request): RedirectResponse
    {
        PalabrasClave::create($request->validated());

        return Redirect::route('palabras-claves.index')
            ->with('success', 'PalabrasClave created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $palabrasClave = PalabrasClave::find($id);

        return view('palabras-clave.show', compact('palabrasClave'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $palabrasClave = PalabrasClave::find($id);

        return view('palabras-clave.edit', compact('palabrasClave'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PalabrasClaveRequest $request, PalabrasClave $palabrasClave): RedirectResponse
    {
        $palabrasClave->update($request->validated());

        return Redirect::route('palabras-claves.index')
            ->with('success', 'PalabrasClave updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        PalabrasClave::find($id)->delete();

        return Redirect::route('palabras-claves.index')
            ->with('success', 'PalabrasClave deleted successfully');
    }
}
