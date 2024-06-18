<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="row col-12">
            <div class="col-6 form-group mb-2 mb20">
                <label for="name" class="form-label">Nombre(s)</label>
                <span style="color:red">*</span>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $user?->name) }}" id="name" placeholder="Nombre(s)" required>
                {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        <div class="row col-12">
            <div class="col-6 form-group mb-2 mb20">
                <label for="apellido_paterno" class="form-label">{{ __('Apellido Paterno') }}</label>
                <span style="color:red">*</span>
                <input type="text" name="apellido_paterno"
                    class="form-control @error('apellido_paterno') is-invalid @enderror"
                    value="{{ old('apellido_paterno', $user?->apellido_paterno) }}" id="apellido_paterno"
                    placeholder="Apellido Paterno" required>
                {!! $errors->first(
                    'apellido_paterno',
                    '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                ) !!}
            </div>
            <div class="col-6 form-group mb-2 mb20">
                <label for="apellido_materno" class="form-label">{{ __('Apellido Materno') }}</label>
                <input type="text" name="apellido_materno"
                    class="form-control @error('apellido_materno') is-invalid @enderror"
                    value="{{ old('apellido_materno', $user?->apellido_materno) }}" id="apellido_materno"
                    placeholder="Apellido Materno">
                {!! $errors->first(
                    'apellido_materno',
                    '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>',
                ) !!}
            </div>
        </div>
        <div class="row col-12">
            <div class="col-6 form-group mb- 2 mb20">
                <label for="email" class="form-label">Correo Electrónico</label>
                <span style="color:red">*</span>
                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $user?->email) }}" id="email" placeholder="Correo Electrónico" required>
                {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="col-6 form-group">
                <label for="password" class="form-label">Contraseña</label>
                <span style="color:red">*</span>
                <input type="text" name="password" class="form-control" style="-webkit-text-security: disc; text-security: disc;" placeholder="Ingrese su contraseña" required>
                {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        {{-- Select con con tipo de usuario (alumnos, docentes e investigadores) --}}
        <div class="row col-12">
            <div class="col-6 form-group mb-2 mb20">
                <label for="tipo_usuario" class="form-label">Tipo de Usuario</label>
                <span style="color:red">*</span>
                <select name="tipo_usuario" id="tipo_usuario" onchange="cambioTipoDeUsuario();" class="form-control" required>
                    <option value="">Selecciona Opción</option>
                    <option value="0">Alumno</option>
                    <option value="1">Docente</option>
                    <option value="2">Investigador</option>
                </select>
                {!! $errors->first('tipo_usuario', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        <br>
        <div class="row col-12">
            {{-- Formulario de Alumnos --}}
            <div class="card col-12" id="formulario_de_alumnos" style="display: none">
                <div class="card-header" style="font-size: 1.6rem;">
                    Alumno
                </div>
                <div class="card-body">
                    <div class="row col-12">
                        <div class="col-6 form-group mb-2 mb20">
                            <label for="matricula" class="form-label">{{ __('Matricula') }}</label>
                            <span style="color:red">*</span>
                            <input type="text" name="matricula" class="form-control @error('matricula') is-invalid @enderror"
                                value="" id="matricula" placeholder="Matricula" required>
                            {!! $errors->first('matricula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                    </div>
                    <div class="row col-12">
                        <div class="col-6 form-group mb-2 mb20">
                            <label for="semestre" class="form-label">{{ __('Semestre') }}</label>
                            <span style="color:red">*</span>
                            <input type="number" name="semestre" class="form-control @error('semestre') is-invalid @enderror"
                                value="" id="semestre" min="0" placeholder="Semestre" required>
                            {!! $errors->first('semestre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                        
                        <div class="col-6 form-group mb-2 mb20">
                            <label for="nivel_academico_id" class="form-label">{{ __('Nivel Académico') }}</label>
                            <span style="color:red">*</span>
                            <select name="nivel_academico_id" id="nivel_academico_id" class="form-control" required>
                                <option value="">Selecciona Opción</option>
                                @foreach ($nivelesAcademicos as $key => $item)
                                    <option value="{{ $key }}"> {{ $item }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('nivel_academico_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                    </div>
                </div>
            </div>
            {{-- Formulario de Docentes --}}
            <div class="card col-12" id="formulario_de_docentes" style="display: none">
                <div class="card-header" style="font-size: 1.6rem;">
                    Docente
                </div>
                <div class="card-body">
                    <div class="row col-12">
                        <div class="col-6 form-group mb-2 mb20">
                            <label for="materia_impartida_id" class="form-label">{{ __('Materia Impartida') }}</label>
                            <span style="color:red">*</span>
                            <select name="materia_impartida_id" id="materia_impartida_id" class="form-control" required>
                                <option value="">Selecciona Opción</option>
                                @foreach ($materias as $key => $item)
                                    <option value="{{ $key }}"> {{ $item }}</option>
                                @endforeach
                            </select>
                            {!! $errors->first('materia_impartida_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div> 
                    </div>
                </div>
            </div>
            {{-- Formulario de Investigadores --}}
            <div class="card col-12" id="formulario_de_investigador" style="display: none">
                <div class="card-header" style="font-size: 1.6rem;">
                    Investigador
                </div>
                <div class="card-body">
                    <div class="row col-12">
                        <div class="col-6 form-group mb-2 mb20">
                            <label for="procedencia" class="form-label">{{ __('Procedencia') }}</label>
                            <span style="color:red">*</span>
                            <select name="procedencia" id="procedencia" class="form-control" required>
                                <option value="">Selecciona Opción</option>
                                <option value="0">Interno</option>
                                <option value="1">Externo</option>
                            </select>
                            {!! $errors->first('procedencia', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

@section('js')
    <script>
        var datosDeTipoDeUsuario = {!! json_encode($datosDeTipoDeUsuario ?? '') !!};
        var rolDeUsuario = {!! json_encode($rolDeUsuario ?? '') !!};
    </script>
    <script src="{{ asset('js/user/form.js') }}"></script>
@endsection
