<div>
    <div class="form-group mt-3">
        <div class="input-group flex-nowrap"> 
            <div class="input-group-text"> 
                <span class="icon-container" id="addon-wrapping">
                    <i class="fa-solid fa-user"></i>
                </span>
            </div>
            <input wire:model.lazy="nombre" name="nombre" type="text" class="form-control @error('nombre') is-invalid @elseif(strlen($nombre) > 0) is-valid @enderror" value="{{ old('nombre') }}"
            placeholder="Nombre" required>
        </div>
        @error('nombre')
            <div id="nombre" class="text-danger bold"> 
                {{ $message }} 
            </div>
        @enderror
    </div> 
    <div class="form-group mt-3">
        <div class="input-group flex-nowrap">
            <div class="input-group-text"> 
                <span class="icon-container" id="addon-wrapping">
                    <i class="fa-solid fa-envelope"></i>
                </span>
            </div>
            <input wire:model.lazy="correo" name="correo" type="text" class="form-control 
            @error('correo') is-invalid @elseif(strlen($correo) > 0) is-valid @enderror" value="{{ old('correo') }}"
            placeholder="Correo" required>
        </div>
        @error('correo')
            <div id="correo" class="text-danger bold"> 
                {{ $message }}
            </div>
        @enderror
    </div> 
    <div class="form-group mt-3">
        <div class="input-group flex-nowrap">
            <div class="input-group-text"> 
                <span class="icon-container" id="addon-wrapping">
                    <i class="fa-solid fa-phone fa-rotate-180"></i>
                </span>
            </div>
            <input wire:model.lazy="telefono" name="telefono" type="text" class="form-control 
            @error('telefono') is-invalid @elseif(strlen($telefono) > 0) is-valid @enderror" value="{{ old('telefono') }}"
            placeholder="Tel&eacute;fono" required>
        </div>
        @error('telefono')
            <div id="telefono" class="text-danger bold"> 
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-group mt-3">
        <label class="form-check-label ms-2 text-white" for="flexCheckDefault">
            Adjuntar foto
        </label>
        <div class="input-group flex-nowrap">
            <div class="input-group-text"> 
                <span class="icon-container" id="addon-wrapping">
                    <i class="fa-solid fa-camera"></i>
                </span>
            </div>
            <input wire:model.lazy="foto" name="foto" type="file" class="form-control 
            @error('foto') is-invalid @elseif(strlen($foto) > 0) is-valid @enderror" value="{{ old('foto') }}"
            placeholder="Toma tu foto" accept="image/png, image/jpeg" required>
        </div>
        @error('foto')
            <div id="foto" class="text-danger bold"> 
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="form-check mt-3 text-white">
        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required> 
        <label class="form-check-label ms-2" for="flexCheckDefault">
            He le&iacute;do y acepto los t&eacute;rminos y condiciones.
        </label>
    </div>
</div>
