<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            padding-top: 20px;
        }

        .sidebar a {
            padding: 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
    </style>
</head>

<body>
    @extends('layouts.app')

    @section('content')
        <!-- Sidebar -->
        <div class="sidebar">
            <h4 class="text-center text-light">Admin Dashboard</h4>
            <a href="/home" class="active">Dashboard</a>
            <a href="/allusers">Utilisateurs</a>
            <a href="#reports">Commandes</a>
            <a href="#reports">Ventes</a>
            <a href="#settings">Paramétre</a>
            <a href="#logout">Déconnexion</a>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <div class="container-fluid">
                <h1 class="mt-4">Gestion des Utilisateurs</h1>
                
                <!-- Bouton trigger modal pour ajouter un nouvel utilisateur -->
                <a href="" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#AjouterUser">Ajouter un Nouvel Utilisateur</a>

                <!-- Example Table -->
            <div class="card mt-4">
                <div class="card-header">Liste des utilisateurs</div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbod>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                      @if($user->role == 0)
                                        Admin
                                      @elseif($user->role == 1)
                                        Entreprise
                                      @elseif($user->role == 2)
                                        Fournisseur
                                      @elseif($user->role == 3)
                                        Client
                                      @endif
                                      {{-- {{ $user->role }} --}}
                                    </td>
                                    <td>
                                        <!-- Bouton trigger modal pour afficher un utilisateur -->
                                        <a href="" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#AfficherUser{{ $user->id }}">Show</a>
                                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#EditUser{{ $user->id }}">Edit</a>
                                        <!-- Formulaire pour supprimer un utilisateur -->
                                        <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                                          @csrf
                                          @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
                
            </div>
        </div>


       
  
  <!-- Modal Ajouter User -->
  <div class="modal fade" id="AjouterUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ajouter Utilisateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            
            <form class="row g-3" method="post" action="{{Route('store')}}">
                @csrf
                <div class="col-12">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Manel">
                  </div>
                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email">
                </div>
                <div class="col-md-6">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password">
                </div>
                <div class="col-12">
                  <label for="adresse" class="form-label">Adresse</label>
                  <input type="text" class="form-control" id="adresse" name="adresse" placeholder="2024 manouba tunisie">
                </div>
                <div class="col-md-4">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone">
                  </div>
                  <div class="col-md-4">
                    <label for="specialite" class="form-label">Spécialité</label>
                    <input type="text" class="form-control" name="specialite" id="specialite">
                  </div>
                  <div class="col-md-4">
                    <label for="role" class="form-label">Role</label>
                    <select id="role" class="form-select" name="role">
                      <option selected value="0">Admin</option>
                      <option value="1">Entreprise</option>
                      <option value="2">Fournisseur</option>
                      <option value="3">Client</option>
                    </select>
                  </div>
              

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
    </form>
      </div>
    </div>
  </div>



  <!-- Modal Show User -->
  @foreach($users as $user)
  <div class="modal fade" id="AfficherUser{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $user->id }}" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel{{ $user->id }}">Afficher Utilisateur</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
            
            {{-- <form class="row g-3" method="post" action="{{Route('store')}}"> --}}
            <form class="row g-3">
                {{-- @csrf --}}
                <div class="col-12">
                    <label for="name{{ $user->id }}" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name{{ $user->id }}" name="name" value="{{ $user->name }}" disabled readonly>
                  </div>
                <div class="col-md-6">
                  <label for="email{{ $user->id }}" class="form-label">Email</label>
                  <input type="email" class="form-control" name="email" id="email{{ $user->id }}" value="{{ $user->email }}" disabled readonly>
                </div>
                <div class="col-md-6">
                  <label for="password{{ $user->id }}" class="form-label">Password</label>
                  <input type="password" class="form-control" name="password" id="password{{ $user->id }}" value="{{ $user->password }}" disabled readonly>
                </div>
                <div class="col-12">
                  <label for="adresse{{ $user->id }}" class="form-label">Adresse</label>
                  <input type="text" class="form-control" id="adresse{{ $user->id }}" name="adresse" value="{{ $user->adresse }}" disabled readonly>
                </div>
                <div class="col-md-4">
                    <label for="phone{{ $user->id }}" class="form-label">Phone</label>
                    <input type="text" class="form-control" name="phone" id="phone{{ $user->id }}" value="{{ $user->phone }}" disabled readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="specialite{{ $user->id }}" class="form-label">Spécialité</label>
                    <input type="text" class="form-control" name="specialite" id="specialite{{ $user->id }}" value="{{ $user->specialite }}" disabled readonly>
                  </div>
                  <div class="col-md-4">
                    <label for="role{{ $user->id }}" class="form-label">Role</label>
                    <select id="role{{ $user->id }}" class="form-select" name="role" disabled readonly>
                      <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option>
                      <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Entreprise</option>
                      <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Fournisseur</option>
                      <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Client</option>
                    </select>
                  </div>
              

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="submit" class="btn btn-primary">OK</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  @endforeach
  
  <!-- Modal Edit User --> 
  @foreach($users as $user)
 
  <div class="modal fade" id="EditUser{{ $user->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $user->id }}" aria-hidden="true">
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
                  <input type="password" class="form-control" name="password" id="passwordEdit{{ $user->id }}" value="{{ $user->password }}">
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
@endforeach

  
  @endsection



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
