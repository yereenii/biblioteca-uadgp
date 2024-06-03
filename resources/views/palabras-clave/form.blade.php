<div class="row padding-1 p-1">
    <div class="col-md-12">
        
        <div class="form-group mb-2 mb20">
            <label for="palabra" class="form-label">{{ __('Palabra') }}</label>
            <input type="text" name="palabra" class="form-control @error('palabra') is-invalid @enderror" value="{{ old('palabra', $palabrasClave?->palabra) }}" id="palabra" placeholder="Palabra">
            {!! $errors->first('palabra', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>
    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>