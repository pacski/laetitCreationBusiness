<form class="needs-validation px-2 pb-2" action="{{route('pages.fabric.create')}}" method="post" enctype="multipart/form-data" novalidate>
    @csrf

        <div class="form-row">
          <div class="col-md-12 mb-12">
            <input type="text" class="form-control" id="validationCustom01" placeholder="Nom" name="name" required>
            <div class="valid-feedback">
              Valide !
            </div>
            <div class="invalid-feedback">
              Valeur manquante !
            </div>
            @if ($errors->has('name'))
            <p>{{$errors->first('name')}}</p>
            @endif
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-12 mb-12 d-flex flex-row">
                <input type="number" class="form-control col-md-12" id="validationCustom02" placeholder="Stock" name="quantity" required>
          </div>
        </div>
        <div class="form-row">
          <div class="col-md-12 mb-12">
            <input type="number" class="form-control" id="validationCustom02" placeholder="Prix d'achat" name="price" required>
            <div class="valid-feedback">
              Valide !
            </div>
            <div class="invalid-feedback">
              Valeur manquante !
            </div>
          </div>
        </div>
       
        <div class="form-group">
            <label for="exampleFormControlFile1">Photo du tissus</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
        </div>
        <div class="form-group">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              Confirmer l'exactitude des informations
            </label>
            <div class="invalid-feedback">
              Vous devez confirmer l'exactitude des informations
            </div>
          </div>
        </div>
        
        <button class="btn btn-primary  mx-auto" style="width:100%" type="submit">Ajouter materiel</button>
      </form>

      <script src="assets/js/product/addStock.js"></script>