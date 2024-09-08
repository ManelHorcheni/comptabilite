<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <title>Comptabilite</title>
  <!-- Load Google Charts -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  {{-- <script src="{{ mix('js/app.js') }}" defer></script> --}}
  <style>
    body {
        font-family: Arial, sans-serif;
    }
    .chart-container {
        position: relative;
        width: 400px; /* Ajuste la largeur du graphique */
        margin-left: 0; /* Aligne le graphique à gauche */
    }
    .chart-wrapper {
        display: flex;
        align-items: flex-start;
    }
    .chart-wrapper > .card {
        flex: 1;
    }
</style>

</head>

<body class="g-sidenav-show  bg-gray-200">
  @include('layouts.sidebar')

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
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape text-center border-radius-xl mt-n4 position-absolute">
                <img src="{{ asset('client.png') }}" alt="Your Image" style="width: 80px;" class="img-fluid">
              </div>
              <div class="text-end pt-1">
                <span class="tableText nav-link-text ms-1 text-black text-lg" style="font-family: serif;">Clients</span>
                <h4 class="tableText mb-0">{{ $clients }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3" style="background-color: rgb(72, 96, 146)">
              <span class="nav-link-text ms-1 text-white text-md" style="font-family: serif;"><span class="text-white font-weight-bolder">Tous les </span>Clients</span>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape text-center border-radius-xl mt-n4 position-absolute">
                <img src="{{ asset('fournisseur.png') }}" alt="Your Image" style="width: 80px;" class="img-fluid">
              </div>
              <div class="text-end pt-1">
                <span class="tableText nav-link-text ms-1 text-black text-lg" style="font-family: serif;">Fournisseur</span>
                <h4 class="tableText mb-0">{{ $fournisseurs }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3" style="background-color: rgb(72, 96, 146)">
              <span class="nav-link-text ms-1 text-white text-md" style="font-family: serif;"><span class="text-white font-weight-bolder">Tous les </span>Fournisseurs</span>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape text-center border-radius-xl mt-n4 position-absolute">
                <img src="{{ asset('entreprise.png') }}" alt="Your Image" style="width: 80px;" class="img-fluid">
              </div>
              <div class="text-end pt-1">
                <span class="tableText nav-link-text ms-1 text-black text-lg" style="font-family: serif;">Entreprises</span>

                <h4 class="tableText mb-0">{{ $entreprises }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3" style="background-color: rgb(72, 96, 146)">
              <span class="tableText nav-link-text ms-1 text-white text-md" style="font-family: serif;"><span class="text-white font-weight-bolder">Tous les </span>Entreprises</span>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-warning text-center border-radius-xl mt-n4 position-absolute">
                <img src="{{ asset('admins.png') }}" alt="Your Image" style="width: 80px;" class="img-fluid">
              </div>
              <div class="text-end pt-1">
                <span class="tableText nav-link-text ms-1 text-black text-lg" style="font-family: serif;">Admins</span>
                <h4 class="tableText mb-0">{{ $admins }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3" style="background-color: rgb(72, 96, 146)">
              <span class="nav-link-text ms-1 text-white text-md" style="font-family: serif;"><span class="text-white font-weight-bolder">Tous les </span>Administarteurs</span>
            </div>
          </div>
        </div>
        </div>


        <div class="row mt-4">
          <div class="chart-wrapper">

            <div class="chart-card col-md-6">
            <div class="card z-index-2 h-100">
              <div class="card-body">
                <h2>Statistiques des utilisateurs</h2>
                <div class="chart-container">
                  <canvas id="myPieChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          <div class="chart-card col-md-6">
            <div class="card z-index-2 h-100">
              <div class="card-body">
                <h2>Répartition des Produits</h2>
                <div class="chart-container">
                  <canvas id="productChart"></canvas>
                </div>
              </div>
            </div>
          </div>

          </div>
                    </div>
        </div>

        <script>
        document.addEventListener('DOMContentLoaded', () => {
        // Graphique des utilisateurs
        const ctxUser = document.getElementById('myPieChart').getContext('2d');
        new Chart(ctxUser, {
          type: 'pie',
          data: {
            labels: ['Clients', 'Fournisseurs', 'Entreprises', 'Admins'],
            datasets: [{
              label: 'Répartition des utilisateurs',
              data: [{{ $clients }}, {{ $fournisseurs }}, {{ $entreprises }}, {{ $admins }}],
              backgroundColor: [
                'rgba(255, 99, 132, 0.6)',
                'rgba(54, 162, 235, 0.6)',
                'rgba(255, 206, 86, 0.6)',
                'rgba(75, 192, 192, 0.6)'
              ],
              borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
              ],
              borderWidth: 2
            }]
          },
          options: {
            responsive: true,
            plugins: {
              legend: {
                position: 'left',
                labels: {
                  font: {
                    size: 14
                  }
                }
              },
              tooltip: {
                callbacks: {
                  label: function(tooltipItem) {
                    return tooltipItem.label + ': ' + tooltipItem.raw;
                  }
                }
              }
            }
          }
        });

        // Graphique des produits
        const ctxProduct = document.getElementById('productChart').getContext('2d');
        const categories = @json($categories);
        const labels = Object.keys(categories);
        const data = Object.values(categories);

        new Chart(ctxProduct, {
          type: 'bar',
          data: {
            labels: labels,
            datasets: [{
              label: 'Nombre de Produits',
              data: data,
              backgroundColor: 'rgba(75, 192, 192, 0.2)',
              borderColor: 'rgba(75, 192, 192, 1)',
              borderWidth: 1
            }]
          },
          options: {
            responsive: true,
            scales: {
              x: {
                beginAtZero: true
              },
              y: {
                beginAtZero: true
              }
            },
            plugins: {
              legend: {
                position: 'top',
              },
              tooltip: {
                callbacks: {
                  label: function(tooltipItem) {
                    return tooltipItem.label + ': ' + tooltipItem.raw;
                  }
                }
              }
            }
          }
        });
      });
      </script>

                
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <script src="{{ asset('js/core/popper.min.js') }}"></script>
    <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('js/material-dashboard.min.js?v=3.1.0') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>




</html>
