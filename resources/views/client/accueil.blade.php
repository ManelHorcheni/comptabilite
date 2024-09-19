<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boutique</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Styles -->
    <link href="{{ asset('css/client.css') }}" rel="stylesheet">

</head>
<body>

    <!-- Navbar -->
    
    @include('layouts.navbarclient')

    <!-- Carousel -->

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        
        <div class="carousel-indicators">
            
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            
          <div class="carousel-item active">
        
            <img src="{{ asset('craousel4.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Bienvenue chez La Boutique</h5>
              <p>Découvrez nos produits exclusifs au meilleur prix</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('craousel5.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Bienvenue chez La Boutique</h5>
              <p>Découvrez nos produits exclusifs au meilleur prix</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="{{ asset('craousel2.jpg') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
              <h5>Bienvenue chez La Boutique</h5>
              <p>Découvrez nos produits exclusifs au meilleur prix</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

    <!-- Features Section Start -->
<div class="container-fluid features py-5">
    <div class="container py-5">
        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="features-item text-center rounded shadow-sm p-4 bg-white">
                    <div class="features-icon d-flex justify-content-center align-items-center mb-4 mx-auto bg-secondary text-white rounded-circle">
                        <i class="fa-solid fa-truck"></i>
                    </div>
                    <div class="features-content">
                        <h5 class="fw-bold">Livraison Rapide en 24H-48H</h5>
                        <p class="mb-0 text-muted">A DOMICILE SUR TOUTE LA TUNISIE</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="features-item text-center rounded shadow-sm p-4 bg-white">
                    <div class="features-icon d-flex justify-content-center align-items-center mb-4 mx-auto bg-secondary text-white rounded-circle">
                        <i class="fa-solid fa-arrow-right-arrow-left"></i>
                    </div>
                    <div class="features-content">
                        <h5 class="fw-bold">Retour et Echange</h5>
                        <p class="mb-0 text-muted">Sous 14 jours</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="features-item text-center rounded shadow-sm p-4 bg-white">
                    <div class="features-icon d-flex justify-content-center align-items-center mb-4 mx-auto bg-secondary text-white rounded-circle">
                        <i class="fa-solid fa-clipboard-check"></i>
                    </div>
                    <div class="features-content">
                        <h5 class="fw-bold">100% Produits Authentiques</h5>
                        <p class="mb-0 text-muted">100% Produits Authentiques</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="features-item text-center rounded shadow-sm p-4 bg-white">
                    <div class="features-icon d-flex justify-content-center align-items-center mb-4 mx-auto bg-secondary text-white rounded-circle">
                        <i class="fa-solid fa-money-check-dollar"></i>
                    </div>
                    <div class="features-content">
                        <h5 class="fw-bold">Payement à la Livraison</h5>
                        <p class="mb-0 text-muted">Payement à la Livraison</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Features Section End -->

<!-- Recherche Section End -->
<form method="GET" action="{{ route('accueil') }}" class="d-flex search-bar mt-4 mb-4">
    <input class="form-control me-2 search-input" id="name" name="name" type="search" placeholder="Rechercher" aria-label="Rechercher">
    <button class="btn btn-primary search-btn" type="submit"><i class="fas fa-search"></i></button>
</form> 
<!-- Recherche Section End -->

<br>

    <!-- Main Container -->
    <div class="container mt-4">
        <div class="row">
            <!-- Sidebar Filters -->
            <div class="col-lg-3">
                <h4>Filtres</h4>
                <form method="GET" action="{{ route('accueil') }}" id="filters">
                    <div class="form-group mb-3">
                        <label for="categorie">Catégorie</label>
                        <select class="form-control" id="categorie">
                            <option>Électronique</option>
                            <option>Vêtements</option>
                            <option>Maison</option>
                            <option>Jouets</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary w-100">Appliquer</button>
                </form>
            </div>

            <!-- Products List -->
            <div id="produits" class="col-lg-9">
                <div class="row">
                    <!-- Product Item -->
                    @if(count($produits) > 0) 
                    @foreach($produits as $produit)
                    <div class="col-md-4 mb-4">

                        <div class="card">
                            <img src="{{ asset('images/' . $produit->img) }}" class="card-img-top" alt="{{ $produit->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $produit->name }}</h5>
                                <p class="card-text">{{ $produit->description }}</p>
                                <p class="card-text"><strong>Prix: {{ $produit->prix }} TND</strong></p>
                                <form action="{{ route('cart.add', $produit->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Ajouter au Panier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                        <p class="p-3">No product found.</p>
                    @endif
                    <!-- Add more product items here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    
    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>
