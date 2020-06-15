<nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="{{Route("pages.home.index")}}">LaetitCréation</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
              <a class="nav-link" href={{Route("pages.home.index")}}>Accueil</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{Route("pages.product.index")}}">Produits</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{Route("pages.stock.index")}}">Stock</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{Route("pages.fabric.index")}}">Tissus</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{Route("pages.command.index")}}">Commandes</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{Route("pages.user.index")}}">Mon compte</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="{{Route("user.logout")}}">Deconnexion</a>
            </li>
            {{-- <li class="nav-item">
            <a class="nav-link" href="{{Route("depenses")}}">Dépenses</a>
            </li> --}}
          </ul>
        </div>
      </nav>