<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  

  <title>
    Comptabilite
  </title>
</head>

<body class="g-sidenav-show  bg-gray-200">
  @include('layouts.sidebar')

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbar">
        <div class="container-fluid py-1 px-3">

          <nav aria-label="breadcrumb">
            <h6 class="navbarText font-weight-bolder mb-0" >Dashboard / Utilisateurs / Ajout Utilisateur</h6>
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
                                          <img src="{{ asset('images/' .Auth::user()->img) }}" alt="profile_image"
                                              id="navbarImage">
                                          <span class="navbarText font-weight-bolder mb-0"  >
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
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-12">
                  <div class="card my-4">
                    <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                        <div class="row align-items-center">
                            <div class="col-md">
                                <div class="shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center"  id="cardTop">
                                  <h6 class="text-capitalize ps-3" id="titreTop">
                                        <img src="{{ asset('add_employee.png') }}" alt="Your Image" id="imageCardTop" class="img-fluid me-2">
                                        Ajout Utilisateur
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form class="row g-3" method="post" action="{{Route('store')}}">
                                @csrf
                                <div class="col-12">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Manel" required>
                                  </div>
                                <div class="col-md-6">
                                  <label for="email" class="form-label">Email</label>
                                  <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                                <div class="col-md-6">
                                  <label for="password" class="form-label">Password</label>
                                  <input type="password" class="form-control" name="password" id="password" required>
                                </div>
                                <div class="col-12">
                                  <label for="adresse" class="form-label">Adresse</label>
                                  <input type="text" class="form-control" id="adresse" name="adresse" placeholder="2024 manouba tunisie" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="phone" class="form-label">Phone</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder=" ** *** *** " required>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="specialite" class="form-label">Spécialité</label>
                                    <input type="text" class="form-control" name="specialite" id="specialite" required>
                                  </div>
                                  <div class="col-md-4">
                                    <label for="role" class="form-label">Role</label>
                                    <select id="role" class="form-select" name="role" required>
                                      <option selected value="0">Admin</option>
                                      <option value="1">Entreprise</option>
                                      <option value="2">Fournisseur</option>
                                      <option value="3">Client</option>
                                    </select>
                                  </div>
                              
                
                        </div>
                
                        <div class="text-center">
                            <button type="submit" class="btn" id="btnAddPageForm"> <img src="{{ asset('add_employee.png') }}" alt="user Image" id="buttonsModal">Ajout utilisateur</button>
                        </div>
                    </form>                        </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
    </div>

  </main>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
  <script>
    

    // Function to display success message as a toast
    function displaySuccessToast(message) {
        Toastify({
            text: message,
            duration: 3000, 
            gravity: "top",
            position: "right",
            backgroundColor: "green",
            stopOnFocus: true,
        }).showToast();
      }
        // Function to display error message as a toast
    function displayErrorToast(message) {
        Toastify({
            text: message,
            duration: 3000, 
            gravity: "top",
            position: "right",
            backgroundColor: "red",
            stopOnFocus: true,
        }).showToast();
    }

    // Check if there's a success message in the session and display it as a toast
    @if (session()->has('success'))
    displaySuccessToast("{{ Session::get('success') }}");
    @endif

    @if (Session()->has('error'))
        displayErrorToast("{{ Session::get('error') }}"); 
    @endif



  </script>
  
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