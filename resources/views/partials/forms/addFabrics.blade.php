<form class="needs-validation px-2 pb-2" action="{{route('pages.fabric.create')}}" method="post"  enctype="multipart/form-data" novalidate>
    @csrf

        <div class="form-row">
          <div class="col-md-12 mb-12">
            <input type="text" class="form-control"  placeholder="Nom" name="name" value="{{old('name')}}"  required>
            @if ($errors->has('name'))
              <p>{{$errors->first('name')}}</p>
            @endif
          </div>
        </div>

        <div class="form-row">
          <div class="col-md-12 mb-12 d-flex flex-row">
                <input type="number" class="form-control col-md-12"  placeholder="Stock" name="quantity" value="{{old('quantity')}}"  required>
                @if ($errors->has('quantity'))
                  <p>{{$errors->first('quantity')}}</p>
                @endif
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-12 mb-12">
            <input type="number" class="form-control"  placeholder="Prix d'achat" name="price" value="{{old('price')}}"  required>
            @if ($errors->has('price'))
              <p>{{$errors->first('price')}}</p>
            @endif
          </div>
        </div>
       
        <div class="form-group">
            <label for="exampleFormControlFile1">Photo du tissus</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
            @if ($errors->has('image'))
              <p>{{$errors->first('image')}}</p>
          @endif
        </div>
        {{-- <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              Confirmer l'exactitude des informations
            </label>
            <div class="invalid-feedback">
              Vous devez confirmer l'exactitude des informations
            </div>
          </div>
        </div> --}}
        
        <button class="btn-pink  mx-auto" style="width:100%" type="submit">Ajouter materiel</button>
      </form>