<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- FontAwesome for Icons -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Styles -->
  <link href="{{ asset('css/client.css') }}" rel="stylesheet">
  

  <title>
    Comptabilite
  </title>
  <style>
    body{
    color: #8e9194;
    background-color: #f4f6f9;
}
.avatar-xl img {
    width: 110px;
}
.rounded-circle {
    border-radius: 50% !important;
}
img {
    vertical-align: middle;
    border-style: none;
}
.text-muted {
    color: #aeb0b4 !important;
}
.text-muted {
    font-weight: 300;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 0.875rem;
    font-weight: 400;
    line-height: 1.5;
    color: #4d5154;
    background-color: #ffffff;
    background-clip: padding-box;
    border: 1px solid #eef0f3;
    border-radius: 0.25rem;
    transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
  </style>
</head>

<body>
  @include('layouts.navbarclient')

  <main>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-10 col-xl-8 mx-auto">
                <h2 class="h3 mb-4 page-title">Settings</h2>
                <div class="my-4">
                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Profile</a>
                        </li>
                    </ul>
                    <form method="POST" action="{{ route('compte.update', $user->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row mt-5 align-items-center">
                            <div class="col-md-3 text-center mb-5">
                                <div class="avatar avatar-xl">
                                    <img src="{{ asset('images/' .Auth::user()->img) }}" alt="..." class="avatar-img rounded-circle" />
                                </div>
                            </div>
                            <div class="col">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <h4 class="mb-1">{{ $user->name }}</h4>
                                        <p class="small mb-3"><span class="badge badge-dark">{{ $user->adresse }}</span></p>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-md-7">
                                        <p class="text-muted">
                                            {{ $user->description }}
                                        </p>
                                    </div>
                                    <div class="col">
                                        <p class="small mb-0 text-muted">{{ $user->specialite }}</p>
                                        <p class="small mb-0 text-muted">{{ $user->adresse }}</p>
                                        <p class="small mb-0 text-muted">{{ $user->phone }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr class="my-4" />
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">Name</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $user->name }}" />
                            </div>
                            
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $user->email }}" />
                        </div>
                        <div class="form-group">
                            <label for="adresse">Address</label>
                            <input type="text" class="form-control" id="adresse" name="adresse" value="{{ $user->adresse }}"/>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}" />
                            </div>
                            <div class="form-group col-md-6">
                                <label for="specialite">Phone</label>
                                <input type="text" class="form-control" id="specialite" name="specialite" value="{{ $user->specialite }}" />
                            </div>
                            <div class="col-md-6">
                                <label for="img" class="form-label">Image de profil</label>
                                <input type="file" class="form-control" id="img" name="img">
                            </div>
                           
                        </div>
                        <hr class="my-4" />
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" class="form-control" id="password" name="password" value="" disabled />
                                </div>
                                
                                
                            </div>
                            <div class="col-md-6">
                                <p class="mb-2">Password requirements</p>
                                <p class="small text-muted mb-2">To create a new password, you have to meet this following requirement:</p>
                                <ul class="small text-muted pl-4 mb-0">
                                    <li>Minimum 8 character</li>
                                    
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4" style="display: none;">
                            <label for="role" class="form-label">Role</label>
                            <select id="role" class="form-select" name="role">
                              <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Admin</option>
                              <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Entreprise</option>
                              <option value="2" {{ $user->role == 2 ? 'selected' : '' }}>Fournisseur</option>
                              <option value="3" {{ $user->role == 3 ? 'selected' : '' }}>Client</option>
                            </select>
                          </div>
                        <button type="submit" class="btn btn-primary">Save Change</button>
                    </form>
                </div>
            </div>
        </div>
        
        </div>

  </main>


  
  <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>

</html>