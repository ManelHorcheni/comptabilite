<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Comptabilite</title>
</head>

<body class="g-sidenav-show bg-gray-200">
    @include('layouts.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbar">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="navbarText font-weight-bolder mb-0">Dashboard / Gestion des Produits</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group input-group-outline">
                        </div>
                    </div>
                    @guest
                    @else
                    <div class="">
                        <nav aria-label="breadcrumb">
                            <div class="container">
                                <div class="collapse navbar-collapse" id="navbar">
                                    <ul class="nav navbar-right">
                                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                                <div class="sidenav-toggler-inner">
                                                    <i class="sidenav-toggler-line"></i>
                                                    <i class="sidenav-toggler-line"></i>
                                                    <i class="sidenav-toggler-line"></i>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                                <span>
                                                    <img src="{{ asset('images/' .Auth::user()->img) }}" alt="profile_image" id="navbarImage">
                                                    <span class="navbarText font-weight-bolder mb-0">
                                                        {{ Auth::user()->name }}</span>
                                                </span>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    </div>
                    @endguest
                </div>
            </div>
        </nav>
        <!-- End Navbar -->

        <!-- Container pour le titre "Tous les produits" et le filtre -->
        <div class="container-fluid py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <!-- Partie du titre "Tous les produits" -->
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center" id="cardTop">
                                    <h6 class="text-capitalize ps-3" id="titreTop">
                                        <img src="{{ asset('produit.png') }}" alt="Your Image" id="imageCardTop" class="img-fluid me-2">
                                        Tous les produits
                                    </h6>
                                    
                                </div>
                            </div>

                            <!-- Partie du filtre -->
                            <div class="row">
                                <div class="col-md-3">
                                    <form method="GET" action="{{ route('produit') }}">
                                        <div class="card h-100 p-3">
                                            <h6 class="mb-3">Filtrer les produits</h6>
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nom</label>
                                                <input type="text" class="form-control" id="name" name="name" placeholder="Nom du produit">
                                            </div>
                                            <div class="mb-3">
                                                <label for="categorie" class="form-label">Catégorie</label>
                                                <input type="text" class="form-control" id="categorie" name="categorie" placeholder="Catégorie du produit">
                                            </div>
                                            <div class="mb-3">
                                                <label for="entreprise" class="form-label">Entreprise</label>
                                                <input type="text" class="form-control" id="entreprise" name="entreprise" placeholder="Nom d'entreprise">
                                            </div>
                                            
                                            <button type="submit" class="btn btn-primary">Filtrer</button>
                                        </div>
                                    </form>
                                </div>
                                <!-- Fin Partie du filtre -->

                                <!-- Partie des produits filtrés -->
                                <div class="col-md-9">
                                    @if(count($produits) > 0) 
                                    <div class="card-body px-0 pb-2">
                                        <div class="row row-cols-1 row-cols-md-3 g-3">
                                            @foreach($produits as $produit) 
                                            <div class="col">
                                                <div class="card h-100" style="max-width: 18rem;">
                                                    <img src="{{ asset('images/' . $produit->img) }}" class="card-img-top" alt="{{ $produit->name }}" style="height: 150px; object-fit: cover;">
                                                    <div class="card-body">
                                                        <h5 class="card-title">{{ $produit->name }}</h5>
                                                        <p class="card-text text-truncate">{{ $produit->description }}</p>
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <span class="text-muted">{{ $produit->prix }} TND</span>
                                                            <span class="badge bg-primary">{{ $produit->categorie }}</span>
                                                        </div>
                                                        <br>
                                                        <div class="d-flex align-items-center">
                                                        <p class="text-muted mb-0 me-3">
                                                        <span>{{ $produit->quantite }}</span> articles restants
                                                        </p>
                                                        <div class="progress flex-grow-1">
                                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                            </div>
                                                            <p class="card-text"><strong>Entreprise :</strong>
                                                                <span class="badge rounded-pill bg-info ">{{ $produit->entreprise->name }}</span>
                                                            </p> <!-- Nom de l'entreprise associée -->
                                                        <hr>
                                                        

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- See Modal -->
                                            

                                            <!-- Delete Modal -->
                                            

                                            <!-- Edit Modal -->
                                           

                                            
                                            
                                                            
                                                        
                                            
                                                            
                                                            


                                            @endforeach
                                        </div>
                                    </div>
                                    @else
                                    <p class="p-3">No product found.</p>
                                    @endif
                                </div>
                            </div> 
                        </div> 
                    </div> 
                </div> 
            </div> 
        </div>
       
    </main>

    <!-- Inclure Bootstrap JS (ajoutez cette partie avant la fin de </body>) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.min.js?v=3.1.0') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
