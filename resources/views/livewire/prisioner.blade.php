<div>

    <div class="d-flex mb-3">

        <div class="me-3">
          <b>Internos</b>
        </div>

        <div>
          <button type="button" wire:click="increment" class="btn btn-sm btn-secondary ms-2"> + Adicionar Linha </button> 
        </div>

    </div>

    <div class="card">

        <div class="card-header">

            @for ($i=0;$i<=$count;$i++)

            <div class="row mb-3 mt-2">

                <label class="col-sm-2 col-form-label">Nome</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" name="prisioner[]" value="{{ old('prisioner') }}">
                    @error('prisioner')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <label class="col-sm-1 col-form-label">Identidade</label>
                <div class="col-sm-2">
                    <input type="text" class="form-control" name="identity[]" value="{{ old('identity') }}">
                    @error('identity')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-sm-2">
                    <button type="button" wire:click="decrement" class="btn btn-sm btn-secondary ms-2 mt-1"> - Remover Linha </button>
                </div>

            </div>

            @endfor

        </div>

    </div>

</div>

