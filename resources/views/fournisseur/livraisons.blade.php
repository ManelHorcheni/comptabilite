<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <title>Liste des Livraisons</title>
</head>

<body class="g-sidenav-show bg-gray-200">
    @include('layouts.sidebarfournisseur')

        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
            <!-- Navbar -->
            <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbar">
                <div class="container-fluid py-1 px-3">
                    <nav aria-label="breadcrumb">
                        <h6 class="navbarText font-weight-bolder mb-0">Dashboard / Gestion des Livraison</h6>
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

        <div class="container-fluid py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="row align-items-center">
                                    <div class="col-md">
                                        <div class="shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center" id="cardTop">
                                            <h6 class="text-capitalize ps-3" id="titreTop">
                                                <img src="{{ asset('commandes.png') }}" alt="Your Image" id="imageCardTop" class="img-fluid me-2">
                                                Table de tous les livraisons
                                            </h6>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            @if($livraisons->isEmpty())
        <p>Aucune commande reçue pour le moment.</p>
    @else
    <table class="table">
        <thead>
            <tr>
                <th>Nom de l'Entreprise</th>
                <th>Date de Livraison</th>
                <th>Numéro du Commande</th>
                <th>Désignation</th>
                <th>Quantité</th>
                
                <th>Mode de paiement</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($livraisons as $livraison)
            <tr>
                <td>{{ $livraison->commande->entreprise->name }}</td>
                <td>{{ $livraison->commande->delai_de_livraison }}</td>
                <td>{{ $livraison->commande->id }}</td>
                <td>{{ $livraison->commande->designation }}</td>
                <td>{{ $livraison->commande->quantite }}</td>
                
                <td>espèce</td>
                <td>
                    <a href="{{ route('livraison.pdf', $livraison->id) }}">
                        <i class="fa-solid fa-download"></i>
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Modal Livrer -->
{{-- <div class="modal fade" id="livrerModal{{ $commande->id }}" tabindex="-1" aria-labelledby="livrerModalLabel{{ $commande->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="livrerModalLabel{{ $commande->id }}">Livrer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('livraison.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="commande_id" value="{{ $commande->id }}">
                    <input type="hidden" name="entreprise_id" value="{{ $commande->entreprise_id }}">
                    <input type="hidden" name="fournisseur_id" value="{{ Auth::user()->id }}">
                    
                    
                    
                    <button type="submit" class="btn btn-primary">Livrer</button>
                </form>
            </div>
        </div>
    </div>
</div> --}}

    <!-- Fin livrer Modal -->

    @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap JS -->
        <script src="{{ asset('js/core/popper.min.js') }}"></script>
        <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
        <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
        <script src="{{ asset('js/plugins/chartjs.min.js') }}"></script>
        <script src="{{ asset('js/material-dashboard.min.js?v=3.1.0') }}"></script>
    </main>
</body>

</html>