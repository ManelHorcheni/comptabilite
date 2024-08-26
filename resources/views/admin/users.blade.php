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

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbar">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="navbarText font-weight-bolder mb-0">Dashboard / Gestion des Utilisateurs</h6>
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
                                            <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                                                Table de tous les utilisateurs
                                            </h6>
                                            <form action="{{ route('users.add') }}" method="GET" class="m-1">
                                                <button type="submit" class="btn btn-outline" id="btnAddPage">
                                                    Ajout Utilisateur
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- ______________________________________________________ --}}
                            <div class="container-fluid py-3">
                                <div class="row mb-3">
                                    <div class="col-md-12">
                                        <form method="GET" action="{{ route('users') }}" id="filterForm" class="form-inline d-flex justify-content-between">
                                            <div class="form-group mx-sm-3 mb-2">
                                                <label for="name" class="sr-only">Nom</label>
                                                <input type="text" name="name" class="form-control" id="name" placeholder="Nom" value="{{ request('name') }}" oninput="document.getElementById('filterForm').submit();">
                                            </div>
                                            <div class="form-group mx-sm-3 mb-2">
                                                <label for="role" class="sr-only">Rôle</label>
                                                <select name="role" id="role" class="form-control" onchange="document.getElementById('filterForm').submit();">
                                                    <option value="">Tous les rôles</option>
                                                    <option value="0" {{ request('role') == 0 ? 'selected' : '' }}>Admin</option>
                                                    <option value="1" {{ request('role') == 1 ? 'selected' : '' }}>Entreprise</option>
                                                    <option value="2" {{ request('role') == 2 ? 'selected' : '' }}>Fournisseur</option>
                                                    <option value="3" {{ request('role') == 3 ? 'selected' : '' }}>Client</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            
                                <!-- La table des utilisateurs ici -->
                                <div class="container">
                                    <!-- Votre code existant pour afficher la table -->
                                </div>
                            </div>
                            
                            
                            {{-- ______________________________________________________ --}}



                            @if(count($users) > 0)
                            <div class="card-body px-0 pb-2">
                                <div class="table-wrapper table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead class="tableHeader">
                                            <tr>
                                                <th class="text-uppercase text-xxs font-weight-bolder">Full name</th>
                                                <th class="text-center text-uppercase text-xxs font-weight-bolder ps-2">Role</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $user)
                                            <tr>
                                                <td class="align-middle text-center">
                                                    <div class="d-flex px-2 py-1">
                                                        <div>
                                                            <img src="{{ asset('images/' . $user->img) }}" class="avatar avatar-sm me-3" alt="user1">
                                                        </div>
                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="tableText mb-0 text-sm">{{ $user->name }} {{ $user->last_name }}</h6>
                                                            <p class="tableText text-xs text-secondary mb-0">{{ $user->email }}</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="tableText align-middle text-center font-weight-bolder text-sm">
                                                        {{-- {{ $user->role }} --}}
                                                    @if($user->role == 0)
                                                        Admin
                                                    @elseif($user->role == 1)
                                                        Entreprise
                                                    @elseif($user->role == 2)
                                                        Fournisseur
                                                    @elseif($user->role == 3)
                                                        Client
                                                    @endif
                                                </p>
                                                </td>

                                                <td class="align-middle">
                                                    <a href="#" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}" data-toggle="tooltip" data-original-title="Edit user">
                                                        <img src="{{ asset('edit.png') }}" alt="Edit user" class="iconsTable">
                                                    </a>
                                                    <a href="#" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}" data-toggle="tooltip" data-original-title="Delete user">
                                                        <img src="{{ asset('delete.png') }}" alt="Delete user" class="iconsTable">
                                                    </a>
                                                    <a href="#" class="text-secondary font-weight-bold text-xs" data-bs-toggle="modal" data-bs-target="#seeModal{{ $user->id }}" data-toggle="tooltip" data-original-title="View user">
                                                        <img src="{{ asset('seeicon.png') }}" alt="View user" class="iconsTable">
                                                    </a>
                                                </td>
                                            </tr>

                                            <!-- Edit Modal -->
                                            <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel{{ $user->id }}">Éditer Utilisateur</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                          <form class="row g-3" method="post" action="{{ route('user.update', $user->id) }}">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="col-12">
                                                                <label for="nameEdit{{ $user->id }}" class="form-label">Name</label>
                                                                <input type="text" class="form-control" id="nameEdit{{ $user->id }}" name="name" value="{{ $user->name }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                              <label for="emailEdit{{ $user->id }}" class="form-label">Email</label>
                                                              <input type="email" class="form-control" name="email" id="emailEdit{{ $user->id }}" value="{{ $user->email }}">
                                                            </div>
                                                            <div class="col-md-6">
                                                              <label for="passwordEdit{{ $user->id }}" class="form-label">Password</label>
                                                              <input type="password" class="form-control" name="password" id="passwordEdit{{ $user->id }}" value="" disabled>
                                                            </div>
                                                            <div class="col-12">
                                                              <label for="adresseEdit{{ $user->id }}" class="form-label">Adresse</label>
                                                              <input type="text" class="form-control" id="adresseEdit{{ $user->id }}" name="adresse" value="{{ $user->adresse }}">
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="phoneEdit{{ $user->id }}" class="form-label">Phone</label>
                                                                <input type="text" class="form-control" name="phone" id="phoneEdit{{ $user->id }}" value="{{ $user->phone }}">
                                                              </div>
                                                              <div class="col-md-4">
                                                                <label for="specialiteEdit{{ $user->id }}" class="form-label">Spécialité</label>
                                                                <input type="text" class="form-control" name="specialite" id="specialiteEdit{{ $user->id }}" value="{{ $user->specialite }}">
                                                              </div>
                                                              <div class="col-md-4">
                                                                <label for="roleEdit{{ $user->id }}" class="form-label">Role</label>
                                                                <select id="roleEdit{{ $user->id }}" class="form-select" name="role">
                                                                  <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option>
                                                                  <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Entreprise</option>
                                                                  <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Fournisseur</option>
                                                                  <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Client</option>
                                                                </select>
                                                              </div>
                                                    </div>
                                            
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                                      <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
                                                    </div>
                                                </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $user->id }}">Supprimer Utilisateur</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>Êtes-vous sûr de vouloir supprimer cet utilisateur ?</p>
                                                            <form method="post" action="{{ route('users.destroy', $user->id) }}">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- See Modal -->
                                            <div class="modal fade" id="seeModal{{ $user->id }}" tabindex="-1" aria-labelledby="seeModalLabel{{ $user->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="seeModalLabel{{ $user->id }}">Voir Utilisateur</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p><strong>Nom:</strong> {{ $user->name }}</p>
                                                            <p><strong>Email:</strong> {{ $user->email }}</p>
                                                            <p><strong>Role:</strong> {{ $user->role }}</p>
                                                            <!-- Add other fields as needed -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            @else
                            <p class="p-3">No users found.</p>
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
</body>

</html>
