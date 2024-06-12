<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $users = User::paginate();

        return view('user.index', compact('users'))
            ->with('i', ($request->input('page', 1) - 1) * $users->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = new User();
        $nivelesAcademicos = DB::table('niveles_academicos')->pluck('descripcion', 'id');
        $materias = DB::table('materias')->pluck('descripcion', 'id');

        return view('user.create', compact('user','nivelesAcademicos','materias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request): RedirectResponse
    {
        $request->validated();
        // validar contraseña
        $datos = [
            'name' => $request->name,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'email' =>$request->email,
            'password' =>bcrypt($request->password),
        ];
        // Crear registro
        $newUser = User::create($datos);

        // Guardar datos en la tablas correspondientes
        // Asociar rol
        $tipoUsuario = $request->tipo_usuario;
        if ($tipoUsuario == 0) { // alumno
            $datosAlumno = [
                'usuario_id' => $newUser->id,
                'matricula' => $request->matricula,
                'semestre' => $request->semestre,
                'nivel_academico_id' => $request->nivel_academico_id,
            ];
            $alumnoCont = new AlumnoController;
            $alumnoCont->add($datosAlumno);
            
        }elseif ($tipoUsuario == 1) { // docente
            $datosDocente = [
                'usuario_id' => $newUser->id,
                'materia_impartida_id' => $request->materia_impartida_id,
            ];
            $docenteCont = new DocenteController;
            $docenteCont->add($datosDocente);
            
        }elseif ($tipoUsuario == 2) { // investigador
            $datosInvestigador = [
                'usuario_id' => $newUser->id,
                'procedencia' => $request->procedencia,
            ];
            $investigadorCont = new InvestigadoreController;
            $investigadorCont->add($datosInvestigador);
        }
        

        return Redirect::route('users.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $user = User::find($id);

        return view('user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $user = User::find($id);

        return view('user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user): RedirectResponse
    {
        $user->update($request->validated());

        return Redirect::route('users.index')
            ->with('success', 'User updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();

        return Redirect::route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
