<head>
    <!-- Material Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0-beta3/css/all.min.css" />

    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('css/material-dashboard.css?v=3.1.0') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Toastify JS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <!-- Bootstrap Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <link href="{{ asset('css/entreprise.css') }}" rel="stylesheet">
    
    <!-- Bootstrap Timepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
    
    <!-- Bootstrap Datepicker and Timepicker JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>
    </head>
    
    
    <!-- sidebar -->
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3" id="sideBar">
        <div class="sidenav-header">
          <a class="navbar-brand m-0" href="{{ route('dashbord')}}">
            <img src="{{ asset('dashboard.png') }}" alt="Your Image">&nbsp;
            <span class="styleNav font-weight-bolder mb-2 text-white"> Dashboard</span>
          </a>
        </div>
    
        <hr class="horizontal light mt-0 mb-2">
        <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main" >
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
    
              <a class="nav-link dropdown-toggle text-black" href="#" style="font-weight:bold;{{ Request::is('produits') || Request::is('addproduit')  ? 'background-color: #6aa3ff;color:black;' : '' }}" id="employeeDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-boxes-stacked"></i>&nbsp;
                  Produits
              </a>
    
              <div class="dropdown-menu" aria-labelledby="employeeDropdown">
                  <a class="dropdown-item" href="{{ route('produits') }}" style="font-weight:bold;{{ Request::is('produits')  ? 'background-color: #6aa3ff;color:black;' : '' }}">
                    <i class="fa fa-list"></i>&nbsp; Gestion des Produits               
                  </a>
                  <a class="dropdown-item" href="{{ route('produits.add') }}" style="font-weight:bold;{{ Request::is('addproduit')  ? 'background-color: #6aa3ff;color:black;' : '' }}">
                    <i class="fa fa-plus"></i>&nbsp; Ajout Produit
                  </a>
              </div>
          </li>

            <li class="nav-item dropdown">
    
              <a class="nav-link dropdown-toggle text-black" href="#" style="font-weight:bold;{{ Request::is('cammande') || Request::is('livraison') || Request::is('facture')  ? 'background-color: #6aa3ff;color:black;' : '' }}" id="employeeDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa-solid fa-file-contract"></i>&nbsp;
                  Commandes
              </a>
    
              <div class="dropdown-menu" aria-labelledby="employeeDropdown">
                  <a class="dropdown-item" href="{{ route('commandes.index') }}" style="font-weight:bold;{{ Request::is('cammande')  ? 'background-color: #6aa3ff;color:black;' : '' }}">
                    <i class="fa-solid fa-file-contract"></i>&nbsp; Gestion des Commandes               
                  </a>
                  <a class="dropdown-item" href="{{ route('entreprise.livraison') }}" style="font-weight:bold;{{ Request::is('livraison')  ? 'background-color: #6aa3ff;color:black;' : '' }}">
                    <i class="fa-solid fa-truck"></i>&nbsp; Livraison
                  </a>
                  <a class="dropdown-item" href="{{ route('facture.index_Entreprise') }}" style="font-weight:bold;{{ Request::is('facture')  ? 'background-color: #6aa3ff;color:black;' : '' }}">
                    <i class="fa-solid fa-file-invoice-dollar"></i>&nbsp; Facture
                  </a>
              </div>
          </li>
            

            
                
                <li class="nav-item">
                  <a class="nav-link" href="{{ route('fournisseurs') }}" style="font-weight:bold;{{ Request::is('fournisseurs')  ? 'background-color: #6aa3ff;color:black;' : '' }}" >
                    <i class="fa-solid fa-shop"></i>&nbsp;
                      Fournisseurs
                  </a>
                  </li>
        
    
            @guest
            <hr>        
            @else
            <hr><hr>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('parametre', ['id' => auth()->user()->id]) }}" style="font-weight:bold;{{ Request::is('parametre')  ? 'background-color: #6aa3ff;color:black;' : '' }}" >
                <i class="fa fa-user-cog"></i>&nbsp;
                  Paramètres du compte
              </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="font-weight:bold;{{ Request::is('logout')  ? 'background-color: #6aa3ff;color:black;' : '' }}" id="employeeDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-sign-out"></i>&nbsp;
                    Déconnexion
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
              </form>
                </li>
            @endguest
          </ul>
        </div>
      </aside>
    
      