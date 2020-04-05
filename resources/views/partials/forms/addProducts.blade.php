{{-- <form class="needs-validation px-2 pb-2" action="{{Route('pages.home.product.create')}}" method="post" enctype="multipart/form-data" novalidate > --}}
<form class="needs-validation px-2 pb-2" action="{{Route('pages.product.create')}}" method="post" enctype="multipart/form-data" novalidate >
    @csrf

        <div class="form-row d-flex justify-content-center">
          <div class="col-md-6 mb-6">
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
        <div class="form-row d-flex justify-content-center">
          <div class="col-md-6 mb-6 ">
              <div class="input-group-prepend">
              </div>
              <input type="number" class="form-control" id="validationCustomUsername" placeholder="Coût (Cm)" aria-describedby="inputGroupPrepend" name="cost" required>
              <div class="valid-feedback">
                Valide !
              </div>
              <div class="invalid-feedback">
                Valeur manquante !
              </div>
          </div>
        </div>
        <div class="form-row d-flex justify-content-center">
          <div class="col-md-6 mb-6 ">
            <input type="number" class="form-control" id="validationCustom03" placeholder="Prix" name="price" required>
            <div class="valid-feedback">
              Valide !
            </div>
            <div class="invalid-feedback">
              Valeur manquante !
            </div>
          </div>
        </div>
        <div class="form-row d-flex justify-content-center">
          <div class="col-md-6 mb-6 ">
            <input type="number" class="form-control" id="validationCustom04" placeholder="Temps de production (Min)" name="productionTime" required>
            <div class="valid-feedback">
              Valide !
            </div>
            <div class="invalid-feedback">
              Valeur manquante !
            </div>
          </div>
        </div>
        <br>
        <div class="form-group d-flex justify-content-center">
          <div class="d-flex justify-content-center">
              <label for="exampleFormControlFile1">Photo du produit</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image">
          </div>
        </div>
        <div class="form-group d-flex justify-content-center">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
            <label class="form-check-label" for="invalidCheck">
              Confirmer la validité des informations
            </label>
            <div class="invalid-feedback">
              Vous devez d'abord Confirmer
            </div>
          </div>
        </div>

        <div class="form-row d-flex justify-content-center materiel-bloc-1" id="materiel1">
          <div class="form-group col-md-3">
              <select  class="custom-select materiel-input-1" name="materiel_1" >
                  <option value="" selected>Materiel 1</option>
                  @foreach ($stocksTest as $item)
                    <option value="">-----{{$item[0]->type}}-----</option>
                    @foreach ($item as $test)
                      <option value="{{$test->id}}">{{$test->name}}</option>
                    @endforeach
                  @endforeach
              </select>            
              <div class="invalid-feedback">
              Please provide a valid price
              </div>
            </div>
            <div class="form-group col-md-3">
                <select class="custom-select" name="quantity_1" >
                    <option value="" selected>Quantité</option>
                    @for ($i = 1; $i < 99; $i++)
                      <option  value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>             
                <div class="invalid-feedback">
                Please provide a valid time.
              </div>
            </div>
        </div>

      @for ($i = 2; $i < 10; $i++)
      <div class="form-row d-flex- d-none justify-content-center materiel-bloc-{{$i}}">
        <div class="form-group col-md-3">
        <select class="form-control materiel-input-{{$i}}" id="exampleFormControlSelect1" name="materiel_{{$i}}" >
            <option value="materiel-none-{{$i}}" selected>Materiel {{$i}}</option>
            @foreach ($stocksTest as $item)
              <option value="">-----{{$item[0]->type}}-----</option>
              @foreach ($item as $test)
                <option value="{{$test->id}}">{{$test->name}}</option>
              @endforeach
            @endforeach
          </select>
        </div>
        <div class="form-group col-md-3">
        <select class="form-control" id="exampleFormControlSelect1" name="quantity_{{$i}}">
              <option value="" selected>Quantité</option>
            @for ($j = 1; $j < 100; $j++)
              <option value="{{$j}}" >{{$j}}</option>
            @endfor
          </select>
        </div>
      </div>
      @endfor
      
        <div class=" d-flex justify-content-center">
          <button class="btn btn-primary  col-md-6 mb-6" type="submit">Ajouter Produit</button>
        </div>
      </form>
      <script src="/assets/js/product/addProduct.js"></script>