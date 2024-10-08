<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Bon de Commande</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        .header { text-align: center; margin-bottom: 20px; }
        .header h1 { font-size: 24px; margin: 0; }
        .sub-header { margin-bottom: 20px; }
        .sub-header .left, .sub-header .right { width: 50%; display: inline-block; vertical-align: top; }
        .sub-header .left { text-align: left; }
        .sub-header .right { text-align: right; }
        .details { margin-top: 20px; }
        .details th, .details td { padding: 8px; border: 1px solid #000; text-align: left; }
        .details th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="header">
        <h1>BON DE COMMANDE N° {{ $commande->id }}</h1>
    </div>
    
    <div class="sub-header">
        <div class="left">
            <p><strong>Fournisseur :</strong></p>
            <p>{{ $commande->fournisseur->name }}</p>
            <p>{{ $commande->fournisseur->address }}</p>
        </div>
        <div class="right">
            <p><strong>Entreprise :</strong></p>
            <p>{{ $commande->entreprise->name }}</p>
            <p>{{ $commande->entreprise->address }}</p>
            <p><strong>Date de la commande :</strong> {{ $commande->created_at->format('d/m/Y') }}</p>
        </div>
    </div>

    <div class="details">
        <table width="100%">
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Quantité</th>
                    <th>Description</th>
                    <th>Délai de livraison</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $commande->designation }}</td>
                    <td>{{ $commande->quantite }}</td>
                    <td>{{ $commande->description }}</td>
                    <td>{{ $commande->delai_de_livraison }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <br>
    <div class="signature">
        <p><strong>Signature du Fournisseur</strong></p>
        
    </div>
</body>
</html>
