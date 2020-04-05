<form class="needs-validation px-2 pb-2" action="{{route('pages.stock.create')}}" method="post" enctype="multipart/form-data" novalidate>
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
                <input type="number" class="form-control col-md-10" id="validationCustom02" placeholder="Stock" name="quantity" required>
                <select class="custom-select" id="inlineFormCustomSelectPref" name="quantity_type">
                    <option selected>Unité</option>
                    @if ($quantityType != null)
                    @foreach ($quantityType as $item)
                      <option value="{{$item->quantity_type}}" selected>{{$item->quantity_type}}</option>
                    @endforeach
                    <option value="" selected>Qté</option>
                    <option value="cm" selected>Cm</option>
                    @endif
                    
                </select>
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
        <div class="form-row">
          <div class="col-md-12 mb-12">
            @if (!empty($stocks)) 
              <select class="custom-select col-md-12 select-type" name="type" id="">
                    <option value="">Type</option>
                    @foreach ($stocks as $item)
                      {{-- <option value="{{$item[0]->type}}">{{$item[0]->type}}</option> --}}
                      <option value="{{$item[0]->type}}">{{$item[0]->type}}</option>
                    @endforeach    
                    <option value="other">Autre</option>
              </select>     
            @endif          
            <input class="form-control input-type d-none" type="text" name="newType" placeholder="Nouveau type">
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