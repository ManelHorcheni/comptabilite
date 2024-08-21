{{-- @extends('layouts.app')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
 --}}
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
            <h1 class="mt-4">Dashboard Overview</h1>
            <p>Bienvenue sur votre tableau de bord d'administration. Ici, vous pouvez gérer les paramètres de votre application, vos utilisateurs et afficher les commandes.</p>

            <!-- Example Cards -->
            <div class="row">
                <!-- Utilisateurs Cards -->
                <div class="col-md-4">
                    <div class="card text-white bg-primary mb-3">
                        <div class="card-header">Utilisateurs</div>
                        <div class="card-body">
                            <h5 class="card-title">1,234</h5>
                            <p class="card-text">Total des utilisateurs enregistrés</p>
                        </div>
                    </div>
                </div>
                <!-- Commandes Cards -->
                <div class="col-md-4">
                    <div class="card text-white bg-success mb-3">
                        <div class="card-header">Commandes</div>
                        <div class="card-body">
                            <h5 class="card-title">$12,345</h5>
                            <p class="card-text">Total des commandes enregistrés</p>
                        </div>
                    </div>
                </div>
                <!-- Example Cards -->
                <div class="col-md-4">
                    <div class="card text-white bg-danger mb-3">
                        <div class="card-header">Vente</div>
                        <div class="card-body">
                            <h5 class="card-title">56</h5>
                            <p class="card-text">Total des ventes enregistrés</p>
                        </div>
                    </div>
                </div>
            </div>

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
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-info btn-sm">Show</a>
                                        <a href="" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="" class="btn btn-danger btn-sm">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
