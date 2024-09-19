<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome for Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Styles -->
    <link href="{{ asset('css/client.css') }}" rel="stylesheet">
</head>
<body>
    <!-- Navbar -->
    @include('layouts.navbarclient')

    <div class="container mt-5">

        <div class="card bg-dark text-white">
            <img src="{{ asset('ajoutpanier.jpg') }}" class="card-img" style="width: auto; height: 270px;">
            <div class="card-img-overlay">
              
            </div>
        </div>

        <br>

        <h1 class="">Panier</h1>
        <div class="row">
            <div class="col-lg-8">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($panier && count($panier->items) > 0)
                        @foreach($panier->items as $item)
                        <tr>
                            <td>
                                <img src="{{ asset('images/' . $item->produit->img) }}" class="card-img-top" alt="{{ $item->produit->name }}" style="width: 300px; height: auto;">
                            </td>
                            <td>
                                {{ $item->produit->name }} <br>
                                {{ $item->produit->description }} <br>
                                {{ $item->produit->prix }} TND
                            </td>
                            <td>
                                <input type="number" name="quantity" value="{{ $item->quantity }}" class="form-control w-25">
                            </td>
                            
                            <td>
                                {{-- <form action="{{ route('panier.remove', $produit->id) }}" method="POST"> --}}
                                <form action="">
                                    {{-- @csrf --}}
                                    {{-- @method('DELETE') --}}
                                    <i class="fa-solid fa-trash"></i>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr>
                            <td colspan="5" class="text-center">Votre panier est vide</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h5><span>{{ $itms_panier }}</span> aricles</h5> <br>
                        <h5>Livraison gratuite <span>0,00 D</span></h5> <br>
                        <hr> <br>
                        <p class="h5">Total TTC {{ $total }} TND</p> <br>
                        <a href="" class="btn btn-primary w-100 mt-3">Procéder au paiement</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
</body>
</html>
