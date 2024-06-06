<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class PaginaPrincipalController extends Controller
{
    public function index(): View
    {
        $variable = 'Hello world!';
        return view('paginaPrincipal.index', compact('variable'));
    }
}
