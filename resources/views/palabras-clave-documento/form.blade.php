<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="documento" class="form-label">{{ __('Documento') }}</label>
            @if ($documentos->isEmpty())
                <select name="documento_id" class="form-control @error('documento') is-invalid @enderror" id="documento" disabled>
                    <option value="">Aún no hay documentos registrados</option>
                </select>
            @else
                <select name="documento_id" class="form-control @error('documento') is-invalid @enderror" id="documento">
                    <option value="">Selecciona un Documento para asignar palabras clave</option>
                    @foreach ($documentos as $documento)
                        <option value="{{ $documento->id }}" {{ old('documento','') == $documento->id ? 'selected' : '' }}>
                            {{ $documento->titulo }}
                        </option>
                    @endforeach
                </select>    
            @endif
            {!! $errors->first('documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="palabra_clave" class="form-label">{{ __('Palabras Clave') }}</label>
            @if ($palabrasClave->isEmpty())
                <select name="palabra_clave_id" class="form-control @error('palabra_clave') is-invalid @enderror" id="palabra_clave" disabled>
                    <option value="">Aún no hay palabras clave registradas</option>
                </select>                
            @else
                <select name="palabra_clave_id" class="form-control @error('palabra_clave') is-invalid @enderror" id="palabra_clave" multiple="multiple">
                    <optgroup label="Selecciona una o más palabras clave">
                    @foreach ($palabrasClave as $palabraClave)
                        <option value="{{ $palabraClave->id }}" {{ old('palabra_clave', '') == $palabraClave->id ? 'selected' : '' }}>
                            {{ $palabraClave->palabra }}
                        </option>
                    @endforeach
                    </optgroup>
                </select> 
            @endif
            {!! $errors->first('palabra_clave_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>

@section('js')
    <script>
        $('#documento').select2();
        $('#palabra_clave').select2();
    </script>
@endsection