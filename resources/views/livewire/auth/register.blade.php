<div>
    <div class="form-group"> 
        <input wire:model.lazy="nombre" name="nombre" type="text" class="form-control 
        @error('nombre') is-invalid @elseif(strlen($nombre) > 0) is-valid @enderror" value="{{ old('nombre') }}"
        placeholder="Nombre" required>
        @error('nombre')
            <div id="nombre" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div> 
    <div class="form-group">
        <input wire:model.lazy="correo" name="correo" type="text" class="form-control 
        @error('correo') is-invalid @elseif(strlen($correo) > 0) is-valid @enderror" value="{{ old('correo') }}"
        placeholder="Correo" required>
        @error('correo')
            <div id="correo" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div> 
    <div class="form-group">
        <input wire:model.lazy="telefono" name="telefono" type="text" class="form-control 
        @error('telefono') is-invalid @elseif(strlen($telefono) > 0) is-valid @enderror" value="{{ old('telefono') }}"
        placeholder="Tel&eacute;fono" required>
        @error('telefono')
            <div id="telefono" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group"> 
        <input wire:model.lazy="foto" name="foto" type="file" class="form-control 
        @error('foto') is-invalid @elseif(strlen($foto) > 0) is-valid @enderror" value="{{ old('foto') }}"
        placeholder="Toma tu foto" accept="image/png, image/jpeg" required>
        @error('foto')
            <div id="foto" class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
        <label class="form-check-label" for="flexCheckDefault">
            He le&iacute;do y acepto los t&eacute;rminos y condiciones y la pol&iacute;tica de tratamiento de datos.
        </label>
    </div>
</div>
