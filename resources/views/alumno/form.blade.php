<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="usuario_id" class="form-label">{{ __('Usuario Id') }}</label>
            <input type="text" name="usuario_id" class="form-control @error('usuario_id') is-invalid @enderror" value="{{ old('usuario_id', $alumno?->usuario_id) }}" id="usuario_id" placeholder="Usuario Id">
            {!! $errors->first('usuario_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="semestre" class="form-label">{{ __('Semestre') }}</label>
            <input type="text" name="semestre" class="form-control @error('semestre') is-invalid @enderror" value="{{ old('semestre', $alumno?->semestre) }}" id="semestre" placeholder="Semestre">
            {!! $errors->first('semestre', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="matricula" class="form-label">{{ __('Matricula') }}</label>
            <input type="text" name="matricula" class="form-control @error('matricula') is-invalid @enderror" value="{{ old('matricula', $alumno?->matricula) }}" id="matricula" placeholder="Matricula">
            {!! $errors->first('matricula', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="nivel_academico_id" class="form-label">{{ __('Nivel Academico Id') }}</label>
            <input type="text" name="nivel_academico_id" class="form-control @error('nivel_academico_id') is-invalid @enderror" value="{{ old('nivel_academico_id', $alumno?->nivel_academico_id) }}" id="nivel_academico_id" placeholder="Nivel Academico Id">
            {!! $errors->first('nivel_academico_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>