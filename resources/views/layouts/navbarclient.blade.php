<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('accueil')}}">
            <img src="{{ asset('logo.png') }}" alt="" style="width: 200px; height: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('accueil')}}">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#produits">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('contact')}}">Contact</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Panier <i class="fas fa-shopping-cart"></i></a>
                </li>
                <li class="nav-item">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <span>
                            <img src="{{ asset('images/' .Auth::user()->img) }}" alt="profile_image" id="navbarImage" style="width: 30px; height: auto;">
                            <span class="navbarText font-weight-bolder mb-0">
                                {{ Auth::user()->name }}</span>
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('client.update', ['id' => auth()->user()->id]) }}">
                            Compte
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>