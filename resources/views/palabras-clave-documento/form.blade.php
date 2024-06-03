<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="documento_id" class="form-label">{{ __('Documento Id') }}</label>
            <input type="text" name="documento_id" class="form-control @error('documento_id') is-invalid @enderror" value="{{ old('documento_id', $palabrasClaveDocumento?->documento_id) }}" id="documento_id" placeholder="Documento Id">
            {!! $errors->first('documento_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>
        <div class="form-group mb-2 mb20">
            <label for="palabra_clave_id" class="form-label">{{ __('Palabra Clave Id') }}</label>
            <input type="text" name="palabra_clave_id" class="form-control @error('palabra_clave_id') is-invalid @enderror" value="{{ old('palabra_clave_id', $palabrasClaveDocumento?->palabra_clave_id) }}" id="palabra_clave_id" placeholder="Palabra Clave Id">
            {!! $errors->first('palabra_clave_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>