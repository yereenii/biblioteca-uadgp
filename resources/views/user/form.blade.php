<div class="row padding-1 p-1">
    <div class="col-md-12">
        <div class="row col-12">
            <div class="col-6 form-group mb-2 mb20">
                <label for="name" class="form-label">Nombre(s)</label>
                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $user?->name) }}" id="name" placeholder="Nombre(s)">
                {!! $errors->first('name', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        <div class="row col-12">
            <div class="col-6 form-group mb-2 mb20">
                <label for="apellido_paterno" class="form-label">{{ __('Apellido Paterno') }}</label>
                <input type="text" name="apellido_paterno"
                    class="form-control @error('apellido_paterno') is-invalid @enderror"
                    value="{{ old('apellido_paterno', $user?->apellido_paterno) }}" id="apellido_paterno"
                    placeholder="Apellido Paterno">
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
            <div class="col-6 form-group mb-2 mb20">
                <label for="email" class="form-label">Correo Electrónico</label>
                <input type="text" name="email" class="form-control @error('email') is-invalid @enderror"
                    value="{{ old('email', $user?->email) }}" id="email" placeholder="Correo Electrónico">
                {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
            <div class="col-6 form-group">
                <label for="password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" placeholder="Ingrese su contraseña">
                {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
            </div>
        </div>
        {{-- Select con con tipo de usuario (alumnos, docentes e investigadores) --}}
        <div class="row col-12">
            <div class="col-6 form-group mb-2 mb20">
                <label for="tipo_usuario" class="form-label">Tipo de Usuario</label>
                <select name="tipo_usuario" id="tipo_usuario" class="form-control">
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
            <div class="card col-12" id="formulario_de_alumnos">
                <div class="card-header" style="font-size: 1.6rem;">
                    Alumno
                </div>
                <div class="card-body">
                    <div class="row col-12">
                        <div class="col-6 form-group mb-2 mb20">
                            <label for="semestre" class="form-label">{{ __('Semestre') }}</label>
                            <input type="text" name="semestre" class="form-control @error('semestre') is-invalid @enderror"
                                value="" id="semestre" placeholder="Semestre">
                            {!! $errors->first('semestre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                        <div class="col-6 form-group mb-2 mb20">
                            <label for="matricula" class="form-label">{{ __('Matricula') }}</label>
                            <input type="text" name="matricula" class="form-control @error('matricula') is-invalid @enderror"
                                value="" id="matricula" placeholder="Matricula">
                            {!! $errors->first('matricula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                        <div class=" col-6form-group mb-2 mb20">
                            <label for="nivel_academico_id" class="form-label">{{ __('Nivel Academico Id') }}</label>
                            <input type="text" name="nivel_academico_id" class="form-control @error('nivel_academico_id') is-invalid @enderror" value="{{ old('nivel_academico_id', $alumno?->nivel_academico_id) }}" id="nivel_academico_id" placeholder="Nivel Academico Id">
                            {!! $errors->first('nivel_academico_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
                        </div>
                    </div>
                </div>
            </div>
            {{-- Formulario de Docentes --}}
            <div id="formulario_de_docentes">

            </div>
            {{-- Formulario de Investigadores --}}
            <div id="formulario_de_Investigadores">

            </div>
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

@section('js')
    <script>
        // alert('hey');
    </script>
@endsection
