<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="autor" class="form-label">{{ __('Autor') }}</label>
            @if ($autores->isEmpty())
                <select name="autor" class="form-control @error('autor') is-invalid @enderror" id="autor" disabled>
                    <option value="">Aún no hay autores registrados</option>
                </select>
            @else
                <select name="autor" class="form-control @error('autor') is-invalid @enderror" id="autor">
                    <option value="">Selecciona un autor</option>
                    @foreach ($autores as $autor)
                        <option value="{{ $autor->id }}" {{ old('autor', $documento->autor ?? '') == $autor->id ? 'selected' : '' }}>
                            {{ $autor->descripcion }}
                        </option>
                    @endforeach
                </select>
            @endif
            {!! $errors->first('autor', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="titulo" class="form-label">{{ __('Titulo') }}</label>
            <input type="text" name="titulo" class="form-control @error('titulo') is-invalid @enderror" value="{{ old('titulo', $documento?->titulo) }}" id="titulo" placeholder="Titulo">
            {!! $errors->first('titulo', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="editorial" class="form-label">{{ __('Editorial') }}</label>
            <input type="text" name="editorial" class="form-control @error('editorial') is-invalid @enderror" value="{{ old('editorial', $documento?->editorial) }}" id="editorial" placeholder="Editorial">
            {!! $errors->first('editorial', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="descripcion" class="form-label">{{ __('Descripcion') }}</label>
            <input type="text" name="descripcion" class="form-control @error('descripcion') is-invalid @enderror" value="{{ old('descripcion', $documento?->descripcion) }}" id="descripcion" placeholder="Descripcion">
            {!! $errors->first('descripcion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="tipo_documento" class="form-label">{{ __('Tipo de Documento') }}</label>
            <select name="tipo_documento" class="form-control @error('tipo_documento') is-invalid @enderror" id="tipo_documento">
                <option value="">Selecciona un tipo de documento</option>
                @foreach ($tiposDocumentos as $tiposDocumento)
                    <option value="{{ $tiposDocumento->id }}" {{ old('tipo_documento', $documento->tipo_documento ?? '') == $tiposDocumento->id ? 'selected' : '' }}>
                        {{ $tiposDocumento->descripcion }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('tipo_documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="fecha_publicacion" class="form-label">{{ __('Fecha Publicacion') }}</label>
            <input type="text" name="fecha_publicacion" class="form-control @error('fecha_publicacion') is-invalid @enderror" value="{{ old('fecha_publicacion', $documento?->fecha_publicacion) }}" id="fecha_publicacion" placeholder="Fecha Publicacion">
            {!! $errors->first('fecha_publicacion', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="archivo_documento" class="form-label">{{ __('Archivo Documento') }}</label>
            <input type="text" name="archivo_documento" class="form-control @error('archivo_documento') is-invalid @enderror" value="{{ old('archivo_documento', $documento?->archivo_documento) }}" id="archivo_documento" placeholder="Archivo Documento">
            {!! $errors->first('archivo_documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="portada_documento" class="form-label">{{ __('Portada Documento') }}</label>
            <input type="text" name="portada_documento" class="form-control @error('portada_documento') is-invalid @enderror" value="{{ old('portada_documento', $documento?->portada_documento) }}" id="portada_documento" placeholder="Portada Documento">
            {!! $errors->first('portada_documento', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>