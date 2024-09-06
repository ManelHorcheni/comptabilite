<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="{{ asset('css/fournisseur.css') }}" rel="stylesheet">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <title>Comptabilite</title>
  <!-- Load Google Charts -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
  @include('layouts.sidebarfournisseur')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbar">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="navbarText font-weight-bolder mb-0">Dashboard </h6>
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
                            @guest
                            @else
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
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <span>
                                        <img src="{{ asset('images/' .Auth::user()->img) }}" alt="profile_image" id="navbarImage">
                                        <span class="navbarText font-weight-bolder mb-0">
                                            {{ Auth::user()->name }}</span>
                                    </span>
                                </a>
        
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
        
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
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
    <div class="container-fluid py-4">
        <div class="row">
            <div class="row mb-4">
    
                
    
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header p-3 pt-2 d-flex justify-content-between align-items-center">
                            <div class="icon icon-lg icon-shape text-center border-radius-xl position-relative">
                                <img src="{{ asset('commande.png') }}" alt="Commandes" style="width: 60px;" class="img-fluid">
                            </div>
                            <div class="text-end">
                                <span class="tableText nav-link-text text-black text-lg" style="font-family: serif;">Commande</span>
                                <h4 class="tableText mb-0">{{$commandes}}</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3" style="background-color: #1a5187;">
                            <span class="nav-link-text text-white text-md" style="font-family: serif;"><span class="text-white font-weight-bolder">Tous les </span>Commandes</span>
                        </div>
                    </div>
                </div>
    
                <div class="col-xl-6 col-md-6 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="card-header p-3 pt-2 d-flex justify-content-between align-items-center">
                            <div class="icon icon-lg icon-shape text-center border-radius-xl position-relative">
                                <img src="{{ asset('vente.png') }}" alt="Ventes" style="width: 60px;" class="img-fluid">
                            </div>
                            <div class="text-end">
                                <span class="tableText nav-link-text text-black text-lg" style="font-family: serif;">Vente</span>
                                <h4 class="tableText mb-0">{{$factures}}</h4>
                            </div>
                        </div>
                        <hr class="dark horizontal my-0">
                        <div class="card-footer p-3" style="background-color: #1a5187;">
                            <span class="nav-link-text text-white text-md" style="font-family: serif;"><span class="text-white font-weight-bolder">Tous les </span>Ventes</span>
                        </div>
                    </div>
                </div>
    
            </div>
        </div>
    </div>
    


        <div class="row mt-4">
          <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
              <div class="card z-index-0 " >                
                <div class="card-body" >

                </div>
              </div>
            </div>
          </div>
                    </div>
        </div>


                
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.min.js?v=3.1.0') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</html>
