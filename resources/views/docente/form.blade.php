<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="usuario_id" class="form-label">{{ __('Usuario Id') }}</label>
            <input type="text" name="usuario_id" class="form-control @error('usuario_id') is-invalid @enderror" value="{{ old('usuario_id', $docente?->usuario_id) }}" id="usuario_id" placeholder="Usuario Id">
            {!! $errors->first('usuario_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="materia_impartida_id" class="form-label">{{ __('Materia Impartida Id') }}</label>
            <input type="text" name="materia_impartida_id" class="form-control @error('materia_impartida_id') is-invalid @enderror" value="{{ old('materia_impartida_id', $docente?->materia_impartida_id) }}" id="materia_impartida_id" placeholder="Materia Impartida Id">
            {!! $errors->first('materia_impartida_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>