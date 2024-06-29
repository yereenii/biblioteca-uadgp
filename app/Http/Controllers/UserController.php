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
use Spatie\Permission\Models\Role;

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
        // Valida que el correo sea único
        $request->validated();
        // Valida que la matricula sea única
        $alumnoCont = new AlumnoController;
        if ($alumnoCont->matriculaExist($request->matricula)) {
            return redirect()->back()->withInput()->withErrors(['matricula' => 'La matrícula ya está en uso.']);
        }
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
            $alumnoCont->add($datosAlumno);
            $newUser->assignRole('Alumno'); // se asigna rol

        }elseif ($tipoUsuario == 1) { // docente
            $docenteCont = new DocenteController;
            // Iteramos las masterias impatidas
            foreach ($request->materias_impartidas as $materia_impartida_id) {
                $docenteCont->add(
                    [
                        'usuario_id' => $newUser->id,
                        'materia_impartida_id' => $materia_impartida_id,
                    ]
                );
            }
            $newUser->assignRole('Docente'); // se asigna rol
            
        }elseif ($tipoUsuario == 2) { // investigador
            $datosInvestigador = [
                'usuario_id' => $newUser->id,
                'procedencia' => $request->procedencia,
            ];
            $investigadorCont = new InvestigadoreController;
            $investigadorCont->add($datosInvestigador);
            $newUser->assignRole('Investigador'); // se asigna rol

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
        $nivelesAcademicos = DB::table('niveles_academicos')->pluck('descripcion', 'id');
        $materias = DB::table('materias')->pluck('descripcion', 'id');
        // falta abrir cada caso
        $datosDeTipoDeUsuario = [];
        $rolDeUsuario = '';
        if ($user->hasRole('Alumno')) {
            $alumno = new AlumnoController;
            $datosDeTipoDeUsuario = $alumno->findByUsuarioId($user->id);
            $rolDeUsuario = 'alumno';

        }else if ($user->hasRole('Docente')) {
            $docente = new DocenteController;
            $datosDeTipoDeUsuario = $docente->findByUsuarioId($user->id);
            $rolDeUsuario = 'docente';
            
        }else if($user->hasRole('Investigador')){
            $investigador = new InvestigadoreController;
            $datosDeTipoDeUsuario = $investigador->findByUsuarioId($user->id);
            $rolDeUsuario = 'investigador';

        }



        return view('user.edit', compact('user','nivelesAcademicos','materias','datosDeTipoDeUsuario','rolDeUsuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user): RedirectResponse
    {
        // Actualizamos datos del usuario menos inputs de otros roles
        $user->update($request->except(['matricula','semestre','nivel_academico_id','materia_impartida_id','procedencia']));
        
        // actualizamos los datos del rol requerido
        $tipoUsuario = $request->tipo_usuario;
        if ($tipoUsuario == 0) { // alumno
            $datosAlumno = [
                'matricula' => $request->matricula,
                'semestre' => $request->semestre,
                'nivel_academico_id' => $request->nivel_academico_id,
            ];
            $alumnoCont = new AlumnoController;
            $alumnoCont->updateByUserId($user->id, $datosAlumno);

        }elseif ($tipoUsuario == 1) { // docente
            $datosDocente = [
                'materia_impartida_id' => $request->materia_impartida_id,
            ];
            $docenteCont = new DocenteController;
            $docenteCont->updateByUserId($user->id, $datosDocente);
            
        }elseif ($tipoUsuario == 2) { // investigador
            $datosInvestigador = [
                'procedencia' => $request->procedencia,
            ];
            $investigadorCont = new InvestigadoreController;
            $investigadorCont->updateByUserId($user->id, $datosInvestigador);

        }
        

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
