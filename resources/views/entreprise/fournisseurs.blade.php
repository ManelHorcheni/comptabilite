<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="{{ asset('css/entreprise.css') }}" rel="stylesheet">
    <title>Comptabilite</title>
</head>

<body class="g-sidenav-show bg-gray-200">
    @include('layouts.sidebarentreprise')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbar">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="navbarText font-weight-bolder mb-0">Dashboard / Liste des fournisseurs</h6>
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
                                                <img src="{{ asset('usermanage.png') }}" alt="Your Image" id="imageCardTop" class="img-fluid me-2">
                                                Table de tous les fournisseurs
                                            </h6>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if(count($fournisseurs) > 0)
                            <div class="card-body px-0 pb-2">
                                <div class="table-wrapper table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead class="tableHeader">
                                            <tr>
                                                <th class="text-uppercase text-xxs font-weight-bolder">Full name</th>
                                                <th class="text-center text-uppercase text-xxs font-weight-bolder ps-2">Spécialité</th>
                                                <th class="text-center text-uppercase text-xxs font-weight-bolder ps-2">Phone</th>
                                                <th class="text-center text-uppercase text-xxs font-weight-bolder ps-2">Adresse</th>
                                                <th> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($fournisseurs as $fournisseur)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('images/' . $fournisseur->img) }}" class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="tableText mb-0 text-sm">{{ $fournisseur->name }}</h6>
                                                
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="tableText align-middle text-center font-weight-bolder text-sm">
                                                        {{ $fournisseur->specialite }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="tableText align-middle text-center font-weight-bolder text-sm">
                                                        {{ $fournisseur->phone }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <p class="tableText align-middle text-center font-weight-bolder text-sm">
                                                        {{ $fournisseur->adresse }}
                                                    </p>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#commanderModal{{ $fournisseur->id }}" data-fournisseur-id="{{ $fournisseur->id }}" data-toggle="tooltip" data-original-title="commander">
                                                        Commander
                                                    </button>
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                                    <!-- Commander Modal -->
                                    <div class="modal fade" id="commanderModal{{ $fournisseur->id }}" tabindex="-1" aria-labelledby="commanderModalLabel{{ $fournisseur->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="commanderModalLabel{{ $fournisseur->id }}">Commander</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <form action="{{ route('commandes.store') }}" method="POST">
                                                        @csrf
                                                        <input type="hidden" id="fournisseur_id" name="fournisseur_id" value="{{ $fournisseur->id }}">
                                                        <div class="mb-3">
                                                            <label for="designation" class="form-label">Désignation</label>
                                                            <input type="text" class="form-control" id="designation" name="designation" required>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="description" class="form-label">Description</label>
                                                            <textarea class="form-control" id="description" name="description"></textarea>
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="quantite" class="form-label">Quantité</label>
                                                            <input type="number" class="form-control" id="quantite" name="quantite" required min="1">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="delai_de_livraison" class="form-label">Délai de livraison</label>
                                                            <input type="date" class="form-control" id="delai_de_livraison" name="delai_de_livraison">
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Envoyer la commande</button>
                                                    </form>
                                                    

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Fin Commander Modal -->
                                </div>
                            </div>
                            @else
                            <p class="p-3">No fournisseurs found.</p>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    </main>




    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var modals = document.querySelectorAll('.modal');
            modals.forEach(function (modal) {
                modal.addEventListener('show.bs.modal', function (event) {
                    var button = event.relatedTarget; // Le bouton qui a ouvert la modal
                    var fournisseurId = button.getAttribute('data-fournisseur-id'); // L'ID du fournisseur
    
                    var inputFournisseurId = modal.querySelector('#fournisseur_id');
                    inputFournisseurId.value = fournisseurId; // Met à jour le champ caché avec l'ID du fournisseur
                });
            });
        });
    </script>
    
</body>

</html>
